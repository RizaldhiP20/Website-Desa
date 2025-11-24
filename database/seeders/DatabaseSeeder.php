<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Panggil seeder secara berurutan
        // Penting: Urutan harus dari "parent" ke "child"
        $this->call([
            DusunSeeder::class,       // 1. Buat Dusun dulu
            RumahSeeder::class,       // 2. Buat Rumah (Asoma)
            KartuKeluargaSeeder::class,          // 3. Buat Kartu Keluarga
            PendudukSeeder::class,    // 4. Buat Penduduk (Jiwa)
            UserSeeder::class,      // 5. Buat Akun Admin & Warga
            KegiatanSeeder::class,    // 6. Buat Berita/Kegiatan (untuk transparansi)
            SuratJenisSeeder::class,  // 7. Buat Jenis Surat (untuk layanan online)
        ]);
    }
}