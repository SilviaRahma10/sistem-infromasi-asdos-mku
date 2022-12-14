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

        $kuota  = 0;
        $kuotamku = Mku_program::where('id_program', $program[0]->id)->get();
  
        foreach ($kuotamku as $p) {
          $kuota += $p->kuota;
        }

        return view('adminDashboard', compact('tahun_ajaran','fakultas', 'prodis','program',  'mku', 'mku_program', 'registration', 'asistent', 'koordinators', 'kuota'));
       
    }

    public function dashboardkoordinator(){
       
      

        $program = Program::where('is_active', '1')->get();

        // dashboard koordinator
        $idMku = auth()->user()->koordinator->id_mku;

        //kuota mku program
        $mku_program = Mku_program::where('id_mata_kuliah', $idMku)
        ->whereBelongsTo($program)
        ->first();
        // $mku_program = Mku_program::whereBelongsTo($program)->get();
      
      

        //jumlah pendaftar
        $registration = Pendaftaran::whereBelongsTo($program)
        ->where('id_mata_kuliah',$idMku)
        ->get();

        //jumlah pendaftar belum verifikasi
        $registrationsBelumVerifikasi = Pendaftaran::whereBelongsTo($program)
        ->where('status', '0')
        ->where('id_mata_kuliah',$idMku)
        ->get(); 

        //jumlah pendaftar terima
        $registrationsTerima = Pendaftaran::whereBelongsTo($program)
        ->where('status', '1')
        ->where('id_mata_kuliah',$idMku)
        ->get(); 

        //jumlah pendaftar tolak
        $registrationsTolak = Pendaftaran::whereBelongsTo($program)
        ->where('status', '2')
        ->where('id_mata_kuliah',$idMku)
        ->get();

        //jumlah asisten aktif
        $asistent = Pendaftaran::whereBelongsTo($program)
        ->where('status', '1')
        ->where('id_mata_kuliah',$idMku)
        ->get(); 
        
        return view('adminDashboard', compact('program', 'mku_program','registration', 'registrationsBelumVerifikasi', 'registrationsTerima', 'registrationsTolak', 'asistent')); 
    }   
}
