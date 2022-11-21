<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendaftaran extends Model
{
    use HasFactory;

    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'id_mahasiswa', 'id');
    }

    public function program()
    {
        return $this->belongsTo(Program::class, 'id_program', 'id');
    }
    public function mku()
    {
        return $this->belongsTo(Mata_kuliah::class, 'id_mata_kuliah', 'id');
    }

    public function asisten_kelas()
    {
        return $this->hasMany(Asisten_kelas::class, 'id_mahasiswa_pendaftar', 'id');
    }

    // public function asisten(){
    //     return $this->hasOne(Pendaftaran::class,'id_mahasiswa_pendaftar','id');
    // }




}
