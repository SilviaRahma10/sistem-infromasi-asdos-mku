<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mku_program extends Model
{
    use HasFactory;
    public $timestamps = false;

    public function mmku()
    {
        return $this->hasOne(Mata_kuliah::class, 'id', 'id_mata_kuliah');
    }

    public function mku()
    {
        return $this->belongsTo(Mata_kuliah::class, 'id_mata_kuliah', 'id');
    }



    public function program()
{
    return $this->belongsTo(Program::class, 'id_program', 'id');
}
}
