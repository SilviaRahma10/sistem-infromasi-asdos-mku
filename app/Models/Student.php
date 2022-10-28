<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function prodi()
    {
        return $this->hasOne(Prodi::class, 'id', 'prodi_id');
    }

    public function registration()
    {
        return $this->hasMany(Registration::class, 'id_student', 'id');
    }

    public function asisten()
    {
        return $this->hasMany(KelasAssistent::class, 'id_student', 'id');
    }
}
