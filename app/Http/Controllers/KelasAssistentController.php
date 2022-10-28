<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Kelas;
use App\Models\Student;
use App\Models\SchoolYear;
use App\Models\Registration;
use App\Models\GeneralSubject;
use App\Models\KelasAssistent;
use App\Http\Requests\StoreKelasAssistentRequest;
use App\Http\Requests\UpdateKelasAssistentRequest;

class KelasAssistentController extends Controller
{
   
    public function pemetaan(Registration $registration)
    {
        $kelas= Kelas::all();
        $student= Student::all();
        $schoolyears = SchoolYear::all();
        $generalsubjects = GeneralSubject::all();
       
        return view('koordinator.kelas_asisstent.pemetaan', compact('registration','kelas','student', 'schoolyears', 'generalsubjects'));
    }

    public function tambah(Request $request, Registration $registration)
    {
        $asisten = new KelasAssistent();
        $asisten->id_schoolyear = $registration->id_schoolyear;
        $asisten->id_generalsubject=$registration->id_generalsubject;
        $asisten->id_student=$registration->id_student;
        $asisten->id_kelas=$request->kelas;
        $asisten->save();

        return redirect()
            ->to(route('asisten.konfirmasi', $asisten->id))
            ->withSuccess('Berhasil Memetakan Asisten Kelas');
    }

    public function konfirmasi(KelasAssistent $asisten){
        $student= Student::all();
        $schoolyear = SchoolYear::all();
        $generalsubject = GeneralSubject::all();
        $kelas = Kelas::all();
        return view('koordinator.kelas_asisstent.konfirmasi', compact('asisten', 'student', 'schoolyear', 'generalsubject', 'kelas'));
    }

    public function data()
    {
        $asisten= KelasAssistent::all();
        $student= Student::all();
        $schoolyear = SchoolYear::all();
        $generalsubject = GeneralSubject::all();
        $kelas = Kelas::all(); 
        return view('koordinator.kelas_asisstent.data', compact('asisten', 'student', 'schoolyear', 'generalsubject', 'kelas'));
    }
    
    public function laporandata()
    {
        $asisten= KelasAssistent::all();
        $student= Student::all();
        $schoolyear = SchoolYear::all();
        $generalsubject = GeneralSubject::all();
        $kelas = Kelas::all(); 
        return view('admin.laporan.dataasisten', compact('asisten', 'student', 'schoolyear', 'generalsubject', 'kelas'));
    }
    


    public function show(KelasAssistent $kelasAssistent)
    {
        //
    }

    
    public function edit(KelasAssistent $kelasAssistent)
    {
        //
    }

    
    public function update(UpdateKelasAssistentRequest $request, KelasAssistent $kelasAssistent)
    {
        //
    }

    
    public function destroy(KelasAssistent $kelasAssistent)
    {
        //
    }
}
