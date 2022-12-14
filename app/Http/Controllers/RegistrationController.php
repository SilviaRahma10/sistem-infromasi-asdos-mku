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
    $idMku = auth()->user()->koordinator->id_mku;

    // dd($idMku);

    $generalsubjects = Mata_Kuliah::all();
    $program = Program::where('is_active', '1')->get();
    $registrations = Pendaftaran::whereBelongsTo($program)
      ->where('id_mata_kuliah', $idMku)
      ->orderBy('id', 'DESC')
      ->get();

    return view('koordinator.registration.data', compact('generalsubjects', 'program', 'registrations', 'idMku'));
  }

  public function databelum()
  {
    $idMku = auth()->user()->koordinator->id_mku;
    $generalsubjects = Mata_Kuliah::paginate(10);
    
    $program = Program::where('is_active', '1')->get();
    $registrations = Pendaftaran::whereBelongsTo($program)
    ->where('id_mata_kuliah', $idMku)
      ->where('status', '0')->paginate(10);

    return view('koordinator.registration.data', compact('generalsubjects', 'program', 'registrations', 'idMku'));
  }

  public function dataterima()
  {
    $idMku = auth()->user()->koordinator->id_mku;
    $generalsubjects = Mata_Kuliah::all();

    $program = Program::where('is_active', '1')->get();
    $registrations = Pendaftaran::whereBelongsTo($program)
    ->where('id_mata_kuliah', $idMku)
      ->where('status', '1')->paginate(10);

    return view('koordinator.registration.data', compact('generalsubjects', 'program', 'registrations', 'idMku'));
  }

  public function datatolak()
  {
    $generalsubjects = Mata_Kuliah::all();
    $idMku = auth()->user()->koordinator->id_mku;

    $program = Program::where('is_active', '1')->get();
    $registrations = Pendaftaran::whereBelongsTo($program)
    ->where('id_mata_kuliah', $idMku)
      ->where('status', '2')->paginate(10);

    return view('koordinator.registration.data', compact('generalsubjects', 'program', 'registrations', 'idMku'));
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

  public function lihat(Pendaftaran $registration)
  {
    $students = Mahasiswa::all();
    $programs = Program::all();
    $generalsubjects = Mata_kuliah::all();

    return view('koordinator.registration.lihat', compact('registration', 'students', 'programs', 'generalsubjects'));
  }

// koordinator edit atau verifikasi berkas pendafatran sesuai dengan mku yang dikelolanya
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

    return redirect()->to(route('registration.data'))
      ->withSuccess('Berhasil verifikasi data pendaftaran');
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

  public function search(Request $request){
    $idMku = auth()->user()->koordinator->id_mku;
    $program = Program::where('is_active', '1')->get();
    if($request->has('search')){
      $generalsubjects = Mata_Kuliah::all();
      $registrations = Pendaftaran::whereBelongsTo($program)
        ->where('nilai_matkul', 'LIKE', '%'.$request->search.'%') 
        ->orwhereHas('mku', function($query) use($request) {
          $query->where('nama', 'like', '%'.$request->search.'%');
        })
        ->where('nilai_matkul', 'LIKE', '%'.$request->search.'%') 
        ->orwhereHas('mahasiswa', function($query) use($request) {
          $query->where('angkatan', 'like', '%'.$request->search.'%');
        })      
        ->where('nilai_matkul', 'LIKE', '%'.$request->search.'%') 
        ->orwhereHas('mahasiswa', function($query) use($request) {
          $query->where('npm', 'like', '%'.$request->search.'%');
        })
        ->orwhereHas('mku', function($query) use($request) {
          $query->where('kode', 'like', '%'.$request->search.'%');
        })
        //search name from users table
        ->orwhereHas('mahasiswa', function($query) use($request) {
          //search name from users table
          $query->whereHas('user', function($query) use($request) {
            $query->where('name', 'like', '%'.$request->search.'%');
          });
        })
        ->paginate();

  // dd($kunjungans);
  }else{
    $generalsubjects = Mata_Kuliah::all();
    $idMku = auth()->user()->koordinator->id_mku;
    $program = Program::where('is_active', '1')->get();
    $registrations = Pendaftaran::whereBelongsTo($program)
      ->where('id_mata_kuliah', $idMku)
      ->orderBy('id', 'DESC')
      ->paginate(10);
  };
  return view('koordinator.registration.data', compact('generalsubjects', 'program', 'registrations', 'idMku'));
  
  }
}
