<?php

namespace App\Http\Middleware;

use App\Models\Visitor;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Log;

class TrackVisitor
{
    /**
     * Handle an incoming request and track visitor analytics.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);

        // Only track successful GET HTML requests
        if ($request->isMethod('GET') && $this->shouldTrack($request)) {
            $this->logVisit($request);
        }

        return $response;
    }

    /**
     * Determine if the request should be logged.
     */
    protected function shouldTrack(Request $request): bool
    {
        $path = $request->path();

        // Ignored path patterns
        $ignoredPatterns = [
            'dashboard*',
            'auth*',
            'testimonials*',
            'blog-posts*',
            'website/*',
            'api/*',
            'build/*',
            'assets/*',
            'vendor/*',
            'storage/*',
            '_debugbar*',
            'favicon.ico',
            'robots.txt',
            'up',
        ];

        foreach ($ignoredPatterns as $pattern) {
            if ($request->is($pattern)) {
                return false;
            }
        }

        // Ignore AJAX / JSON / API requests
        if ($request->ajax() || $request->wantsJson()) {
            return false;
        }

        // Ignore assets by extension
        if (preg_match('/\.(css|js|png|jpg|jpeg|gif|svg|ico|webp|woff|woff2|ttf|eot|map|json)$/i', $path)) {
            return false;
        }

        return true;
    }

    /**
     * Record the visit in the database.
     */
    protected function logVisit(Request $request): void
    {
        try {
            $rawIp = $request->ip();
            $userAgent = (string) $request->userAgent();
            $path = '/' . ltrim($request->path(), '/');

            // Prevent flooding identical hits within 10 seconds for the same session/IP and path
            $ipHash = hash('sha256', ($rawIp ?? '127.0.0.1') . (config('app.key') ?? 'visitor-salt'));
            $recentVisit = Visitor::where('ip_hash', $ipHash)
                ->where('path', $path)
                ->where('created_at', '>=', now()->subSeconds(10))
                ->exists();

            if ($recentVisit) {
                return;
            }

            Visitor::create([
                'ip_hash' => $ipHash,
                'ip_address' => Visitor::anonymizeIp($rawIp),
                'url' => $request->fullUrl(),
                'path' => $path,
                'method' => $request->method(),
                'referer' => $request->header('referer'),
                'user_agent' => $userAgent,
                'device' => Visitor::detectDevice($userAgent),
                'browser' => Visitor::detectBrowser($userAgent),
                'platform' => Visitor::detectPlatform($userAgent),
                'session_id' => $request->hasSession() ? $request->session()->getId() : null,
                'is_robot' => Visitor::isRobot($userAgent),
            ]);
        } catch (\Throwable $e) {
            // Silently log or ignore tracking errors so they never disrupt user requests
            Log::debug('Visitor tracking error: ' . $e->getMessage());
        }
    }
}
