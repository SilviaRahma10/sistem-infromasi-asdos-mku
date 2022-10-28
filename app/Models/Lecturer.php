<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lecturer extends Model
{
    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
    public function prodi()
    {
        return $this->hasOne(Prodi::class, 'id', 'prodi_id');
    }

    public function kelas()
    {
        return $this->hasOne(Kelas::class, 'id_dosen_pengampu', 'id');
    }
}
