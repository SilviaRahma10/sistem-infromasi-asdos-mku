<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Registration extends Model
{
    use HasFactory;

    public function student()
    {
        return $this->hasOne(Student::class, 'id', 'id_student');
    }

    public function schoolyear() 
    {
        return $this->hasOne(SchoolYear::class, 'id', 'id_schoolyear');
    }

    public function generalsubject()
    {
        return $this->hasOne(GeneralSubject::class, 'id', 'id_generalsubject');
    }

    public function documentregistration()
    {
        return $this->hasOne(DocumentRegistration::class, 'id_registration', 'id');
    }




}
