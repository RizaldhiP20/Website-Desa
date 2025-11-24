<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TablePeristiwaKelahiranModel as PeristiwaKelahiran;
use App\Models\TablePeristiwaKematianModel as PeristiwaKematian;
use App\Models\TablePeristiwaMutasiModel as PeristiwaMutasi;
use App\Models\TablePendudukModel as Penduduk;
use App\Models\TableKartuKeluargaModel as KK;
use App\Models\TableDusunModel as Dusun;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Exception;

class PeristiwaKependudukanController extends Controller
{
    //=================================================================
    // FUNGSI UNTUK KELAHIRAN
    // (Dipindah dari PeristiwaKelahiranController.php)
    //=================================================================
    
    /**
     * Menampilkan form untuk mencatat kelahiran baru.
     */
    public function createKelahiran()
    {
        $kartuKeluargas = KK::with('kepalaKeluarga')->orderBy('nomor_kk')->get();
        $penduduks = Penduduk::where('status_penduduk', 'hidup')->orderBy('nama_lengkap')->get();
        return view('admin.peristiwa.kelahiran.create', compact('kartuKeluargas', 'penduduks'));
    }

    /**
     * Menyimpan data kelahiran baru dan menambah data penduduk baru (Real-Time Update).
     */
    public function storeKelahiran(Request $request)
    {
        $request->validate([
            'nama_bayi' => 'required|string|max:255',
            'nik' => 'required|string|max:16|unique:pgsql_rejosari.penduduk,nik',
            'kartu_keluarga_id' => 'required|exists:pgsql_rejosari.kartu_keluarga,id',
            // ... (validasi lainnya)
        ]);

        DB::connection('pgsql_rejosari')->beginTransaction();
        try {
            // 1. Buat data PENDUDUK (Jiwa) baru untuk si bayi
            $pendudukBaru = Penduduk::create([
                'kartu_keluarga_id' => $request->kartu_keluarga_id,
                'nik' => $request->nik,
                'nama_lengkap' => $request->nama_bayi,
                'jenis_kelamin' => $request->jenis_kelamin,
                'tempat_lahir' => $request->tempat_lahir,
                'tanggal_lahir' => $request->tanggal_lahir,
                'agama' => $request->agama,
                'pekerjaan' => $request->pekerjaan ?? 'Belum/Tidak Bekerja',
                'pendidikan_terakhir' => $request->pendidikan_terakhir ?? 'Belum Sekolah',
                'status_dalam_kk' => 'Anak',
                'status_perkawinan' => 'Belum Kawin',
                'status_penduduk' => 'hidup',
                'dusun_id' => KK::find($request->kartu_keluarga_id)->rumah->dusun_id,
            ]);

            // 2. Buat data PERISTIWA KELAHIRAN
            PeristiwaKelahiran::create([
                'penduduk_id' => $pendudukBaru->id,
                'nama_bayi' => $request->nama_bayi,
                // ... (isi data peristiwa lainnya)
                'petugas_id' => Auth::id(),
                'status' => 'verified',
            ]);

            DB::connection('pgsql_rejosari')->commit();
            return redirect()->route('admin.penduduk.index')->with('success', 'Data kelahiran berhasil dicatat. Data penduduk telah bertambah.');
        } catch (Exception $e) {
            DB::connection('pgsql_rejosari')->rollBack();
            return redirect()->back()->with('error', 'Gagal menyimpan data: ' . $e->getMessage())->withInput();
        }
    }

    //=================================================================
    // FUNGSI UNTUK KEMATIAN
    // (Dipindah dari PeristiwaKematianController.php)
    //=================================================================

    /**
     * Menampilkan daftar peristiwa kematian.
     */
    public function indexKematian()
    {
        $peristiwas = PeristiwaKematian::with('penduduk')->orderBy('tanggal_kematian', 'desc')->paginate(20);
        return view('admin.peristiwa.kematian.index', compact('peristiwas'));
    }

    /**
     * Menampilkan form untuk mencatat kematian baru.
     */
    public function createKematian()
    {
        $penduduks = Penduduk::where('status_penduduk', 'hidup')->orderBy('nama_lengkap')->get();
        return view('admin.peristiwa.kematian.create', compact('penduduks'));
    }

    /**
     * Menyimpan data kematian baru dan mengupdate status penduduk (Real-Time Update).
     */
    public function storeKematian(Request $request)
    {
        $request->validate([
            'penduduk_id' => 'required|exists:pgsql_rejosari.penduduk,id',
            'tanggal_kematian' => 'required|date',
            // ... (validasi lainnya)
        ]);

        DB::connection('pgsql_rejosari')->beginTransaction();
        try {
            // 1. Cari penduduk
            $penduduk = Penduduk::findOrFail($request->penduduk_id);

            // 2. Update status penduduk menjadi 'meninggal'
            $penduduk->status_penduduk = 'meninggal';
            $penduduk->save();

            // 3. Buat data Peristiwa Kematian
            $data = $request->all();
            $data['petugas_id'] = Auth::id();
            $data['status'] = 'verified';
            PeristiwaKematian::create($data);

            DB::connection('pgsql_rejosari')->commit();
            return redirect()->route('admin.peristiwa.kematian.index')->with('success', 'Data kematian berhasil dicatat. Status penduduk telah diupdate.');
        } catch (Exception $e) {
            DB::connection('pgsql_rejosari')->rollBack();
            return redirect()->back()->with('error', 'Gagal menyimpan data: ' . $e->getMessage())->withInput();
        }
    }
    
    //=================================================================
    // FUNGSI UNTUK MUTASI
    // (Dipindah dari PeristiwaMutasiController.php)
    //=================================================================

    /**
     * Menampilkan daftar peristiwa mutasi.
     */
    public function indexMutasi()
    {
        $peristiwas = PeristiwaMutasi::with('penduduk')->orderBy('tanggal_mutasi', 'desc')->paginate(20);
        return view('admin.peristiwa.mutasi.index', compact('peristiwas'));
    }
    
    /**
     * Menampilkan form untuk mencatat mutasi baru.
     */
    public function createMutasi()
    {
        $penduduks = Penduduk::where('status_penduduk', 'hidup')->orderBy('nama_lengkap')->get();
        $dusuns = Dusun::orderBy('nama_dusun')->get();
        return view('admin.peristiwa.mutasi.create', compact('penduduks', 'dusuns'));
    }

    /**
     * Menyimpan data mutasi baru dan mengupdate status penduduk (Real-Time Update).
     */
    public function storeMutasi(Request $request)
    {
         $request->validate([
            'penduduk_id' => 'required|exists:pgsql_rejosari.penduduk,id',
            'jenis_mutasi' => 'required|in:pindah_masuk,pindah_keluar,pindah_dalam_desa',
            // ... (validasi lainnya)
        ]);

    }
}