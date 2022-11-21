<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use Illuminate\Http\Request;
use App\Models\Prodi;
use App\Models\Program;
use App\Models\Tahun_ajaran;
use App\Models\Mku_program;
use App\Models\GeneralSubject;
use App\Http\Requests\StoreProgramRequest;
use App\Http\Requests\UpdateProgramRequest;
use App\Models\Lecturer;
use App\Models\ProdiKelas;
use Illuminate\Support\Facades\DB;


class ProgramController extends Controller
{
    // public function datta()
    // {
    //     $programs = Program::paginate(10);
    //     return view('koordinator.program.data', compact('programs'));
    // }

    public function data(Request $request)
    {
        if($request->tanggal){
            
            $programs = Program::whereDate('tanggal_buka', '=',$request->tanggal)
            ->orWhere('tanggal_tutup', '=',$request->tanggal)
            ->paginate();

        }else{
            $programs = Program::paginate(10);
        }
        return view('koordinator.program.data', compact('programs'));
    }


    public function tambah()
    {
        $tahun_ajaran = Tahun_ajaran::all();
        
        return view('koordinator.program.tambah', compact('tahun_ajaran'));
    }

    public function simpan(Request $request)
    {
        $request->validate([
            'id_tahun_ajaran'=> 'required',
            'tanggal_buka' => 'required |date',
            'tanggal_tutup' => 'required |date',
        ], [
                'id_tahun_ajaran.required' => "tahun ajaran harus dipilih",
                'tanggal_buka.required' => "tanggal buka harus diisi",
                'tanggal_tutup.required' => "tanggal tutup harus diisi",


        ]);

        //untuk is active program menjadi non-aktif ketika tahun ajaran baru dibuat
        DB::table('programs')->update([
            'is_active' => false ]);

            $program = new Program();
            $program->id_tahun_ajaran = $request->id_tahun_ajaran;
            $program->tanggal_buka = $request->tanggal_buka;
            $program->tanggal_tutup = $request->tanggal_tutup;
            $program->is_active = 1;
            $program->save();
            
            return redirect()
            ->to(route('program.lihat', $program->id))
            ->withSuccess('Berhasil menambah data Program');
    }

    public function lihat(Program $program)
    {
        $mku_program = Mku_program::where('id_program', $program->id)->get();
        return view('koordinator.program.lihat', compact('program', 'mku_program'));
    }

    public function edit(Program $program)
    {
        $tahun_ajarans = Tahun_ajaran::all();
        return view('koordinator.program.edit', compact('program', 'tahun_ajarans'));
    }

    public function update(Request $request, Program $program, Kelas $kelas)
    {
        $request->validate([
        
            'tanggal_buka' => 'required |date',
            'tanggal_tutup' => 'required |date',
        ], [
                'tanggal_buka.required' => "tanggal buka harus diisi",
                'tanggal_tutup.required' => "tanggal tutup harus diisi",


        ]);  
        
        // $program->id_tahun_ajaran = $request->id_schoolyear;
        $program->id_tahun_ajaran = $request->id_tahun_ajaran;
        $program->tanggal_buka = $request->tanggal_buka;
        $program->tanggal_tutup = $request->tanggal_tutup;
        $program->is_active = $request->status;
        $program->save();
        
            return redirect()
            ->to(route('program.lihat', $program->id))
            ->withSuccess('Berhasil mengubah program');
         }

         public function destroy(Program $program)
         {
             $program->delete();
             return redirect()->to(route('program.data'));
         }

        //  public function search(Request $request) {
        //     if($request->has('search')) {
        //         $programs = Program::where('tanggal_buka', 'like', '%'.$request->search.'%')
        //         ->orWhere('tanggal_tutup', 'like', '%'.$request->search.'%')->paginate();
        //         // ->paginate(10);
        //     } else {
        //         $programs = Program::paginate(10);
        //     }
            
        //     return view('koordinator.program.data', compact('programs'));
        // }

       

         


    }

     


