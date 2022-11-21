<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;
    // protected $table = 'kelas';
    public $timestamps = false;

    // public function prodi()
    // {
    //     return $this->hasOne(Prodi::class, 'id', 'id_prodi');
    // }

    // public function lecturer()
    // {
    //     return $this->hasOne(Lecturer::class, 'id', 'id_dosen_pengampu');
    // }

    // public function program()
    // {
    //     return $this->hasOne(Program::class, 'id', 'id_program');
    // }

    public function asisten()
    {
        return $this->hasMany(KelasAssistent::class, 'id_kelas', 'id');
    }

    public function prodikelas()
    {
        return $this->hasOne(Program::class, 'id', 'id_prodikelas');
    }

    //baru
    public function dosen()
    {
        return $this->belongsToMany(Dosen::class, 'dosen_pengampus', 'id_kelas', 'id_dosen');
    }

    public function mku_prodi()
    {
        return $this->belongsTo(Mata_kuliah_prodi::class, 'id_mata_kuliah_prodi','id' );
    }

    // public function dosen_pengampu()
    // {
    //     return $this->belongsTo(Mata_kuliah_prodi::class, 'id_mata_kuliah_prodi','id' );
    // }
}

