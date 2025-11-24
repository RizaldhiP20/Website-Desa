<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TablePeristiwaMutasiModel extends Model
{
    use HasFactory;

    protected $table = 'peristiwa_mutasi';
    protected $connection = 'pgsql_rejosari';

    protected $fillable = [
        'penduduk_id',
        'jenis_mutasi',
        'tanggal_mutasi',
        'asal_dusun',
        'asal_desa',
        'asal_kecamatan',
        'asal_kabupaten',
        'dusun_tujuan_id',
        'alasan_mutasi',
        'nomor_surat_keterangan',
        'catatan',
        'status',
        'tanggal_pencatatan',
        'petugas_id',
    ];

    protected $casts = [
        'tanggal_mutasi' => 'date',
        'tanggal_pencatatan' => 'datetime',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * Relasi ke Penduduk (yang melakukan mutasi).
     */
    public function penduduk()
    {
        return $this->belongsTo(TablePendudukModel::class, 'penduduk_id');
    }

    /**
     * Relasi ke Dusun (tujuan mutasi).
     */
    public function dusunTujuan()
    {
        return $this->belongsTo(TableDusunModel::class, 'dusun_tujuan_id');
    }

    /**
     * Scope untuk filter mutasi pindah masuk.
     */
    public function scopePindahMasuk($query)
    {
        return $query->where('jenis_mutasi', 'pindah_masuk');
    }

    /**
     * Scope untuk filter mutasi pindah keluar.
     */
    public function scopePindahKeluar($query)
    {
        return $query->where('jenis_mutasi', 'pindah_keluar');
    }

    /**
     * Scope untuk filter mutasi pindah dalam desa.
     */
    public function scopePindahDalamDesa($query)
    {
        return $query->where('jenis_mutasi', 'pindah_dalam_desa');
    }

    /**
     * Scope untuk filter mutasi yang sudah tercatat.
     */
    public function scopeTercatat($query)
    {
        return $query->where('status', 'tercatat');
    }

    /**
     * Scope untuk filter mutasi yang sudah verified.
     */
    public function scopeVerified($query)
    {
        return $query->where('status', 'verified');
    }
}
