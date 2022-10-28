<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SchoolYear extends Model
{
    use HasFactory;

    public function registration()
    {
        return $this->hasMany(Registration::class, 'id_schoolyear', 'id');
    }

    public function asisten()
    {
        return $this->hasMany(KelasAssistent::class, 'id_schoolyear', 'id');
    }

    public function program()
    {
        return $this->hasMany(Program::class, 'id_schoolyear', 'id');
    }
}
