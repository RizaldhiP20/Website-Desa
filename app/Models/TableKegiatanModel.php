<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TableKegiatanModel extends Model
{
    // Nama tabel di database adalah 'kegiatan' (bukan plural 'kegiatans')
    protected $table = 'kegiatan';
    protected $connection = 'pgsql_rejosari';

    // Mass assignable (tambahan opsional untuk seeding / create)
    protected $fillable = [
        'judul', 'deskripsi', 'kategori', 'tanggal_kegiatan', 'foto', 'slug', 'status', 'dibuat_oleh'
    ];
}
