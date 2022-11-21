<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asisten_kelas extends Model
{
    use HasFactory;

    public function pendaftaran()
    {
        return $this->belongsTo(Pendaftaran::class, 'id_mahasiswa_pendaftar', 'id');
    }

    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'id_kelas', 'id');
    }

    
}
