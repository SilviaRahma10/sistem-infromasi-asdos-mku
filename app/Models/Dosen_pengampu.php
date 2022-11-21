<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dosen_pengampu extends Model
{
    use HasFactory;
    public function dosen()
    {
        return $this->hasOne(Dosen::class, 'id', 'id_dosen');
    }

    public function kelas()
    {
        return $this->hasOne(Kelas::class, 'id', 'id_kelas');
        
    }
    
}
