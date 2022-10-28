<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GeneralSubject extends Model
{
    use HasFactory;

    public function prodi()
    {
        return $this->hasMany(Prodi::class, 'id', 'prodi_id');
    }

    public function registration()
    {
        return $this->hasMany(Registration::class, 'id_generalsubject', 'id');
    }

    public function lecturer()
    {
        return $this->hasMany(Lecturer::class, 'id_dosen_pengampu', 'id');
    }

    // public function asisten()
    // {
    //     return $this->hasMany(KelasAssistent::class,'id_generalsubject', 'id');
    // }
}
