<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    use HasFactory;

    public function prodikelas()
    {
        return $this->hasMany(Kelas::class, 'id_program', 'id');
    }

    public function lecturer()
    {
        return $this->hasMany(Lecturer::class, 'id_dosen_pengampu', 'id');
    }

    public function asisten()
    {
        return $this->hasMany(KelasAssistent::class,'id_generalsubject', 'id');
    }

    public function registration()
    {
        return $this->hasMany(Registration::class, 'id_generalsubject', 'id');
    }

    public function generalsubject()
    {
        return $this->hasOne(GeneralSubject::class, 'id', 'id_generalsubject');
    }
    public function kelas()
    {
        return $this->hasMany(Kelas::class, 'id_program', 'id');
    }

    public function schoolyear()
    {
        return $this->hasOne(SchoolYear::class, 'id', 'id_schoolyear');
    }

    public function prodi()
    {
        return $this->hasMany(Prodi::class, 'id', 'prodi_id');
    }
}
