<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $role): Response
    {
        // 1. Cek apakah user sudah login
        if (!Auth::check()) {
            if ($request->is('admin/*')) {
                return redirect()->route('admin.login');
            }
            return redirect()->route('login');
        }

        /** @var \App\Models\TableUserModel $user */
        $user = Auth::user();

        // 2. Cek Role menggunakan Helper hasRole()
        if (!$user->hasRole($role)) {
             // Debugging info (Optional, remove in production)
             // dd($user->role); 
             abort(403, "ANDA TIDAK MEMILIKI AKSES (ROLE USER: " . ($user->role->name ?? 'NONE') . ", REQUIRED: $role)");
        }

        return $next($request);
    }
}