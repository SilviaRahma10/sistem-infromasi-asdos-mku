<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mata_kuliah_prodi extends Model
{
    use HasFactory;

    // public function mku()
    // {
    //     return $this->hasOne(Mata_kuliah::class, 'id', 'id_mata_kuliah');
    // }

    public function mku()
    {
        return $this->belongsTo(Mata_kuliah::class, 'id_mata_kuliah','id');
    }

    public function prodi()
    {
        return $this->hasOne(Prodi::class, 'id', 'id_prodi');
    }

    
    public function kelas()
    {
        return $this->hasMany(Kelas::class, 'id_mata_kuliah_prodi', 'id');
    }
}
