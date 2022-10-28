<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prodi extends Model
{
    use HasFactory;
    // Relasi prodi - fakultas ( 1-1 = 1 prodi berasa dari 1 fakultas)
    
    public function fakultas()
    {
        return $this->hasOne(Fakultas::class, 'id', 'fakultas_id');
    }

    public function lectures()
    {
        return $this->hasMany(Lecturer::class, 'prodi_id', 'id');
    }

    public function prodikelas()
    {
        return $this->hasMany(ProdiKelas::class, 'prodi_id', 'id');
    }

    public function student()
    {
        return $this->hasMany(Student::class, 'prodi_id', 'id');
    }

    public function kelas()
    {
        return $this->hasMany(kelas::class,'prodi_id', 'id');
    }


}
