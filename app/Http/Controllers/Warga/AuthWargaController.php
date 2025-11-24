<?php

namespace App\Http\Controllers\Warga;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
// Pastikan nama model ini sesuai dengan nama file model Anda
use App\Models\TablePendudukModel as Penduduk; 
use Illuminate\Support\Facades\Log;

class AuthWargaController extends Controller
{
    public function showLoginForm()
    {
        // Debug: Log untuk memastikan route dipanggil
        Log::info('Route /login dipanggil');

        // Pastikan view ditemukan
        if (!view()->exists('auth.login')) {
            return "ERROR: View auth.login tidak ditemukan!";
        }
        return view('auth.login');
    }

    public function login(Request $request)
    {
        // 1. Validasi Input (Nama field sesuai `name` di HTML/Postman)
        $credentials = $request->validate([
            'nik' => 'required|digits:16',
            'no_kk' => 'required|digits:16',
        ]);

        // 2. Query Manual ke Database
        // Mencari penduduk yang NIK-nya cocok DAN punya relasi KK dengan nomor_kk yang cocok
        $warga = Penduduk::where('nik', $request->nik)
            ->whereHas('kartuKeluarga', function ($query) use ($request) {
                // PERBAIKAN DISINI: 
                // 'nomor_kk' adalah nama kolom di Database (Tabel kartu_keluarga)
                // $request->no_kk adalah value dari Input Form/Postman
                $query->where('nomor_kk', $request->no_kk);
            })
            ->first();

        // 3. Proses Login
        if ($warga) {
            // Login menggunakan instance model penduduk yang ditemukan
            Auth::guard('web')->login($warga);
            
            $request->session()->regenerate();

            // Redirect ke dashboard warga
            return redirect()->route('warga.dashboard');
        }

        // 4. Jika Gagal (NIK atau KK salah)
        return back()->withErrors([
            'nik' => 'Kombinasi NIK dan Nomor KK tidak ditemukan.',
        ])->onlyInput('nik', 'no_kk');
    }

    public function logout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/'); // Redirect ke halaman awal/landing
    }
}