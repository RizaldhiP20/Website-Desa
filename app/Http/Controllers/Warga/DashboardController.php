<?php

namespace App\Http\Controllers\Warga;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\TableSuratPermohonanModel as SuratPermohonan;

class DashboardController extends Controller
{
    /**
     * Menampilkan dashboard untuk warga.
     */
    public function index()
    {
        // 1. Ambil user yang sedang login
        $user = Auth::user();

        // 2. Ambil data penduduk dari relasi user
        $penduduk = $user->penduduk; 

        // Pastikan penduduk ditemukan
        if (!$penduduk) {
            return redirect()->route('login')->with('error', 'Data penduduk tidak ditemukan.');
        }

        $pendudukId = $penduduk->id;

        // Ambil data statistik permohonan surat milik warga
        $totalPermohonan = SuratPermohonan::where('penduduk_id', $pendudukId)->count();
        $permohonanDiproses = SuratPermohonan::where('penduduk_id', $pendudukId)
                                              ->whereIn('status', ['diajukan', 'diproses'])
                                              ->count();
        $permohonanSelesai = SuratPermohonan::where('penduduk_id', $pendudukId)
                                             ->where('status', 'selesai')
                                             ->count();

        // Ambil 5 permohonan surat terbaru untuk ditampilkan di dashboard
        $permohonans = SuratPermohonan::with('suratJenis')
                                ->where('penduduk_id', $pendudukId)
                                ->orderBy('tanggal_permohonan', 'desc')
                                ->take(5)
                                ->get();
        
        // 3. Kirim variabel ke view (menggunakan view yang ada 'auth.dashboardwarga')
        return view('auth.dashboardwarga', compact(
            'user',
            'penduduk',
            'totalPermohonan',
            'permohonanDiproses',
            'permohonanSelesai',
            'permohonans'
        ));
    }
}