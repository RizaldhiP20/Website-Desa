<?php

namespace App\Http\Controllers\Warga;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TableSuratJenisModel as SuratJenis;
use App\Models\TableSuratPermohonanModel as SuratPermohonan;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class LayananWargaController extends Controller
{
    /**
     * Menampilkan halaman riwayat pengajuan surat milik warga yang login.
     */
    public function index()
    {
        $pendudukId = Auth::user()->penduduk_id;
        $permohonans = SuratPermohonan::with('suratJenis')
                                    ->where('penduduk_id', $pendudukId)
                                    ->orderBy('tanggal_permohonan', 'desc')
                                    ->paginate(10);
                                    
        return view('warga.layanan.index', compact('permohonans'));
    }

    /**
     * Menampilkan form untuk membuat permohonan surat baru.
     */
    public function create()
    {
        // Ambil semua jenis surat untuk ditampilkan di dropdown
        $jenisSurat = SuratJenis::all();
        return view('warga.layanan.create', compact('jenisSurat'));
    }

    /**
     * Menyimpan permohonan surat baru ke database.
     */
    public function store(Request $request)
    {
        $request->validate([
            'surat_jenis_id' => 'required|exists:pgsql_rejosari.surat_jenis,id',
            'keterangan_permohonan' => 'required|string|max:1000',
            // 'file_pendukung' => 'nullable|file|mimes:jpg,png,pdf|max:2048' // Opsional jika ada upload
        ]);

        $user = Auth::user();
        $pendudukId = $user->penduduk_id;

        // Buat nomor permohonan unik (Contoh: SURAT-20251118-001)
        $nomorPermohonan = 'SRT-' . Carbon::now()->format('Ymd') . '-' . str_pad(SuratPermohonan::count() + 1, 3, '0', STR_PAD_LEFT);

        // Simpan data permohonan
        SuratPermohonan::create([
            'penduduk_id' => $pendudukId,
            'surat_jenis_id' => $request->surat_jenis_id,
            'nomor_permohonan' => $nomorPermohonan,
            'status' => 'diajukan', // Status awal
            'keterangan_permohonan' => $request->keterangan_permohonan,
            'tanggal_permohonan' => now(),
        ]);

        return redirect()->route('warga.layanan.index')->with('success', 'Permohonan surat berhasil diajukan. Silakan tunggu konfirmasi dari petugas.');
    }
}