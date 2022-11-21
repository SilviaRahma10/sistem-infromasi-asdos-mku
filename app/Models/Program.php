<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    use HasFactory;
    public $timestamps = false;

    // public function prodikelas()
    // {
    //     return $this->hasMany(Kelas::class, 'id_program', 'id');
    // }

    // public function lecturer()
    // {
    //     return $this->hasMany(Lecturer::class, 'id_dosen_pengampu', 'id');
    // }

    // public function asisten()
    // {
    //     return $this->hasMany(KelasAssistent::class,'id_generalsubject', 'id');
    // }

    public function registration()
    {
        return $this->hasMany(Registration::class, 'id_program', 'id');
    }

    // public function generalsubject()
    // {
    //     return $this->hasOne(GeneralSubject::class, 'id', 'id_generalsubject');
    // }

    // public function kelas()
    // {
    //     return $this->hasMany(Kelas::class, 'id_program', 'id');
    // }

    // public function prodi()
    // {
    //     return $this->hasMany(Prodi::class, 'id', 'prodi_id');
    // }

    // public function tahun_ajarn()
    // {
    //     return $this->hasOne(Tahun_ajaran::class, 'id', 'id_tahun_ajaran');
    // }

    public function tahun_ajaran()
    {
        return $this->belongsTo(Tahun_ajaran::class, 'id_tahun_ajaran', 'id');
    }

    public function mataKuliah()
    {
        return $this->belongsToMany(Mata_kuliah::class, 'mku_programs', 'id_program', 'id_mata_kuliah');
    }

    public function mku_program()
    {
        return $this->hasMany(Mku_program::class, 'id_program', ' id');
    }

    public function pendaftaran()
    {
        return $this->hasMany(Pendaftaran::class, 'id_program', 'id');
    }
}
