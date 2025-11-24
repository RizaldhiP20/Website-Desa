<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TablePeristiwaKematianModel extends Model
{
    use HasFactory;

    protected $table = 'peristiwa_kematian';
    protected $connection = 'pgsql_rejosari';

    protected $fillable = [
        'penduduk_id',
        'tanggal_kematian',
        'jam_kematian',
        'tempat_kematian',
        'penyebab_kematian',
        'nomor_akte_kematian',
        'pelapor',
        'hubungan_pelapor',
        'catatan',
        'status',
        'tanggal_pencatatan',
        'petugas_id',
    ];

    protected $casts = [
        'tanggal_kematian' => 'date',
        'jam_kematian' => 'time',
        'tanggal_pencatatan' => 'datetime',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * Relasi ke Penduduk (yang meninggal).
     */
    public function penduduk()
    {
        return $this->belongsTo(TablePendudukModel::class, 'penduduk_id');
    }

    /**
     * Scope untuk filter kematian yang sudah tercatat.
     */
    public function scopeTercatat($query)
    {
        return $query->where('status', 'tercatat');
    }

    /**
     * Scope untuk filter kematian yang sudah verified.
     */
    public function scopeVerified($query)
    {
        return $query->where('status', 'verified');
    }
}
