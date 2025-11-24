<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class KegiatanSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create('id_ID');
        DB::table('kegiatan')->insert([
            [
                'judul' => 'Pembangunan Saluran Irigasi Dusun Gajah Selesai',
                'deskripsi' => $faker->paragraphs(3, true),
                'kategori' => 'pembangunan',
                'tanggal_kegiatan' => now()->toDateString(),
                'slug' => 'pembangunan-saluran-irigasi-dusun-gajah-selesai',
                'status' => 'published',
                'dibuat_oleh' => null,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'judul' => 'Musyawarah Desa (Musdes) RKPDes Tahun 2026',
                'deskripsi' => $faker->paragraphs(3, true),
                'kategori' => 'pemerintahan',
                'tanggal_kegiatan' => now()->toDateString(),
                'slug' => 'musyawarah-desa-musdes-rkpdes-tahun-2026',
                'status' => 'published',
                'dibuat_oleh' => null,
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);
    }
}