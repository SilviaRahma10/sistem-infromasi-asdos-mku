<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KelasAssistent extends Model
{
    protected $table = "kelas_assistents";
    use HasFactory;

    public function student()
    {
        return $this->hasOne(Student::class, 'id', 'id_student');
    }

    public function generalsubject()
    {
        return $this->hasOne(GeneralSubject::class, 'id', 'id_generalsubject');
    }

    public function schoolyear() 
    {
        return $this->hasOne(SchoolYear::class, 'id', 'id_schoolyear');
    }

    public function kelas()
    {
        return $this->hasOne(Kelas::class, 'id', 'id_kelas');
    }

}
