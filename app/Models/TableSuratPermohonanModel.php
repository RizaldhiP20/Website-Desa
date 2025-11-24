<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TableSuratPermohonanModel extends Model
{
    use HasFactory;

    protected $table = 'surat_permohonans';
    protected $connection = 'pgsql_rejosari';

    protected $fillable = [
        'penduduk_id',
        'surat_jenis_id',
        'nomor_permohonan',
        'status',
        'keterangan_permohonan',
        'alasan_penolakan',
        'file_pendukung',
        'tanggal_permohonan',
        'tanggal_diproses',
        'tanggal_selesai',
        'petugas_id',
        'catatan_internal',
    ];

    protected $casts = [
        'tanggal_permohonan' => 'datetime',
        'tanggal_diproses' => 'datetime',
        'tanggal_selesai' => 'datetime',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * Relasi ke Penduduk (yang mengajukan).
     */
    public function penduduk()
    {
        return $this->belongsTo(TablePendudukModel::class, 'penduduk_id');
    }

    /**
     * Relasi ke Surat Jenis (tipe surat yang diminta).
     */
    public function suratJenis()
    {
        return $this->belongsTo(TableSuratJenisModel::class, 'surat_jenis_id');
    }

    /**
     * Scope untuk filter permohonan yang diajukan.
     */
    public function scopeDiajukan($query)
    {
        return $query->where('status', 'diajukan');
    }

    /**
     * Scope untuk filter permohonan yang sedang diproses.
     */
    public function scopeDiproses($query)
    {
        return $query->where('status', 'diproses');
    }

    /**
     * Scope untuk filter permohonan yang sudah selesai.
     */
    public function scopeSelesai($query)
    {
        return $query->where('status', 'selesai');
    }

    /**
     * Scope untuk filter permohonan yang ditolak.
     */
    public function scopeDitolak($query)
    {
        return $query->where('status', 'ditolak');
    }
}
