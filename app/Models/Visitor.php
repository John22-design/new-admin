<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visitor extends Model
{
    use HasFactory;

    protected $fillable = [
        'ip_hash',
        'ip_address',
        'url',
        'path',
        'method',
        'referer',
        'user_agent',
        'device',
        'browser',
        'platform',
        'country',
        'country_code',
        'city',
        'session_id',
        'is_robot',
    ];

    protected $casts = [
        'is_robot' => 'boolean',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * Anonymize an IP address (e.g. 192.168.1.50 -> 192.168.1.xxx)
     */
    public static function anonymizeIp(?string $ip): ?string
    {
        if (empty($ip)) {
            return null;
        }

        // IPv4
        if (filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4)) {
            $parts = explode('.', $ip);
            if (count($parts) === 4) {
                return $parts[0] . '.' . $parts[1] . '.' . $parts[2] . '.xxx';
            }
        }

        // IPv6
        if (filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV6)) {
            $parts = explode(':', $ip);
            if (count($parts) > 2) {
                return $parts[0] . ':' . $parts[1] . ':xxxx:xxxx:xxxx:xxxx:xxxx:xxxx';
            }
        }

        return 'xxx.xxx.xxx.xxx';
    }

    /**
     * Detect device type from user agent string
     */
    public static function detectDevice(?string $userAgent): string
    {
        if (empty($userAgent)) {
            return 'Desktop';
        }

        $userAgent = strtolower($userAgent);

        if (preg_match('/(tablet|ipad|playbook|silk)|(android(?!.*mobi))/i', $userAgent)) {
            return 'Tablet';
        }

        if (preg_match('/(mobile|android|iphone|ipod|blackberry|opera mini|iemobile|wpdesktop)/i', $userAgent)) {
            return 'Mobile';
        }

        return 'Desktop';
    }

    /**
     * Detect browser from user agent string
     */
    public static function detectBrowser(?string $userAgent): string
    {
        if (empty($userAgent)) {
            return 'Other';
        }

        if (preg_match('/Edg/i', $userAgent)) {
            return 'Edge';
        }
        if (preg_match('/OPR|Opera/i', $userAgent)) {
            return 'Opera';
        }
        if (preg_match('/Chrome/i', $userAgent) && !preg_match('/Edg|OPR/i', $userAgent)) {
            return 'Chrome';
        }
        if (preg_match('/Safari/i', $userAgent) && !preg_match('/Chrome|Edg|OPR/i', $userAgent)) {
            return 'Safari';
        }
        if (preg_match('/Firefox/i', $userAgent)) {
            return 'Firefox';
        }
        if (preg_match('/MSIE|Trident/i', $userAgent)) {
            return 'Internet Explorer';
        }

        return 'Other';
    }

    /**
     * Detect operating system/platform from user agent string
     */
    public static function detectPlatform(?string $userAgent): string
    {
        if (empty($userAgent)) {
            return 'Other';
        }

        if (preg_match('/windows|win32/i', $userAgent)) {
            return 'Windows';
        }
        if (preg_match('/macintosh|mac os x/i', $userAgent)) {
            return 'macOS';
        }
        if (preg_match('/iphone|ipad|ipod/i', $userAgent)) {
            return 'iOS';
        }
        if (preg_match('/android/i', $userAgent)) {
            return 'Android';
        }
        if (preg_match('/linux/i', $userAgent)) {
            return 'Linux';
        }

        return 'Other';
    }

    /**
     * Check if user agent is a search engine robot or crawler
     */
    public static function isRobot(?string $userAgent): bool
    {
        if (empty($userAgent)) {
            return false;
        }

        $botRegex = '/(bot|crawler|spider|slurp|facebookexternalhit|bingbot|googlebot|duckduckbot|yandexbot|baiduspider)/i';
        return (bool) preg_match($botRegex, $userAgent);
    }

    /**
     * Detect country & city location from Request headers and IP address
     *
     * @param \Illuminate\Http\Request $request
     * @param string|null $rawIp
     * @return array{country: string, country_code: string, city: ?string}
     */
    public static function detectLocation($request, ?string $rawIp): array
    {
        // 1. Check Cloudflare / CDN headers first (fastest and most accurate when deployed)
        $cfCountry = $request->header('CF-IPCountry') ?: $request->server('HTTP_CF_IPCOUNTRY');
        if (!empty($cfCountry) && strlen($cfCountry) === 2 && strtoupper($cfCountry) !== 'XX' && strtoupper($cfCountry) !== 'T1') {
            $code = strtoupper($cfCountry);
            return [
                'country' => self::countryNameFromCode($code),
                'country_code' => $code,
                'city' => $request->header('CF-IPCity') ?: null,
            ];
        }

        // 2. Check X-Country-Code header
        $headerCountry = $request->header('X-Country-Code') ?: $request->header('X-Forwarded-Country');
        if (!empty($headerCountry) && strlen($headerCountry) === 2) {
            $code = strtoupper($headerCountry);
            return [
                'country' => self::countryNameFromCode($code),
                'country_code' => $code,
                'city' => null,
            ];
        }

        // 3. Handle private / local IPs
        if (empty($rawIp) || self::isPrivateIp($rawIp)) {
            return [
                'country' => 'Local Network',
                'country_code' => 'LOC',
                'city' => 'Localhost',
            ];
        }

        // 4. Cache & lookup external GeoIP API
        try {
            return \Illuminate\Support\Facades\Cache::remember("geoip_{$rawIp}", 604800, function () use ($rawIp) {
                $response = \Illuminate\Support\Facades\Http::timeout(2)
                    ->get("http://ip-api.com/json/{$rawIp}?fields=status,message,country,countryCode,city");

                if ($response->successful()) {
                    $data = $response->json();
                    if (($data['status'] ?? '') === 'success') {
                        return [
                            'country' => $data['country'] ?? 'Unknown',
                            'country_code' => strtoupper($data['countryCode'] ?? 'UN'),
                            'city' => $data['city'] ?? null,
                        ];
                    }
                }

                return [
                    'country' => 'Unknown',
                    'country_code' => 'UN',
                    'city' => null,
                ];
            });
        } catch (\Throwable $e) {
            return [
                'country' => 'Unknown',
                'country_code' => 'UN',
                'city' => null,
            ];
        }
    }

    /**
     * Check if an IP address is private/reserved
     */
    public static function isPrivateIp(?string $ip): bool
    {
        if (empty($ip) || $ip === '127.0.0.1' || $ip === '::1') {
            return true;
        }

        return !filter_var(
            $ip,
            FILTER_VALIDATE_IP,
            FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE
        );
    }

    /**
     * Convert ISO 2-letter country code into flag emoji
     */
    public static function countryCodeToFlag(?string $code): string
    {
        if (empty($code) || strlen($code) !== 2 || $code === 'UN' || $code === 'LOC') {
            return '🌐';
        }

        $code = strtoupper($code);
        $firstChar = ord($code[0]) - 65 + 0x1F1E6;
        $secondChar = ord($code[1]) - 65 + 0x1F1E6;

        return mb_chr($firstChar, 'UTF-8') . mb_chr($secondChar, 'UTF-8');
    }

    /**
     * Map common ISO codes to country names
     */
    public static function countryNameFromCode(string $code): string
    {
        $countries = [
            'LK' => 'Sri Lanka',
            'US' => 'United States',
            'GB' => 'United Kingdom',
            'IN' => 'India',
            'AU' => 'Australia',
            'CA' => 'Canada',
            'DE' => 'Germany',
            'FR' => 'France',
            'IT' => 'Italy',
            'ES' => 'Spain',
            'NL' => 'Netherlands',
            'SG' => 'Singapore',
            'MY' => 'Malaysia',
            'AE' => 'United Arab Emirates',
            'SA' => 'Saudi Arabia',
            'QA' => 'Qatar',
            'JP' => 'Japan',
            'CN' => 'China',
            'KR' => 'South Korea',
            'BR' => 'Brazil',
            'ZA' => 'South Africa',
            'NZ' => 'New Zealand',
            'PK' => 'Pakistan',
            'BD' => 'Bangladesh',
            'MV' => 'Maldives',
            'KW' => 'Kuwait',
            'OM' => 'Oman',
            'BH' => 'Bahrain',
            'PH' => 'Philippines',
            'TH' => 'Thailand',
            'VN' => 'Vietnam',
            'ID' => 'Indonesia',
            'RU' => 'Russia',
            'TR' => 'Turkey',
            'EG' => 'Egypt',
            'NG' => 'Nigeria',
            'KE' => 'Kenya',
            'SE' => 'Sweden',
            'NO' => 'Norway',
            'DK' => 'Denmark',
            'FI' => 'Finland',
            'CH' => 'Switzerland',
            'AT' => 'Austria',
            'BE' => 'Belgium',
            'IE' => 'Ireland',
            'PL' => 'Poland',
            'PT' => 'Portugal',
            'GR' => 'Greece',
            'IL' => 'Israel',
            'MX' => 'Mexico',
            'AR' => 'Argentina',
            'CO' => 'Colombia',
            'CL' => 'Chile',
        ];

        return $countries[strtoupper($code)] ?? $code;
    }
}

