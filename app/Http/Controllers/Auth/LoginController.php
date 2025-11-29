<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\TablePendudukModel as Penduduk;
use Illuminate\Support\Facades\RateLimiter;

class LoginController extends Controller
{
    // =================================================================
    // WARGA AUTHENTICATION
    // =================================================================

    public function showWargaLoginForm()
    {
        return view('auth.login-warga');
    }

    public function loginWarga(Request $request)
    {
        $credentials = $request->validate([
            'nik' => 'required|digits:16',
            'no_kk' => 'required|digits:16',
        ]);

        // Custom Authentication Logic for Warga (using NIK & KK)
        $warga = Penduduk::where('nik', $request->nik)
            ->whereHas('kartuKeluarga', function ($query) use ($request) {
                $query->where('nomor_kk', $request->no_kk);
            })
            ->first();

        if ($warga) {
            Auth::guard('web')->login($warga);
            $request->session()->regenerate();
            return redirect()->route('warga.dashboard');
        }

        return back()->withErrors([
            'nik' => 'Kombinasi NIK dan Nomor KK tidak ditemukan.',
        ])->onlyInput('nik', 'no_kk');
    }

    // =================================================================
    // ADMIN AUTHENTICATION
    // =================================================================

    public function showAdminLoginForm()
    {
        return view('auth.login-admin');
    }

    public function loginAdmin(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::guard('admin')->attempt($credentials)) {
            $request->session()->regenerate();
            
            // Clear Rate Limiter on success
            $ip = $request->ip();
            $key = 'login_admin_' . $ip;
            RateLimiter::clear($key);

            return redirect()->route('admin.dashboard');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        // 1. Logout dari guard standar (web)
        // Ini akan melogout siapa saja (baik Admin maupun Warga)
        Auth::logout();

        // 2. Hapus sesi agar aman
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // 3. Redirect ke halaman login
        return redirect()->route('login');
    }

    public function showBlockedPage(Request $request)
    {
        // Check if retry_after session exists
        if (!session()->has('retry_after')) {
            return redirect()->route('admin.login');
        }

        return view('auth.blocked');
    }
}
