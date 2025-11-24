<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

// IMPORT SEMUA MODEL YANG DIBUTUHKAN
use App\Models\TableSuratPermohonanModel as SuratPermohonan;
use App\Models\TableSuratJenisModel as SuratJenis;
use App\Models\TablePendudukModel as Penduduk;
use App\Models\TableKegiatanModel as Kegiatan;

class LayananController extends Controller
{
    //=================================================================
    // FUNGSI UNTUK MODUL PERMOHONAN SURAT
    //=================================================================

    /**
     * Menampilkan daftar semua permohonan surat (yang masih 'diajukan' atau 'diproses').
     */
    public function indexPermohonan()
    {
        // Ambil data permohonan yang masih baru atau sedang diproses
        $permohonans = SuratPermohonan::with('penduduk', 'suratJenis') // Load relasi
                                      ->whereIn('status', ['diajukan', 'diproses'])
                                      ->orderBy('tanggal_permohonan', 'asc')
                                      ->paginate(15);
                                      
        return view('admin.surat.index', compact('permohonans'));
    }

    /**
     * Menampilkan detail satu permohonan untuk diproses.
     */
    public function showPermohonan(string $id)
    {
        $permohonan = SuratPermohonan::with('penduduk', 'suratJenis')->findOrFail($id);
        return view('admin.surat.show', compact('permohonan'));
    }

    /**
     * Memproses (Approve/Reject) permohonan surat.
     */
    public function prosesPermohonan(Request $request, string $id)
    {
        $request->validate([
            'status' => 'required|in:selesai,ditolak', // Pastikan status yang dikirim valid
            'alasan_penolakan' => 'nullable|string|max:500',
            'catatan_internal' => 'nullable|string|max:500',
        ]);

        $permohonan = SuratPermohonan::findOrFail($id);

        // Update status permohonan
        $permohonan->status = $request->status;
        $permohonan->petugas_id = Auth::id(); // Catat siapa petugas yang memproses
        $permohonan->tanggal_diproses = now();
        
        if ($request->status == 'selesai') {
            $permohonan->tanggal_selesai = now();
        }

        if ($request->status == 'ditolak') {
            $permohonan->alasan_penolakan = $request->alasan_penolakan;
        }
        
        $permohonan->catatan_internal = $request->catatan_internal;
        $permohonan->save();

        return redirect()->route('admin.surat.index')->with('success', 'Permohonan surat berhasil diproses.');
    }


    //=================================================================
    // FUNGSI UNTUK MODUL JENIS SURAT
    //=================================================================

    /**
     * Menampilkan daftar semua jenis surat.
     */
    public function indexJenisSurat()
    {
        $suratJenis = SuratJenis::orderBy('nama_surat')->get();
        return view('admin.surat_jenis.index', compact('suratJenis'));
    }

    /**
     * Menampilkan form untuk menambah jenis surat baru.
     */
    public function createJenisSurat()
    {
        return view('admin.surat_jenis.create');
    }

    /**
     * Menyimpan jenis surat baru.
     */
    public function storeJenisSurat(Request $request)
    {
        $request->validate([
            'nama_surat' => 'required|string|max:255',
            'kode_surat' => 'required|string|max:50|unique:pgsql_rejosari.surat_jenis,kode_surat',
        ]);

        SuratJenis::create($request->all());

        return redirect()->route('admin.surat_jenis.index')->with('success', 'Jenis Surat baru berhasil ditambahkan.');
    }

    /**
     * Menampilkan form untuk mengedit jenis surat.
     */
    public function editJenisSurat(string $id)
    {
        $suratJenis = SuratJenis::findOrFail($id);
        return view('admin.surat_jenis.edit', compact('suratJenis'));
    }

    /**
     * Memperbarui data jenis surat.
     */
    public function updateJenisSurat(Request $request, string $id)
    {
        $suratJenis = SuratJenis::findOrFail($id);

        $request->validate([
            'nama_surat' => 'required|string|max:255',
            'kode_surat' => 'required|string|max:50|unique:pgsql_rejosari.surat_jenis,kode_surat,' . $suratJenis->id,
        ]);

        $suratJenis->update($request->all());

        return redirect()->route('admin.surat_jenis.index')->with('success', 'Jenis Surat berhasil diperbarui.');
    }

    /**
     * Menghapus data jenis surat.
     */
    public function destroyJenisSurat(string $id)
    {
        try {
            $suratJenis = SuratJenis::findOrFail($id);
            $suratJenis->delete();
            return redirect()->route('admin.surat_jenis.index')->with('success', 'Jenis Surat berhasil dihapus.');
        } catch (\Exception $e) {
            // Jika sudah digunakan di permohonan (onDelete restrict), akan error
            return redirect()->route('admin.surat_jenis.index')->with('error', 'Gagal menghapus! Jenis surat ini mungkin sudah digunakan di data permohonan.');
        }
    }


    //=================================================================
    // FUNGSI UNTUK MODUL KEGIATAN/BERITA DESA
    //=================================================================

    /**
     * Menampilkan daftar semua kegiatan/berita desa.
     */
    public function indexKegiatan()
    {
        $kegiatans = Kegiatan::orderBy('tanggal_kegiatan', 'desc')->paginate(15);
        return view('admin.kegiatan.index', compact('kegiatans'));
    }

    /**
     * Menampilkan form untuk membuat kegiatan baru.
     */
    public function createKegiatan()
    {
        return view('admin.kegiatan.create');
    }

    /**
     * Menyimpan kegiatan baru ke database.
     */
    public function storeKegiatan(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'kategori' => 'required|string|in:pembangunan,pemerintahan,pembinaan,pemasyarakatan,lainnya',
            'tanggal_kegiatan' => 'required|date',
            'status' => 'required|string|in:draft,published',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048', // Validasi gambar
        ]);

        $data = $request->except('foto');
        $data['slug'] = Str::slug($request->judul) . '-' . time(); // Membuat slug unik
        $data['dibuat_oleh'] = Auth::id();

        // Logika Upload Foto
        if ($request->hasFile('foto')) {
            $path = $request->file('foto')->store('public/kegiatan');
            $data['foto'] = $path;
        }

        Kegiatan::create($data);

        return redirect()->route('admin.kegiatan.index')->with('success', 'Kegiatan/Berita berhasil dipublikasikan.');
    }

    /**
     * Menampilkan form untuk mengedit kegiatan.
     */
    public function editKegiatan(string $id)
    {
        $kegiatan = Kegiatan::findOrFail($id);
        return view('admin.kegiatan.edit', compact('kegiatan'));
    }

    /**
     * Memperbarui data kegiatan di database.
     */
    public function updateKegiatan(Request $request, string $id)
    {
        $kegiatan = Kegiatan::findOrFail($id);

        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'kategori' => 'required|string|in:pembangunan,pemerintahan,pembinaan,pemasyarakatan,lainnya',
            'tanggal_kegiatan' => 'required|date',
            'status' => 'required|string|in:draft,published',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        $data = $request->except('foto');
        $data['slug'] = Str::slug($request->judul) . '-' . $kegiatan->id; // Update slug

        // Logika Update Foto (Hapus foto lama jika ada foto baru)
        if ($request->hasFile('foto')) {
            // Hapus foto lama
            if ($kegiatan->foto) {
                Storage::delete($kegiatan->foto);
            }
            // Simpan foto baru
            $path = $request->file('foto')->store('public/kegiatan');
            $data['foto'] = $path;
        }

        $kegiatan->update($data);

        return redirect()->route('admin.kegiatan.index')->with('success', 'Kegiatan/Berita berhasil diperbarui.');
    }

    /**
     * Menghapus data kegiatan.
     */
    public function destroyKegiatan(string $id)
    {
        try {
            $kegiatan = Kegiatan::findOrFail($id);

            // Hapus foto dari storage
            if ($kegiatan->foto) {
                Storage::delete($kegiatan->foto);
            }
            
            $kegiatan->delete();

            return redirect()->route('admin.kegiatan.index')->with('success', 'Kegiatan/Berita berhasil dihapus.');
        } catch (\Exception $e) {
            return redirect()->route('admin.kegiatan.index')->with('error', 'Gagal menghapus data.');
        }
    }
}