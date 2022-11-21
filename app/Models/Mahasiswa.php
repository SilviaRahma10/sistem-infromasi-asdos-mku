<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;
    protected $fillable = [
        'npm',
        'prodi_id',
        'angkatan',
        'address',
        'no_hp',
        'gender',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    // public function prodi()
    // {
    //     return $this->hasOne(Prodi::class, 'id', 'prodi_id');
    // }

    public function pendaftaran()
    {
        return $this->hasMany(Pendaftaran::class, 'id_mahasiswa', 'id');
    }

    public function prodi()
    {
        return $this->belongsTo(Prodi::class, 'prodi_id', 'id');
    }
}
