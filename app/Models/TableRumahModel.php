<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TableRumahModel extends Model
{
    use HasFactory;
    protected $table = 'rumahs';
    protected $connection = 'pgsql_rejosari';

    protected $fillable = ['alamat_rumah', 'dusun_id', 'rt', 'rw'];

    /**
     * Relasi ke Dusun (Satu Rumah dimiliki satu Dusun).
     */
    public function dusun()
    {
        return $this->belongsTo(TableDusunModel::class, 'dusun_id');
    }

    /**
     * Relasi ke Kartu Keluarga (Satu Rumah bisa punya BANYAK KK).
     * (Sesuai permintaan Pak Carik "didalam satu rumah bisa 2 KK")
     */
    public function kartuKeluargas()
    {
        return $this->hasMany(TableKartuKeluargaModel::class, 'rumah_id');
    }
}