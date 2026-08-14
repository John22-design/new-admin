<?php

namespace Database\Seeders;

use App\Models\Visitor;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class VisitorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (Visitor::count() > 20) {
            return;
        }

        $pages = [
            '/' => 'http://localhost/',
            '/blog' => 'http://localhost/blog',
            '/blog/empowering-youth-future' => 'http://localhost/blog/empowering-youth-future',
            '/blog/community-outreach-program' => 'http://localhost/blog/community-outreach-program',
            '/blog/annual-fundraising-gala' => 'http://localhost/blog/annual-fundraising-gala',
        ];

        $devices = [
            'Desktop' => 58,
            'Mobile' => 36,
            'Tablet' => 6,
        ];

        $browsers = [
            'Chrome' => 62,
            'Safari' => 21,
            'Firefox' => 9,
            'Edge' => 6,
            'Opera' => 2,
        ];

        $platforms = [
            'Windows' => 45,
            'macOS' => 25,
            'iOS' => 16,
            'Android' => 12,
            'Linux' => 2,
        ];

        $referers = [
            'https://www.google.com/',
            'https://www.bing.com/',
            'https://t.co/',
            'https://www.facebook.com/',
            'https://www.linkedin.com/',
            null,
            null,
        ];

        $records = [];
        $now = Carbon::now();

        // Seed data for the past 30 days
        for ($day = 30; $day >= 0; $day--) {
            $date = $now->copy()->subDays($day);
            $visitsToday = rand(15, 65) + ($day === 0 ? rand(5, 20) : 0);

            for ($i = 0; $i < $visitsToday; $i++) {
                $path = array_rand($pages);
                $url = $pages[$path];

                // Device weighted random
                $device = $this->weightedRandom($devices);
                $browser = $this->weightedRandom($browsers);
                $platform = $this->weightedRandom($platforms);
                $referer = $referers[array_rand($referers)];

                $ipNum = rand(1, 150);
                $rawIp = "192.168." . rand(1, 10) . "." . $ipNum;
                $ipHash = hash('sha256', $rawIp . 'visitor-salt');

                $visitTime = $date->copy()->setTime(rand(0, 23), rand(0, 59), rand(0, 59));

                $records[] = [
                    'ip_hash' => $ipHash,
                    'ip_address' => Visitor::anonymizeIp($rawIp),
                    'url' => $url,
                    'path' => $path,
                    'method' => 'GET',
                    'referer' => $referer,
                    'user_agent' => "Mozilla/5.0 ({$platform}) AppleWebKit/537.36 {$browser}",
                    'device' => $device,
                    'browser' => $browser,
                    'platform' => $platform,
                    'session_id' => 'sess_' . md5($ipHash . $date->toDateString()),
                    'is_robot' => false,
                    'created_at' => $visitTime,
                    'updated_at' => $visitTime,
                ];

                if (count($records) >= 200) {
                    Visitor::insert($records);
                    $records = [];
                }
            }
        }

        if (!empty($records)) {
            Visitor::insert($records);
        }
    }

    private function weightedRandom(array $weightedValues): string
    {
        $rand = rand(1, 100);
        $cumulative = 0;
        foreach ($weightedValues as $value => $weight) {
            $cumulative += $weight;
            if ($rand <= $cumulative) {
                return $value;
            }
        }
        return array_key_first($weightedValues);
    }
}
