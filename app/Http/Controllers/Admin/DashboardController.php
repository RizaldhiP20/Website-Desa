<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;

// Import Models
use App\Models\TablePendudukModel as Penduduk;
use App\Models\TableKartuKeluargaModel as KK;
use App\Models\TableSuratPermohonanModel as SuratPermohonan;

class DashboardController extends Controller
{
    /**
     * Menampilkan halaman dashboard admin dengan semua data statistik.
     */
    public function index()
    {
        // 1. Total Penduduk (Status 'Hidup')
        // Menggunakan scopeHidup jika tersedia, atau query manual
        $total_penduduk = Penduduk::where('status_penduduk', 'Hidup')->count();

        // 2. Total Kepala Keluarga
        $total_kk = KK::count();

        // 3. Surat Pending (Status 'diajukan')
        $surat_pending = SuratPermohonan::where('status', 'diajukan')->count();

        // 4. Surat Selesai (Status 'selesai')
        $surat_selesai = SuratPermohonan::where('status', 'selesai')->count();

        // 5. Kelahiran Bulan Ini
        $kelahiran_bulan_ini = \App\Models\TablePeristiwaKelahiranModel::whereMonth('tanggal_lahir', Carbon::now()->month)
                                ->whereYear('tanggal_lahir', Carbon::now()->year)
                                ->count();

        // 6. Recent Requests (5 Latest Surat Permohonan)
        $recent_surat = SuratPermohonan::with(['penduduk', 'suratJenis'])
                                            ->orderBy('created_at', 'desc')
                                            ->take(5)
                                            ->get();

        // Return view with data
        return view('admin.dashboard', compact(
            'total_penduduk',
            'total_kk',
            'surat_pending',
            'surat_selesai',
            'kelahiran_bulan_ini',
            'recent_surat'
        ));
    }
}