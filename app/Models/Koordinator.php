<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Koordinator extends Model
{
    use HasFactory;

    protected $fillable = [
        'nip',
        'no_hp',
     
    ];


    public function mku()
    {
        return $this->belongsTo(Mata_kuliah::class, 'id_mku','id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
