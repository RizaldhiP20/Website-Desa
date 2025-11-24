<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SuratJenisSeeder extends Seeder
{
    public function run()
    {
        DB::table('surat_jenis')->insert([
            ['nama_surat' => 'Surat Pengantar KTP', 'kode_surat' => 'SK-KTP'],
            ['nama_surat' => 'Surat Pengantar KK', 'kode_surat' => 'SK-KK'],
            ['nama_surat' => 'Surat Keterangan Domisili', 'kode_surat' => 'SK-DOMISILI'],
            ['nama_surat' => 'Surat Keterangan Kelahiran', 'kode_surat' => 'SK-LAHIR'],
            ['nama_surat' => 'Surat Keterangan Kematian', 'kode_surat' => 'SK-MATI'],
            ['nama_surat' => 'Surat Keterangan Tidak Mampu', 'kode_surat' => 'SKTM'],
        ]);
    }
}