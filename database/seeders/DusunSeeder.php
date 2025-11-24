<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DusunSeeder extends Seeder
{
    public function run()
    {
        DB::table('dusuns')->insert([
            [
                'nama_dusun' => 'Dusun Gajah',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nama_dusun' => 'Dusun Gapuk',
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);
    }
}
