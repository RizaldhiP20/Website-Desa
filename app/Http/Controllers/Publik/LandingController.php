<?php

namespace App\Http\Controllers\Publik;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// 1. IMPORT (GUNAKAN) MODEL YANG ANDA BUTUHKAN
use App\Models\TableDesaProfileModel as DesaProfile;
use App\Models\TableKegiatanModel as Kegiatan;
use App\Models\TableSuratJenisModel as SuratJenis;
use App\Models\TablePendudukModel as Penduduk;
use App\Models\TableKartuKeluargaModel as KK;
use Illuminate\Support\Facades\Cache; // Untuk performa

class LandingController extends Controller
{
    /**
     * Menampilkan halaman utama (welcome.blade.php)
     * beserta semua data yang dibutuhkannya.
     */
    public function index()
    {
        // 2. AMBIL DATA DARI DATABASE MENGGUNAKAN MODEL

        // Ambil Data Profil Desa (Sambutan, Visi Misi) [cite: 2541-2542]
        // Kita gunakan Cache agar tidak query ke DB setiap ada pengunjung
        $profil = Cache::remember('desa_profile', 3600, function () {
            return DesaProfile::first(); // Asumsi hanya ada 1 data profil
        });

        // Ambil 3 Kegiatan Terbaru (Transparansi) [cite: 2541-2542]
        $kegiatans = Cache::remember('kegiatan_terbaru', 3600, function () {
            return Kegiatan::where('status', 'published')
                           ->orderBy('tanggal_kegiatan', 'desc')
                           ->take(3) // Ambil 3 berita terbaru
                           ->get();
        });

        // Ambil Data Statistik (Real-time) [cite: 2557-2558, 2561-2562, 2566]
        $statistik = Cache::remember('statistik_homepage', 600, function () {
            $totalPenduduk = Penduduk::where('status_penduduk', 'hidup')->count();
            $totalKk = KK::count();
            $totalLakiLaki = Penduduk::where('jenis_kelamin', 'Laki-laki')->where('status_penduduk', 'hidup')->count();
            $totalPerempuan = Penduduk::where('jenis_kelamin', 'Perempuan')->where('status_penduduk', 'hidup')->count();
            
            return [
                'total_penduduk' => $totalPenduduk,
                'total_kk' => $totalKk,
                'total_laki_laki' => $totalLakiLaki,
                'total_perempuan' => $totalPerempuan,
            ];
        });

        // Ambil Daftar Layanan Online (Layanan) [cite: 2545-2546]
        $layananSurat = Cache::remember('jenis_surat', 3600, function () {
            return SuratJenis::orderBy('nama_surat')->get();
        });


        // 3. KIRIM SEMUA DATA KE VIEW 'welcome'
        return view('dashboard', compact(
            'profil',
            'kegiatans',
            'statistik',
            'layananSurat'
        ));
    }
}