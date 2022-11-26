<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tahun_ajaran;
use App\Models\Fakultas;
use App\Models\Prodi;
use App\Models\Program;
use App\Models\Mata_kuliah;
use App\Models\Mku_program;
use App\Models\Pendaftaran;
use App\Models\Asisten_kelas;
use App\Models\Koordinator;


class DashboardController extends Controller
{
    //

    public function dashboard(){
        $tahun_ajaran = Tahun_ajaran::all();
        $fakultas = Fakultas::all(); 
        $prodis = Prodi::all();
        $mku = Mata_kuliah::all();

        $program = Program::where('is_active', '1')->get();

        $mku_program = Mku_program::whereBelongsTo($program)->get();
        $koordinators = Koordinator::all();

        $registration = Pendaftaran::all();
        $asistent = Pendaftaran::whereBelongsTo($program)
        ->where('status', '1')->get();

        return view('adminDashboard', compact('tahun_ajaran','fakultas', 'prodis','program',  'mku', 'mku_program', 'registration', 'asistent', 'koordinators'));
       
    }

    public function dashboardkoordinator(){
       
      

        $program = Program::where('is_active', '1')->get();

        // dashboard koordinator
        $registration = Pendaftaran::whereBelongsTo($program)
        ->where('id_mata_kuliah',auth()->user()->koordinator->id_mku)
        ->get(); 

        $registrationsBelumVerifikasi = Pendaftaran::whereBelongsTo($program)
        ->where('status', '0')
        ->where('id_mata_kuliah',auth()->user()->koordinator->id_mku)
        ->get(); 

        $registrationsTerima = Pendaftaran::whereBelongsTo($program)
        ->where('status', '1')
        ->where('id_mata_kuliah',auth()->user()->koordinator->id_mku)
        ->get(); 

        $registrationsTolak = Pendaftaran::whereBelongsTo($program)
        ->where('status', '2')
        ->where('id_mata_kuliah',auth()->user()->koordinator->id_mku)
        ->get();

        $asistent = Pendaftaran::whereBelongsTo($program)
        ->where('status', '1')
        ->where('id_mata_kuliah',auth()->user()->koordinator->id_mku)->get(); 
        
        return view('adminDashboard', compact('registration', 'registrationsBelumVerifikasi', 'registrationsTerima', 'registrationsTolak', 'asistent')); 
    }   
}
