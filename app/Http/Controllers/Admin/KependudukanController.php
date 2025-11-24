<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

// IMPORT SEMUA MODEL YANG DIBUTUHKAN
use App\Models\TablePendudukModel as Penduduk;
use App\Models\TableKartuKeluargaModel as KK;
use App\Models\TableRumahModel as Rumah;
use App\Models\TableDusunModel as Dusun;

class KependudukanController extends Controller
{
    //=================================================================
    // FUNGSI UNTUK MODUL PENDUDUK
    //=================================================================

    /**
     * Menampilkan halaman daftar semua penduduk (READ).
     */
    public function indexPenduduk(Request $request)
    {
        $query = Penduduk::with('kartuKeluarga.rumah.dusun');
        if ($request->has('search') && $request->search != '') {
            $query->where('nama', 'like', '%' . $request->search . '%')
                  ->orWhere('no_identitas', 'like', '%' . $request->search . '%');
        }
        $penduduks = $query->where('status_penduduk', 'hidup')
                           ->orderBy('nama', 'asc')
                           ->paginate(20);
        return view('admin.penduduk.index', compact('penduduks'));
    }

    /**
     * Menampilkan form untuk menambah penduduk baru (CREATE Form).
     */
    public function createPenduduk()
    {
        $kartuKeluargas = KK::orderBy('no_kk')->get();
        $dusuns = Dusun::all();
        return view('admin.penduduk.create', compact('kartuKeluargas', 'dusuns'));
    }

    /**
     * Menyimpan data penduduk baru ke database (CREATE Logic).
     */
    public function storePenduduk(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'no_identitas' => 'required|string|max:16|unique:pgsql_rejosari.penduduk,no_identitas',
            'no_kk' => 'required|string|exists:pgsql_rejosari.kartu_keluarga,no_kk',
            // ... (validasi lainnya dari PendudukController)
        ]);
        
        Penduduk::create($request->all());
        return redirect()->route('admin.penduduk.index')->with('success', 'Data penduduk berhasil ditambahkan.');
    }

    /**
     * Menampilkan detail satu penduduk.
     */
    public function showPenduduk(string $id)
    {
         $penduduk = Penduduk::with('kartuKeluarga.rumah.dusun')->findOrFail($id);
         return view('admin.penduduk.show', compact('penduduk'));
    }

    /**
     * Menampilkan form untuk mengedit data penduduk (UPDATE Form).
     */
    public function editPenduduk(string $id)
    {
        $penduduk = Penduduk::findOrFail($id);
        $kartuKeluargas = KK::orderBy('no_kk')->get();
        $dusuns = Dusun::all();
        return view('admin.penduduk.edit', compact('penduduk', 'kartuKeluargas', 'dusuns'));
    }

    /**
     * Memperbarui data penduduk di database (UPDATE Logic).
     */
    public function updatePenduduk(Request $request, string $id)
    {
        $penduduk = Penduduk::findOrFail($id);
        $request->validate([
            'nama' => 'required|string|max:255',
            'no_identitas' => 'required|string|max:16|unique:pgsql_rejosari.penduduk,no_identitas,' . $penduduk->id,
            // ... (validasi lainnya)
        ]);
        $penduduk->update($request->all());
        return redirect()->route('admin.penduduk.index')->with('success', 'Data penduduk berhasil diperbarui.');
    }

    /**
     * Menghapus data penduduk (DELETE).
     */
    public function destroyPenduduk(string $id)
    {
        try {
            $penduduk = Penduduk::findOrFail($id);
            $penduduk->delete();
            return redirect()->route('admin.penduduk.index')->with('success', 'Data penduduk (salah input) berhasil dihapus.');
        } catch (\Exception $e) {
            return redirect()->route('admin.penduduk.index')->with('error', 'Gagal menghapus data.');
        }
    }


    //=================================================================
    // FUNGSI UNTUK MODUL KARTU KELUARGA
    //=================================================================

    /**
     * Menampilkan daftar semua Kartu Keluarga.
     */
    public function indexKk(Request $request)
    {
        $query = KK::with('kepalaKeluarga', 'rumah.dusun');
        if ($request->has('search') && $request->search != '') {
            $query->where('nomor_kk', 'like', '%' . $request->search . '%')
                  ->orWhereHas('kepalaKeluarga', function($q) use ($request) {
                      $q->where('nama_lengkap', 'like', '%' . $request->search . '%');
                  });
        }
        $kartuKeluargas = $query->orderBy('nomor_kk', 'asc')->paginate(20);
        return view('admin.kk.index', compact('kartuKeluargas'));
    }

    /**
     * Menampilkan form untuk membuat KK baru (termasuk "Pecah KK").
     */
    public function createKk()
    {
        $rumahs = Rumah::with('dusun')->orderBy('alamat_rumah')->get();
        $calonKepalaKeluarga = Penduduk::where('status_penduduk', 'hidup')
                                     ->orderBy('nama_lengkap')
                                     ->get();
        return view('admin.kk.create', compact('rumahs', 'calonKepalaKeluarga'));
    }

    /**
     * Menyimpan data KK baru ke database.
     */
    public function storeKk(Request $request)
    {
        $request->validate([
            'nomor_kk' => 'required|string|max:16|unique:pgsql_rejosari.kartu_keluarga,nomor_kk',
            'rumah_id' => 'required|exists:pgsql_rejosari.rumahs,id',
            'kepala_keluarga_id' => 'nullable|exists:pgsql_rejosari.penduduk,id',
        ]);

        $kk = KK::create($request->all());

        // ... (Logika update kepala keluarga) ...

        return redirect()->route('admin.kk.index')->with('success', 'Kartu Keluarga baru berhasil ditambahkan.');
    }

    /**
     * Menampilkan detail satu KK (termasuk daftar anggota keluarganya).
     */
    public function showKk(string $id)
    {
        $kk = KK::with('penduduks', 'kepalaKeluarga', 'rumah.dusun')->findOrFail($id);
        return view('admin.kk.show', compact('kk'));
    }
    
    // ... (Fungsi editKk, updateKk, destroyKk) ...


    //=================================================================
    // FUNGSI UNTUK MODUL RUMAH (ASOMA)
    //=================================================================

    /**
     * Menampilkan daftar semua rumah (Asoma).
     */
    public function indexRumah(Request $request)
    {
        $query = Rumah::with('dusun')->withCount('kartuKeluargas');
        if ($request->has('search') && $request->search != '') {
            $query->where('alamat_rumah', 'like', '%' . $request->search . '%');
        }
        $rumahs = $query->orderBy('alamat_rumah')->paginate(25);
        return view('admin.rumah.index', compact('rumahs'));
    }

    /**
     * Menampilkan form untuk menambah rumah baru.
     */
    public function createRumah()
    {
        $dusuns = Dusun::orderBy('nama_dusun')->get();
        return view('admin.rumah.create', compact('dusuns'));
    }

    /**
     * Menyimpan data rumah (Asoma) baru ke database.
     */
    public function storeRumah(Request $request)
    {
        $request->validate([
            'alamat_rumah' => 'required|string|max:255',
            'dusun_id' => 'required|exists:pgsql_rejosari.dusuns,id',
            'rt' => 'required|integer|min:1',
            'rw' => 'required|integer|min:1',
        ]);
        Rumah::create($request->all());
        return redirect()->route('admin.rumah.index')->with('success', 'Data Rumah (Asoma) berhasil ditambahkan.');
    }

    // ... (Fungsi showRumah, editRumah, updateRumah, destroyRumah) ...


    //=================================================================
    // FUNGSI UNTUK MODUL DUSUN
    //=================================================================

    /**
     * Menampilkan daftar semua dusun beserta statistik singkat.
     */
    public function indexDusun()
    {
        // Ambil data dusun beserta jumlah rumah, kk, dan penduduk
        $dusuns = Dusun::withCount(['rumahs', 'kartuKeluargas', 'penduduk' => function ($query) {
            $query->where('status_penduduk', 'hidup');
        }])->orderBy('nama_dusun')->get();

        return view('admin.dusun.index', compact('dusuns'));
    }

    /**
     * Menampilkan form untuk menambah dusun baru.
     */
    public function createDusun()
    {
        return view('admin.dusun.create');
    }

    /**
     * Menyimpan dusun baru ke database.
     */
    public function storeDusun(Request $request)
    {
        $request->validate([
            'nama_dusun' => 'required|string|max:255|unique:pgsql_rejosari.dusuns,nama_dusun',
            'kepala_dusun' => 'nullable|string|max:255',
            'deskripsi' => 'nullable|string',
        ]);

        Dusun::create($request->all());

        return redirect()->route('admin.dusun.index')->with('success', 'Data Dusun berhasil ditambahkan.');
    }

    /**
     * Menampilkan detail satu dusun (termasuk daftar KK dan Penduduk di dalamnya).
     */
    public function showDusun(string $id)
    {
        $dusun = Dusun::with(['rumahs', 'kartuKeluargas', 'penduduk' => function ($query) {
            $query->where('status_penduduk', 'hidup')->orderBy('nama_lengkap');
        }])->findOrFail($id);
        
        return view('admin.dusun.show', compact('dusun'));
    }

    /**
     * Menampilkan form untuk mengedit data dusun.
     */
    public function editDusun(string $id)
    {
        $dusun = Dusun::findOrFail($id);
        return view('admin.dusun.edit', compact('dusun'));
    }

    /**
     * Memperbarui data dusun di database.
     */
    public function updateDusun(Request $request, string $id)
    {
        $dusun = Dusun::findOrFail($id);

        $request->validate([
            'nama_dusun' => 'required|string|max:255|unique:pgsql_rejosari.dusuns,nama_dusun,' . $dusun->id,
            'kepala_dusun' => 'nullable|string|max:255',
            'deskripsi' => 'nullable|string',
        ]);

        $dusun->update($request->all());

        return redirect()->route('admin.dusun.index')->with('success', 'Data Dusun berhasil diperbarui.');
    }

    /**
     * Menghapus data dusun.
     */
    public function destroyDusun(string $id)
    {
        // Hati-hati: Menghapus dusun akan menghapus semua rumah, kk, dan penduduk
        // yang terkait dengannya (karena onDelete('cascade') di migrasi)
        try {
            $dusun = Dusun::findOrFail($id);
            $dusun->delete();
            return redirect()->route('admin.dusun.index')->with('success', 'Data Dusun dan semua data terkait (rumah, kk, penduduk) berhasil dihapus.');
        } catch (\Exception $e) {
            return redirect()->route('admin.dusun.index')->with('error', 'Gagal menghapus data.');
        }
    }
}