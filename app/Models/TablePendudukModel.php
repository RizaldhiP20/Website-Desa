<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

// --- PERHATIKAN BAGIAN INI (WAJIB) ---
// Jangan gunakan: use Illuminate\Database\Eloquent\Model;
// Gunakan ini:
use Illuminate\Foundation\Auth\User as Authenticatable; 
use Illuminate\Notifications\Notifiable;
// -------------------------------------

use App\Models\TableKartuKeluargaModel;
use App\Models\TableUserModel;
use App\Models\TableSuratPermohonanModel;
use App\Models\TableDusunModel;

// Ubah 'extends Model' menjadi 'extends Authenticatable'
class TablePendudukModel extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'rejosari.penduduk';
    protected $connection = 'pgsql_rejosari';
    
    // Laravel Auth membutuhkan primary key. Defaultnya 'id'.
    protected $primaryKey = 'id'; 

    protected $fillable = [
        'dusun_id',
        'kartu_keluarga_id',
        'nama_lengkap',
        'nik',
        'tanggal_lahir',
        'jenis_kelamin',
        'status_dalam_keluarga',
        'status_perkawinan',
        'agama',
        'pekerjaan',
        'pendidikan_terakhir',
        'tempat_lahir',
        'no_identitas',
        'alamat',
        'status_penduduk',
        'nomor_telepon',
        'tanggal_update',
        'keterangan',
        'role_id',
    ];

    protected $casts = [
        'tanggal_lahir' => 'date',
        'tanggal_update' => 'date',
    ];

    // --- RELASI ---

    public function kartuKeluarga()
    {
        return $this->belongsTo(TableKartuKeluargaModel::class, 'kartu_keluarga_id');
    }

    public function user()
    {
        return $this->hasOne(TableUserModel::class);
    }

    public function permohonanSurat()
    {
        return $this->hasMany(TableSuratPermohonanModel::class);
    }

    public function dusun()
    {
        return $this->belongsTo(TableDusunModel::class, 'dusun_id');
    }

    public function role()
    {
        return $this->belongsTo(TableRoleModel::class, 'role_id');
    }

    /**
     * Cek apakah user memiliki role tertentu.
     *
     * @param string $roleName
     * @return bool
     */
    public function hasRole($roleName)
    {
        return $this->role && $this->role->name === $roleName;
    }

    // --- ACCESSOR ---

    protected function umur(): Attribute
    {
        return Attribute::make(
            get: fn ($value, $attributes) => Carbon::parse($attributes['tanggal_lahir'])->age,
        );
    }

    // --- SCOPE ---

    public function scopeHidup($query)
    {
        return $query->where('status_penduduk', 'hidup');
    }

    public function scopeLakiLaki($query)
    {
        return $query->where('jenis_kelamin', 'Laki-laki');
    }

    public function scopePerempuan($query)
    {
        return $query->where('jenis_kelamin', 'Perempuan');
    }

    public function scopeBalita($query)
    {
        return $query->where('tanggal_lahir', '>=', Carbon::now()->subYears(5));
    }
}