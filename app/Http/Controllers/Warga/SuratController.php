<?php

namespace App\Http\Controllers\Warga;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TableSuratJenisModel as SuratJenis;
use App\Models\TableSuratPermohonanModel as SuratPermohonan;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class SuratController extends Controller
{
    /**
     * Menampilkan daftar jenis surat (Katalog Layanan).
     */
    public function index()
    {
        $jenisSurat = SuratJenis::all();
        return view('warga.surat.index', compact('jenisSurat'));
    }

    /**
     * Menampilkan form pengajuan surat berdasarkan jenis surat yang dipilih.
     *
     * @param int $id ID Jenis Surat
     */
    public function create($id)
    {
        $suratJenis = SuratJenis::findOrFail($id);
        $user = Auth::user();
        $penduduk = $user->penduduk;

        // Debugging Code
        if (!$user->penduduk_id) {
            dd('Error: User ini tidak punya data Penduduk. Cek tabel Users kolom penduduk_id. User ID: ' . $user->id);
        }

        if (!$penduduk) {
            dd('Error: Relasi penduduk mengembalikan null. Cek apakah data penduduk dengan ID ' . $user->penduduk_id . ' ada di tabel penduduk.');
        }
        
        return view('warga.surat.create', compact('suratJenis', 'penduduk'));
    }

    /**
     * Menyimpan data pengajuan surat baru.
     */
    public function store(Request $request)
    {
        $request->validate([
            'surat_jenis_id' => 'required|exists:pgsql_rejosari.surat_jenis,id',
            'keterangan_permohonan' => 'required|string|max:1000',
            'file_pendukung' => 'required|file|mimes:jpg,jpeg,png,pdf|max:2048',
        ], [
            'keterangan_permohonan.required' => 'Kolom keterangan permohonan wajib diisi.',
            'file_pendukung.required' => 'File pendukung wajib diunggah.',
            'file_pendukung.mimes' => 'Format file harus berupa JPG, JPEG, PNG, atau PDF.',
            'file_pendukung.max' => 'Ukuran file maksimal 2MB.',
        ]);

        $user = Auth::user();
        $pendudukId = $user->penduduk_id;

        // Handle File Upload
        $filePath = null;
        if ($request->hasFile('file_pendukung')) {
            $file = $request->file('file_pendukung');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('lampiran'), $filename);
            $filePath = 'lampiran/' . $filename;
        }

        // Generate Nomor Permohonan
        $nomorPermohonan = 'REQ-' . Carbon::now()->timestamp;

        // Simpan ke Database
        SuratPermohonan::create([
            'penduduk_id' => $pendudukId,
            'surat_jenis_id' => $request->surat_jenis_id,
            'nomor_permohonan' => $nomorPermohonan,
            'status' => 'diajukan',
            'keterangan_permohonan' => $request->keterangan_permohonan,
            'file_pendukung' => $filePath,
            'tanggal_permohonan' => now(),
        ]);

        return redirect()->route('warga.dashboard')->with('success', 'Permohonan surat berhasil diajukan.');
    }
}
