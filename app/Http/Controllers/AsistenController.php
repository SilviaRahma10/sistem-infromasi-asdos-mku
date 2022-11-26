<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mahasiswa;
use App\Models\Tahun_ajaran;
use App\Models\Mata_kuliah;
use App\Models\Pendaftaran;
use App\Models\Program;

class AsistenController extends Controller
{
    //admin
    public function datasisten()
    {
      $generalsubjects = Mata_Kuliah::all();
  
      $program = Program::where('is_active', '1')->get();
      $registrations = Pendaftaran::whereBelongsTo($program)
        ->where('status', '1')->paginate(10);

      return view('koordinator.asisten.dataasisten', compact('generalsubjects', 'program', 'registrations'));
    }
  
    public function pilihasisten(Mata_kuliah $generalsubject)
    {
      $generalsubjects = Mata_Kuliah::all();
        $program = Program::where('is_active', '1')->get();
        $registrations = Pendaftaran::whereBelongsTo($program)
          ->where('status', '1')
          ->where('id_mata_kuliah', $generalsubject->id)->paginate(10);
    
        return view('koordinator.asisten.dataasisten', compact('generalsubjects', 'program', 'registrations'));
      
    }

    public function lihat(Pendaftaran $registration)
    {
      $students = Mahasiswa::all();
      $programs = Program::all();
      $generalsubjects = Mata_kuliah::all();
  
      return view('koordinator.asisten.lihat', compact('registration', 'students', 'programs', 'generalsubjects'));
    }

    public function search(Request $request) {
        if($request->has('search')) {
            $program = Program::where('is_active', '1')->get();
            $registrations = Pendaftaran::whereBelongsTo($program)
            ->where('status', '1')
            ->orWhereHas('mku', function($query) use ($request) {
                $query->where('nama', 'like', '%'.$request->search.'%');
            })
            ->orWhereHas('mku', function($query) use ($request) {
                $query->where('kode', 'like', '%'.$request->search.'%');
            })
            ->orWhereHas('mahasiswa', function($query) use ($request) {
                $query->where('npm', 'like', '%'.$request->search.'%');
            })
            ->orWhereHas('mahasiswa', function($query) use ($request) {
                $query->where('angkatan', 'like', '%'.$request->search.'%');
            })
            ->paginate();
        } else {
            $program = Program::where('is_active', '1')->get();
             $registrations = Pendaftaran::whereBelongsTo($program)
            ->where('status', '1')->paginate(10);
        }
        $generalsubjects = Mata_Kuliah::paginate(10);
        
        
        return view('koordinator.asisten.dataasisten', compact('generalsubjects', 'program', 'registrations'));
    }

    // koordinator
    
    public function data()
    {
      $generalsubjects = Mata_Kuliah::all();
  
      $program = Program::where('is_active', '1')->get();
      $registrations = Pendaftaran::whereBelongsTo($program)
        ->where('status', '1')->paginate(10);

      return view('koordinator.asisten.data', compact('generalsubjects', 'program', 'registrations'));
    }
}
