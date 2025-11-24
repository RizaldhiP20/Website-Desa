<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class KartuKeluargaSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create('id_ID');
        $rumahIds = DB::table('rumahs')->pluck('id');
        
        $kks = [];
        for ($i = 0; $i < 60; $i++) { // Buat 60 data KK
            $kks[] = [
                'rumah_id' => $faker->randomElement($rumahIds),
                'nomor_kk' => $faker->numerify('3524################'), // 16 digit NIK/KK
                // 'kepala_keluarga_id' -> Ini diisi nanti setelah data penduduk dibuat
                'created_at' => now(),
                'updated_at' => now()
            ];
        }
    DB::table('kartu_keluarga')->insert($kks);
    }
}