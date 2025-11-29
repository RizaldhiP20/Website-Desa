<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Symfony\Component\HttpFoundation\Response;

class LoginSecurity
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $ip = $request->ip();

        // Step 1: Database Block Check
        $isBlocked = \Illuminate\Support\Facades\DB::table('auth.ip_blocks')
            ->where('ip_address', $ip)
            ->where('unblock_at', '>', now())
            ->exists();

        if ($isBlocked) {
            return response()->view('auth.banned', [], 403);
        }

        $key = 'login_admin_' . $ip;
        $maxAttempts = 3;
        $decaySeconds = 60;

        // Step 2: Standard Rate Limiting
        if (RateLimiter::tooManyAttempts($key, $maxAttempts)) {
            // Logic to ADD to Database (Recursive blocking)
            $recursiveKey = 'recursive_block_' . $ip;
            
            // Increment the recursive counter. We keep this memory for 10 minutes.
            RateLimiter::hit($recursiveKey, 600);

            if (RateLimiter::tooManyAttempts($recursiveKey, 3)) {
                // Insert into DB for 1 Hour Block
                \Illuminate\Support\Facades\DB::table('auth.ip_blocks')->insert([
                    'ip_address' => $ip,
                    'blocked_at' => now(),
                    'unblock_at' => now()->addHour(),
                    'reason' => 'Recursive Rate Limit Block (Too many 60s blocks)',
                ]);

                RateLimiter::clear($recursiveKey); // Reset recursive counter
                
                return response()->view('auth.banned', [], 403);
            }

            $seconds = RateLimiter::availableIn($key);

            return redirect()->route('blocked')
                ->with('retry_after', $seconds);
        }

        // Only increment attempts on POST requests (login attempts)
        if ($request->isMethod('post')) {
            RateLimiter::hit($key, $decaySeconds);
        }

        return $next($request);
    }
}
