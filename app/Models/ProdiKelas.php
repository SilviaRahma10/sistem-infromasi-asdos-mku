<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProdiKelas extends Model
{
    use HasFactory;

    public function prodi()
    {
        return $this->hasOne(Prodi::class, 'id', 'prodi_id');
    }

    public function kelas()
    {
        return $this->hasOne(Kelas::class, 'id_prodikelas', 'id');
    }
}
