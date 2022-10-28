<?php
namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\SchoolYear;
use App\Models\Registration;
use Illuminate\Http\Request;
use App\Models\GeneralSubject;
use App\Models\DocumentRegistration;
use App\Http\Requests\StoreRegistrationRequest;
use App\Http\Requests\UpdateRegistrationRequest;
use App\Models\KelasAssistent;

class RegistrationController extends Controller
{
    public function data()
   {
        $documentregistration = DocumentRegistration::all();
        $registrations = Registration::all();
        return view('koordinator.registration.data', compact('registrations', 'documentregistration'));
   }

   public function simpan(Request $request){
    // $registration = new Registration;
    // $registration->id_student = $request->
    // $registration->id_schoolyear =$request->
    // $registration->id_generalsubject =$request->
    // $registration->status = $request->
    // $registration->save();
   }

   public function edit(Registration $registration)
   {
       $students = Student::all();
       $schoolyears = SchoolYear::all();
       $generalsubjects = GeneralSubject::all();

    return view('koordinator.registration.edit', compact('registration', 'students', 'schoolyears', 'generalsubjects'));
   }

  public function update(Request $request, Registration $registration)
  {
    
    $registration->status = $request->status;
    $registration->save();

    

    
// if($registration->status == "diterima"){
// 	$asisten = new KelasAssistent();
//   $asisten->id_schoolyear = 
//   $asisten->id_generalsubject =
//   $asisten->id_student =
//   $asisten->id_kelas =   

//   $asisten->save();

// }
    if($registration->status == "diterima"){
        return redirect()->to(route('asisten.pemetaan', $registration->id));
    } 
    else {
      return redirect()->to(route('registration.data'))
      ->withSuccess('Berhasil verifikasi data pendaftaran');
    } 
  
  }
}
