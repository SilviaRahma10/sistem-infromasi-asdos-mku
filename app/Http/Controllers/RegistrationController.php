<?php

namespace App\Http\Controllers;


use App\Models\Mahasiswa;
use App\Models\Tahun_ajaran;
use App\Models\Mata_kuliah;
use App\Models\Pendaftaran;
use Illuminate\Http\Request;

use App\Models\KelasAssistent;
use App\Models\Document\DocumentRegistration;
use App\Http\Requests\StoreRegistrationRequest;
use App\Http\Requests\UpdateRegistrationRequest;
use App\Models\Program;

class RegistrationController extends Controller
{
  public function data()
  {
    $generalsubjects = Mata_Kuliah::paginate(10);
    $program = Program::where('is_active', '1')->get();
    $registrations = Pendaftaran::whereBelongsTo($program)
      ->paginate(10);

    return view('koordinator.registration.data', compact('generalsubjects', 'program', 'registrations'));
  }

  public function databelum()
  {
    $generalsubjects = Mata_Kuliah::all();
    
    $program = Program::where('is_active', '1')->get();
    $registrations = Pendaftaran::whereBelongsTo($program)
      ->where('status', '0')->paginate(10);

    return view('koordinator.registration.data', compact('generalsubjects', 'program', 'registrations'));
  }

  public function dataterima()
  {
    $generalsubjects = Mata_Kuliah::all();

    $program = Program::where('is_active', '1')->get();
    $registrations = Pendaftaran::whereBelongsTo($program)
      ->where('status', '1')->paginate(10);

    return view('koordinator.registration.data', compact('generalsubjects', 'program', 'registrations'));
  }

  public function datatolak()
  {
    $generalsubjects = Mata_Kuliah::all();
    $program = Program::where('is_active', '1')->get();
    $registrations = Pendaftaran::whereBelongsTo($program)
      ->where('status', '2')->paginate(10);

    return view('koordinator.registration.data', compact('generalsubjects', 'program', 'registrations'));
  }

  public function pilih(Mata_kuliah $generalsubject)
  {
    $program = Program::where('is_active', '1')->get();
    $registrations = Pendaftaran::whereBelongsTo($program)
      ->where('status', '0')
      ->where('id_mata_kuliah', $generalsubject->id)->get();

    return view('koordinator.registration.pilih', compact('generalsubject', 'program', 'registrations'));
  }

  public function pilihterima(Mata_kuliah $generalsubject)
  {
    $program = Program::where('is_active', '1')->get();
    $registrations = Pendaftaran::whereBelongsTo($program)
      ->where('status', '1')
      ->where('id_mata_kuliah', $generalsubject->id)->get();

    return view('koordinator.registration.pilih', compact('generalsubject', 'program', 'registrations'));
  }

  public function pilihtolak(Mata_kuliah $generalsubject)
  {
    $program = Program::where('is_active', '1')->get();
    $registrations = Pendaftaran::whereBelongsTo($program)
      ->where('status', '2')
      ->where('id_mata_kuliah', $generalsubject->id)->get();

    return view('koordinator.registration.pilih', compact('generalsubject', 'program', 'registrations'));
  }


  public function simpan(Request $request)
  {
    // $registration = new Registration;
    // $registration->id_student = $request->
    // $registration->id_schoolyear =$request->
    // $registration->id_generalsubject =$request->
    // $registration->status = $request->
    // $registration->save();
  }

  public function edit(Pendaftaran $registration)
  {
    $students = Mahasiswa::all();
    $programs = Program::all();
    $generalsubjects = Mata_kuliah::all();

    return view('koordinator.registration.edit', compact('registration', 'students', 'programs', 'generalsubjects'));
  }

  public function update(Request $request, Pendaftaran $registration)
  {
    $registration->status = $request->status;
    $registration->save();

    if ($registration->status == "1") {
      return redirect()->to(route('asisten.pemetaan', $registration->id));
    } else {
      return redirect()->to(route('registration.data'))
        ->withSuccess('Berhasil verifikasi data pendaftaran');
    }
  }

  //   public function search(Request $request) {
  //     $program = Program::where('is_active', '1')->get();
  //     $registrations = Pendaftaran::whereBelongsTo($program)->paginate(2);
  //     if($request->has('search')) {
  //         $registrations = Pendaftaran::where('nama', 'like', '%'.$request->search.'%')
  //         ->orWhere('kode', 'like', '%'.$request->search.'%')->paginate()
  //         ->where;
  //         // ->paginate(10);
  //     } else {
  //         $prodis = Prodi::paginate(10);
  //     }
  //     $generalsubjects = Mata_Kuliah::paginate(10);
  //     return view('koordinator.prodi.data', compact('prodis', 'fakultas'));
  // }

  // $generalsubjects = Mata_Kuliah::all();
  // $program = Program::where('is_active', '1')->get();
  // $registrations = Pendaftaran::whereBelongsTo($program)
  // ->paginate(2);  
}
