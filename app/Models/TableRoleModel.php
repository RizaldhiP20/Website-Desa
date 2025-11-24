<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TableRoleModel extends Model
{
    // PENTING: Definisikan koneksi dan nama tabel secara eksplisit
    // karena tabelnya ada di schema 'auth', bukan 'public'
    protected $connection = 'pgsql'; 
    protected $table = 'auth.roles'; 
    
    protected $fillable = ['name', 'label'];

    // (Opsional) Relasi ke Penduduk
    public function penduduk()
    {
        return $this->hasMany(TablePendudukModel::class, 'role_id');
    }
    
    // (Opsional) Relasi ke User (One to Many)
    public function users()
    {
        return $this->hasMany(TableUserModel::class, 'role_id');
    }
}