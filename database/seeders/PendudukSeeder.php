<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class PendudukSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create('id_ID');
        $kkIds = DB::table('kartu_keluarga')->pluck('id');
        
        $penduduk = [];
        $agamas = ['Islam', 'Kristen', 'Katolik', 'Hindu', 'Buddha'];
        $pekerjaans = ['Petani/Pekebun', 'Petani Tambak', 'Karyawan Swasta', 'Wiraswasta', 'Pelajar/Mahasiswa', 'Mengurus Rumah Tangga', 'Belum/Tidak Bekerja'];

        for ($i = 0; $i < 200; $i++) { // Buat 200 data penduduk
            $jenisKelamin = $faker->randomElement(['Laki-laki', 'Perempuan']);
            $penduduk[] = [
                'kartu_keluarga_id' => $faker->randomElement($kkIds),
                'nik' => $faker->numerify('3524##############'), // 16 digit NIK
                'nama_lengkap' => $faker->name($jenisKelamin == 'Laki-laki' ? 'male' : 'female'),
                'jenis_kelamin' => $jenisKelamin,
                'tempat_lahir' => $faker->city,
                'tanggal_lahir' => $faker->date($format = 'Y-m-d', $max = '2010-01-01'), // Maksimal lahir 2010
                'agama' => $faker->randomElement($agamas),
                'pekerjaan' => $faker->randomElement($pekerjaans),
                'status_perkawinan' => $faker->randomElement(['Belum Kawin', 'Kawin', 'Cerai Hidup', 'Cerai Mati']),
                'pendidikan_terakhir' => $faker->randomElement(['SD', 'SMP', 'SMA/SMK', 'Diploma', 'S1', 'Tidak Sekolah']),
                'status_dalam_kk' => $faker->randomElement(['Kepala Keluarga', 'Istri', 'Anak']),
                'created_at' => now(),
                'updated_at' => now()
            ];
        }
        DB::table('penduduk')->insert($penduduk);
    }
}