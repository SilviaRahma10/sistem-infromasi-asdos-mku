<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mata_kuliah extends Model
{
    use HasFactory;

    public $timestamps = false;

    public function prodi()
    {
        return $this->belongsToMany(Prodi::class, 'mata_kuliah_prodis', 'id_mata_kuliah', 'id_prodi');
    }
    
    public function mata_kuliah_prodi()
    {
        return $this->belongsToMany(Prodi::class, 'mata_kuliah_prodis', 'id_mata_kuliah', 'id_prodi');
    }

    public function program()
    {
        return $this->belongsToMany(Program::class, 'mku_programs','id_mata_kuliah', 'id_program');
    }

    public function pendaftaran()
    {
        return $this->hasMany(Pendaftaran::class, 'id_mata_kuliah', 'id');
    }

    public function koordinator()
    {
        return $this->hasOne(Koordinator::class, 'id_mku', 'id');
    }

}
