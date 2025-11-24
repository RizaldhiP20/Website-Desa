<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class TableUserModel extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    protected $connection = 'pgsql';
    protected $table = 'auth.users'; // Lebih aman pakai 'auth.users' biar spesifik

    protected $fillable = [
        'name',
        'email',
        'password',
        'role_id',     // <--- PERBAIKAN: Sesuaikan dengan nama kolom database
        'penduduk_id'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function penduduk()
    {
        // Pastikan TablePendudukModel juga sudah mendefinisikan $table = 'rejosari.penduduk'
        return $this->belongsTo(TablePendudukModel::class, 'penduduk_id');
    }

    public function role()
    {
        // Menggunakan TableRoleModel sebagai referensi Role
        // Parameter: (Model Tujuan, Foreign Key di tabel ini, Primary Key di tabel tujuan)
        return $this->belongsTo(TableRoleModel::class, 'role_id', 'id');
    }
    
    // Helper untuk cek role
    public function hasRole($roleName)
    {
        // Pastikan role tidak null sebelum cek name
        return $this->role && $this->role->name === $roleName;
    }
}