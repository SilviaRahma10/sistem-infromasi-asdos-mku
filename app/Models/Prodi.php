<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prodi extends Model
{
    use HasFactory;
    // Relasi prodi - fakultas ( 1-1 = 1 prodi berasa dari 1 fakultas)

    public function mataKuliah()
    {
        return $this->belongsToMany(Mata_kuliah::class, 'mata_kuliah_prodis', 'id_prodi', 'id_mata_kuliah');
    }
    
    public function fakultas()
    {
        return $this->belongsTo(Fakultas::class, 'id_fakultas','id');
    }

    public function mata_kuliah_prodi()
    {
        return $this->hasMany(Mata_kuliah_prodi::class, 'id_prodi', 'id');
    }

    public function lectures()
    {
        return $this->hasMany(Lecturer::class, 'prodi_id', 'id');
    }

    public function prodikelas()
    {
        return $this->hasMany(ProdiKelas::class, 'prodi_id', 'id');
    }

    // public function student()
    // {
    //     return $this->hasMany(Student::class, 'prodi_id', 'id');
    // }

    public function kelas()
    {
        return $this->hasMany(kelas::class,'prodi_id', 'id');
    }

    //baru
    public function dosen()
    {
        return $this->hasMany(Dosen::class, 'id_prodi', 'id');
    }

    public function mahasiswa()
    {
        return $this->hasMany(Mahasiswa::class, 'prodi_id', 'id');
    }


}
