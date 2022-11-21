<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tahun_ajaran extends Model
{
    use HasFactory;

    public function program()
    {
        return $this->hasOne(Program::class, 'id_tahun_ajaran', 'id');
    }
}
