<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Models\TableDesaProfileModel;

// Import Controllers
use App\Http\Controllers\Publik\LandingController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\KependudukanController;
use App\Http\Controllers\Admin\LayananController;
use App\Http\Controllers\Admin\PeristiwaKependudukanController;
use App\Http\Controllers\Warga\LayananWargaController as WargaLayananController;
use App\Http\Controllers\Warga\DashboardController as WargaDashboardController;
use App\Http\Controllers\Auth\LoginController;

// TEST ROUTE - Hapus setelah testing berhasil
Route::get('/test', function () {
    return "It's works! Route testing berhasil.";
})->name('test');

// DEBUG ROUTE - Cek Role User
Route::get('/debug-role', function () {
    $user = Auth::user();
    if (!$user) {
        return "User belum login.";
    }

    // Load relasi role secara eksplisit
    $user->load('role');
    
    dd([
        'User Data' => $user->toArray(),
        'Role Relation' => $user->role,
        'Role ID' => $user->role_id
    ]);
});

// DEBUG ROUTE - Cek Model Class
Route::get('/cek-model', function () {
    $user = Auth::user();
    if (!$user) {
        return "User belum login.";
    }
    return get_class($user);
});

// Rute untuk Halaman Publik (Landing Page)
Route::get('/', function () {
    // Mengambil data profil desa untuk ditampilkan di landing page
    $desaProfile = TableDesaProfileModel::first();

    // Mengarahkan ke view landing page dengan data profil desa
    return view('dashboard', ['desaProfile' => $desaProfile]);
})->name('landing');

//=================================================================
// RUTE UNTUK ADMIN
//=================================================================
Route::middleware(['auth:admin', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    //=================================================================
    // MODUL KEPENDUDUKAN (KependudukanController)
    //=================================================================

    // Route untuk PENDUDUK
    Route::get('penduduk', [KependudukanController::class, 'indexPenduduk'])->name('penduduk.index');
    Route::get('penduduk/create', [KependudukanController::class, 'createPenduduk'])->name('penduduk.create');
    Route::post('penduduk', [KependudukanController::class, 'storePenduduk'])->name('penduduk.store');
    Route::get('penduduk/{id}', [KependudukanController::class, 'showPenduduk'])->name('penduduk.show');
    Route::get('penduduk/{id}/edit', [KependudukanController::class, 'editPenduduk'])->name('penduduk.edit');
    Route::put('penduduk/{id}', [KependudukanController::class, 'updatePenduduk'])->name('penduduk.update');
    Route::delete('penduduk/{id}', [KependudukanController::class, 'destroyPenduduk'])->name('penduduk.destroy');

    // Route untuk KARTU KELUARGA
    Route::get('kk', [KependudukanController::class, 'indexKk'])->name('kk.index');
    Route::get('kk/create', [KependudukanController::class, 'createKk'])->name('kk.create');
    Route::post('kk', [KependudukanController::class, 'storeKk'])->name('kk.store');
    Route::get('kk/{id}', [KependudukanController::class, 'showKk'])->name('kk.show');
    Route::get('kk/{id}/edit', [KependudukanController::class, 'editKk'])->name('kk.edit');
    Route::put('kk/{id}', [KependudukanController::class, 'updateKk'])->name('kk.update');
    Route::delete('kk/{id}', [KependudukanController::class, 'destroyKk'])->name('kk.destroy');

    // Route untuk RUMAH (ASOMA)
    Route::get('rumah', [KependudukanController::class, 'indexRumah'])->name('rumah.index');
    Route::get('rumah/create', [KependudukanController::class, 'createRumah'])->name('rumah.create');
    Route::post('rumah', [KependudukanController::class, 'storeRumah'])->name('rumah.store');
    Route::get('rumah/{id}', [KependudukanController::class, 'showRumah'])->name('rumah.show');
    Route::get('rumah/{id}/edit', [KependudukanController::class, 'editRumah'])->name('rumah.edit');
    Route::put('rumah/{id}', [KependudukanController::class, 'updateRumah'])->name('rumah.update');
    Route::delete('rumah/{id}', [KependudukanController::class, 'destroyRumah'])->name('rumah.destroy');

    // Route untuk DUSUN
    Route::get('dusun', [KependudukanController::class, 'indexDusun'])->name('dusun.index');
    Route::get('dusun/create', [KependudukanController::class, 'createDusun'])->name('dusun.create');
    Route::post('dusun', [KependudukanController::class, 'storeDusun'])->name('dusun.store');
    Route::get('dusun/{id}', [KependudukanController::class, 'showDusun'])->name('dusun.show');
    Route::get('dusun/{id}/edit', [KependudukanController::class, 'editDusun'])->name('dusun.edit');
    Route::put('dusun/{id}', [KependudukanController::class, 'updateDusun'])->name('dusun.update');
    Route::delete('dusun/{id}', [KependudukanController::class, 'destroyDusun'])->name('dusun.destroy');

    //=================================================================
    // MODUL LAYANAN (LayananController)
    //=================================================================

    // Route untuk PERMOHONAN SURAT
    Route::get('surat', [LayananController::class, 'indexPermohonan'])->name('surat.index');
    Route::get('surat/{id}', [LayananController::class, 'showPermohonan'])->name('surat.show');
    Route::put('surat/{id}/proses', [LayananController::class, 'prosesPermohonan'])->name('surat.proses');

    // Route untuk JENIS SURAT
    Route::get('surat-jenis', [LayananController::class, 'indexJenisSurat'])->name('surat-jenis.index');
    Route::get('surat-jenis/create', [LayananController::class, 'createJenisSurat'])->name('surat-jenis.create');
    Route::post('surat-jenis', [LayananController::class, 'storeJenisSurat'])->name('surat-jenis.store');
    Route::get('surat-jenis/{id}', [LayananController::class, 'showJenisSurat'])->name('surat-jenis.show');
    Route::get('surat-jenis/{id}/edit', [LayananController::class, 'editJenisSurat'])->name('surat-jenis.edit');
    Route::put('surat-jenis/{id}', [LayananController::class, 'updateJenisSurat'])->name('surat-jenis.update');
    Route::delete('surat-jenis/{id}', [LayananController::class, 'destroyJenisSurat'])->name('surat-jenis.destroy');

    // Route untuk KEGIATAN/BERITA DESA
    Route::get('kegiatan', [LayananController::class, 'indexKegiatan'])->name('kegiatan.index');
    Route::get('kegiatan/create', [LayananController::class, 'createKegiatan'])->name('kegiatan.create');
    Route::post('kegiatan', [LayananController::class, 'storeKegiatan'])->name('kegiatan.store');
    Route::get('kegiatan/{id}/edit', [LayananController::class, 'editKegiatan'])->name('kegiatan.edit');
    Route::put('kegiatan/{id}', [LayananController::class, 'updateKegiatan'])->name('kegiatan.update');
    Route::delete('kegiatan/{id}', [LayananController::class, 'destroyKegiatan'])->name('kegiatan.destroy');

    //=================================================================
    // MODUL PERISTIWA KEPENDUDUKAN (PeristiwaKependudukanController)
    //=================================================================

    Route::prefix('peristiwa')->name('peristiwa.')->group(function () {
        // KELAHIRAN
        Route::get('kelahiran/create', [PeristiwaKependudukanController::class, 'createKelahiran'])->name('kelahiran.create');
        Route::post('kelahiran', [PeristiwaKependudukanController::class, 'storeKelahiran'])->name('kelahiran.store');

        // KEMATIAN
        Route::get('kematian', [PeristiwaKependudukanController::class, 'indexKematian'])->name('kematian.index');
        Route::get('kematian/create', [PeristiwaKependudukanController::class, 'createKematian'])->name('kematian.create');
        Route::post('kematian', [PeristiwaKependudukanController::class, 'storeKematian'])->name('kematian.store');

        // MUTASI
        Route::get('mutasi', [PeristiwaKependudukanController::class, 'indexMutasi'])->name('mutasi.index');
        Route::get('mutasi/create', [PeristiwaKependudukanController::class, 'createMutasi'])->name('mutasi.create');
        Route::post('mutasi', [PeristiwaKependudukanController::class, 'storeMutasi'])->name('mutasi.store');
    });
});

//=================================================================
// AUTHENTICATION ROUTES (Refactored)
//=================================================================

// 1. Admin Authentication
Route::get('/admin/login', [LoginController::class, 'showAdminLoginForm'])->name('admin.login');
Route::post('/admin/login', [LoginController::class, 'loginAdmin'])->name('admin.login.post');

// 2. Warga Authentication
Route::get('/login', [LoginController::class, 'showWargaLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'loginWarga'])->name('login.attempt');

// 3. Logout (Handles both)
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Alias: kunjungan ke `/login/admin` akan diarahkan ke `/admin/login`
Route::get('/login/admin', function () {
    return redirect()->route('admin.login');
})->name('login.admin');

//=================================================================
// RUTE UNTUK WARGA
//=================================================================

Route::prefix('warga')->name('warga.')->group(function () {
    Route::middleware(['auth:web', 'role:warga'])->group(function () {
        Route::get('dashboard', [WargaDashboardController::class, 'index'])->name('dashboard');
        
        // Layanan Surat (Refactored)
        Route::get('layanan', [\App\Http\Controllers\Warga\SuratController::class, 'index'])->name('surat.index');
        Route::get('layanan/{id}/buat', [\App\Http\Controllers\Warga\SuratController::class, 'create'])->name('surat.create');
        Route::post('layanan', [\App\Http\Controllers\Warga\SuratController::class, 'store'])->name('surat.store');
        
        // Riwayat Pengajuan (Existing)
        Route::get('riwayat', [WargaLayananController::class, 'index'])->name('layanan.index');
    });
});
