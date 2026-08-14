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
}
