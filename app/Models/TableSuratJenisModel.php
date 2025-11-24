<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TableSuratJenisModel extends Model
{
    protected $table = 'surat_jenis';
    protected $connection = 'pgsql_rejosari';
    protected $fillable = ['kode_surat', 'nama_surat'];
}