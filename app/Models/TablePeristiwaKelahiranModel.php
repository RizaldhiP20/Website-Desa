<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TablePeristiwaKelahiranModel extends Model
{
    use HasFactory;

    protected $table = 'peristiwa_kelahiran';
    protected $connection = 'pgsql_rejosari';

    protected $fillable = [
        'penduduk_id',
        'nama_bayi',
        'jenis_kelamin',
        'tanggal_lahir',
        'tempat_lahir',
        'jam_lahir',
        'ibu_id',
        'ayah_id',
        'nomor_akte_kelahiran',
        'catatan',
        'status',
        'tanggal_pencatatan',
        'petugas_id',
    ];

    protected $casts = [
        'tanggal_lahir' => 'date',
        'jam_lahir' => 'time',
        'tanggal_pencatatan' => 'datetime',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * Relasi ke Penduduk (yang melaporkan/penduduk bayi).
     */
    public function penduduk()
    {
        return $this->belongsTo(TablePendudukModel::class, 'penduduk_id');
    }

    /**
     * Relasi ke Penduduk (Ibu).
     */
    public function ibu()
    {
        return $this->belongsTo(TablePendudukModel::class, 'ibu_id');
    }

    /**
     * Relasi ke Penduduk (Ayah).
     */
    public function ayah()
    {
        return $this->belongsTo(TablePendudukModel::class, 'ayah_id');
    }

    /**
     * Scope untuk filter kelahiran yang sudah tercatat.
     */
    public function scopeTercatat($query)
    {
        return $query->where('status', 'tercatat');
    }

    /**
     * Scope untuk filter kelahiran yang sudah verified.
     */
    public function scopeVerified($query)
    {
        return $query->where('status', 'verified');
    }
}
