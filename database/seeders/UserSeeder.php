<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\TablePendudukModel as Penduduk;

class UserSeeder extends Seeder
{
    public function run()
    {
        // 1. Buat Akun Admin (Perangkat Desa)
        DB::table('users')->updateOrInsert(
            ['email' => 'admin@rejosari.id'],
            [
                'name' => 'Admin Desa Rejosari',
                'password' => Hash::make('12345678'), // Ganti password ini
                'role' => 'admin',
                'created_at' => now(),
                'updated_at' => now()
            ]
        );

        // 2. Buat 5 Akun Warga (Penduduk)
        $penduduk = Penduduk::take(5)->get(); // Ambil 5 data penduduk pertama

        foreach ($penduduk as $penduduk) {
            $email = strtolower(str_replace(' ', '', $penduduk->nama_lengkap)) . '@warga.id';
            DB::table('users')->updateOrInsert(
                ['email' => $email],
                [
                    'name' => $penduduk->nama_lengkap,
                    'password' => Hash::make('12345678'),
                    'role' => 'warga',
                    'penduduk_id' => $penduduk->id, // Tautkan ke data penduduk
                    'created_at' => now(),
                    'updated_at' => now()
                ]
            );
        }
    }
}