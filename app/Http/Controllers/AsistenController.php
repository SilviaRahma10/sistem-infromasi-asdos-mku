<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mahasiswa;
use App\Models\Tahun_ajaran;
use App\Models\Mata_kuliah;
use App\Models\Pendaftaran;
use App\Models\Program;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\AsistenExport;

class AsistenController extends Controller
{
    //admin
    public function data(){
      $idMku = auth()->user()->koordinator->id_mku;
      $generalsubjects = Mata_Kuliah::all();
      $tahun_ajarans = Tahun_ajaran::all();

      $program = Program::where('is_active', '1')->get();
      $registrations = Pendaftaran::whereBelongsTo($program)
      ->where('id_mata_kuliah', $idMku)
      ->where('status', '1')
      ->orderBy('id', 'DESC')
      ->paginate(10);

      return view('koordinator.asisten.data', compact('generalsubjects', 'program', 'registrations','tahun_ajarans', 'idMku'));
    }

    public function datasisten()
    {
      
      $generalsubjects = Mata_Kuliah::all();
      $tahun_ajarans = Tahun_ajaran::all();
   
      $program = Program::where('is_active', '1')->get();
      $registrations = Pendaftaran::whereBelongsTo($program)
        ->where('status', '1')
        ->orderBy('id', 'DESC')
        ->paginate(10);
      return view('koordinator.asisten.dataasisten', compact('generalsubjects', 'program', 'registrations','tahun_ajarans'));
    }
    
  
    public function pilihasisten(Mata_kuliah $generalsubject)
    {
      $generalsubjects = Mata_Kuliah::all();
      $tahun_ajarans = Tahun_ajaran::all();
        $program = Program::where('is_active', '1')->get();
        $registrations = Pendaftaran::whereBelongsTo($program)
          ->where('status', '1')
          ->where('id_mata_kuliah', $generalsubject->id)
          ->paginate(10);
    
        return view('koordinator.asisten.dataasisten', compact('generalsubjects', 'program', 'registrations', 'tahun_ajarans'));
      
    }

    public function lihat(Pendaftaran $registration)
    {
      $students = Mahasiswa::all();
      $programs = Program::all();
      $generalsubjects = Mata_kuliah::all();
  
      return view('koordinator.asisten.lihat', compact('registration', 'students', 'programs', 'generalsubjects'));
    }

    public function destroy(Pendaftaran $registration)
    {
        $registration->delete();
        return redirect()->to(route('asisten.data'));

        // if (auth()->user()->role == 'koordinator'){
        //  return redirect()->to(route('asisten.data'));
        // }else{
        //   return redirect()->to(route('asisten.datasisten'));
        // }

    }


    // $generalsubjects = Mata_Kuliah::all();
  
    //   $program = Program::where('is_active', '1')->get();
    //   $registrations = Pendaftaran::whereBelongsTo($program)
    //     ->where('status', '1')->paginate(10);

    //   return view('koordinator.asisten.dataasisten', compact('generalsubjects', 'program', 'registrations'));
  
      
    public function search(Request $request) {
      $idMku = auth()->user()->koordinator->id_mku;
      $tahun_ajarans = Tahun_ajaran::all();
        if($request->has('search')) {
            $program = Program::where('is_active', '1')->get();
            $registrations = Pendaftaran::whereBelongsTo($program)
            ->where('status', '1')
            ->orWhereHas('mku', function($query) use ($request) {
                $query->where('nama', 'like', '%'.$request->search.'%');
            })
            // ->wherein('status', '1')
            ->orWhereHas('mku', function($query) use ($request) {
                $query->where('kode', 'like', '%'.$request->search.'%');
            })
            // ->wherein('status', '1')
            ->orWhereHas('mahasiswa', function($query) use ($request) {
                $query->where('npm', 'like', '%'.$request->search.'%');
            })
            // ->wherein('status', '1')
            ->orWhereHas('mahasiswa', function($query) use ($request) {
                $query->where('angkatan', 'like', '%'.$request->search.'%');
            })
            ->orwhereHas('mahasiswa', function($query) use($request) {
              //search name from users table
              $query->whereHas('user', function($query) use($request) {
                $query->where('name', 'like', '%'.$request->search.'%');
              });
            })            
            ->paginate();
        } else {
            $program = Program::where('is_active', '1')->get();
             $registrations = Pendaftaran::whereBelongsTo($program)
            ->where('status', '1')->paginate(10);
        }
        $generalsubjects = Mata_Kuliah::paginate(10);
        
        
        return view('koordinator.asisten.dataasisten', compact('generalsubjects', 'program', 'registrations', 'tahun_ajarans', 'idMku'));
    }

    // koordinator
    
 

    public function export(Request $request, Tahun_ajaran $id_tahun)
    {
        $idTahun = $request->get('id_tahun');

        return Excel::download(new AsistenExport($idTahun), 'Asisten Kelas.xlsx');
    }

}
