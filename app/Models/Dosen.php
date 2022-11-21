<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    use HasFactory;

    public function prodi()
    {
        return $this->hasOne(Prodi::class, 'id', 'id_prodi');
    }

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function kelas(){
        return $this->belongsToMany(Kelas::class, 'dosen_pengampus', 'id_dosen', 'id_kelas');
    }
}
