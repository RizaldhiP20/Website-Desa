<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class RumahSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create('id_ID'); // Menggunakan data Indonesia
        $dusunId = DB::table('dusuns')->pluck('id');
        
        $rumah = [];
        for ($i = 0; $i < 50; $i++) { // Buat 50 data rumah
            $rumah[] = [
                'dusun_id' => $faker->randomElement($dusunId),
                'alamat_rumah' => 'Jl. ' . $faker->streetName . ' No. ' . $faker->buildingNumber,
                'rt' => $faker->numberBetween(1, 5),
                'rw' => $faker->numberBetween(1, 3),
                'created_at' => now(),
                'updated_at' => now()
            ];
        }
        DB::table('rumahs')->insert($rumah); // Masukkan semua data sekaligus
    }
}