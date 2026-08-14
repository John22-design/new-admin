<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\Visitor;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Analytics extends Controller
{
    public function index()
    {
        $today = Carbon::today();
        $yesterday = Carbon::yesterday();
        $startOfMonth = Carbon::now()->startOfMonth();
        $startOfWeek = Carbon::now()->startOfWeek();

        // Base query for human visitors
        $baseQuery = Visitor::where('is_robot', false);

        // Core metric counters
        $totalVisitors = (clone $baseQuery)->count();
        $uniqueVisitors = (clone $baseQuery)->distinct('ip_hash')->count('ip_hash');
        $todayVisitors = (clone $baseQuery)->where('created_at', '>=', $today)->count();
        $yesterdayVisitors = (clone $baseQuery)->whereBetween('created_at', [$yesterday->copy()->startOfDay(), $yesterday->copy()->endOfDay()])->count();
        $weekVisitors = (clone $baseQuery)->where('created_at', '>=', $startOfWeek)->count();
        $monthVisitors = (clone $baseQuery)->where('created_at', '>=', $startOfMonth)->count();

        // Calculate today vs yesterday growth percentage
        $todayGrowth = 0;
        if ($yesterdayVisitors > 0) {
            $todayGrowth = round((($todayVisitors - $yesterdayVisitors) / $yesterdayVisitors) * 100, 1);
        } elseif ($todayVisitors > 0) {
            $todayGrowth = 100;
        }

        // Daily traffic trend for the last 14 days
        $daysCount = 14;
        $chartDates = [];
        $chartPageviews = [];
        $chartUniques = [];

        for ($i = $daysCount - 1; $i >= 0; $i--) {
            $date = Carbon::today()->subDays($i);
            $dateStr = $date->format('Y-m-d');
            $chartDates[] = $date->format('M d');

            $dayVisits = (clone $baseQuery)
                ->whereDate('created_at', $dateStr)
                ->count();

            $dayUniques = (clone $baseQuery)
                ->whereDate('created_at', $dateStr)
                ->distinct('ip_hash')
                ->count('ip_hash');

            $chartPageviews[] = $dayVisits;
            $chartUniques[] = $dayUniques;
        }

        // Device breakdown
        $deviceCounts = (clone $baseQuery)
            ->select('device', DB::raw('count(*) as total'))
            ->groupBy('device')
            ->pluck('total', 'device')
            ->toArray();

        $desktopCount = $deviceCounts['Desktop'] ?? 0;
        $mobileCount = $deviceCounts['Mobile'] ?? 0;
        $tabletCount = $deviceCounts['Tablet'] ?? 0;
        $totalDevices = max(1, $desktopCount + $mobileCount + $tabletCount);

        $deviceStats = [
            'desktop' => $desktopCount,
            'mobile' => $mobileCount,
            'tablet' => $tabletCount,
            'desktop_pct' => round(($desktopCount / $totalDevices) * 100, 1),
            'mobile_pct' => round(($mobileCount / $totalDevices) * 100, 1),
            'tablet_pct' => round(($tabletCount / $totalDevices) * 100, 1),
        ];

        // Browser distribution
        $browserStats = (clone $baseQuery)
            ->select('browser', DB::raw('count(*) as total'))
            ->groupBy('browser')
            ->orderByDesc('total')
            ->limit(5)
            ->get();

        // Top Visited Pages
        $topPages = (clone $baseQuery)
            ->select('path', DB::raw('count(*) as total_views'), DB::raw('count(distinct ip_hash) as unique_views'))
            ->groupBy('path')
            ->orderByDesc('total_views')
            ->limit(6)
            ->get();

        // Recent visitor logs (latest 10)
        $recentVisitors = (clone $baseQuery)
            ->latest()
            ->limit(10)
            ->get();

        return view('content.dashboard.dashboards-analytics', compact(
            'totalVisitors',
            'uniqueVisitors',
            'todayVisitors',
            'yesterdayVisitors',
            'todayGrowth',
            'weekVisitors',
            'monthVisitors',
            'chartDates',
            'chartPageviews',
            'chartUniques',
            'deviceStats',
            'browserStats',
            'topPages',
            'recentVisitors'
        ));
    }
}
