<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TableKartuKeluargaModel extends Model
{

    /**
     * Nama tabel yang terkait dengan model.
     *
     * @var string
     */
    protected $table = 'kartu_keluarga'; // Asumsi nama tabel, silakan sesuaikan jika perlu

    /**
     * Koneksi database yang digunakan model ini.
     *
     * @var string
     */
    protected $connection = 'pgsql_rejosari';

    /**
     * Atribut yang dapat diisi secara massal.
     *
     * @var array
     */
    protected $fillable = [
        'no_kk',
        // Tambahkan kolom lain yang relevan di sini
    ];

    /**
     * Mendefinisikan relasi ke model Penduduk.
     */
    public function penduduks()
    {
        return $this->hasMany(TablePendudukModel::class, 'kartu_keluarga_id');
    }

    public function rumah()
    {
        return $this->belongsTo(TableRumahModel::class, 'rumah_id');
    }

    public function KepalaKeluarga()
    {
        return $this->belongsTo(TablePendudukModel::class, 'kepala_keluarga_id');
    }
}

