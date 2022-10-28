<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use Illuminate\Http\Request;
use App\Models\Prodi;
use App\Models\Program;
use App\Models\SchoolYear;
use App\Models\GeneralSubject;
use App\Http\Requests\StoreProgramRequest;
use App\Http\Requests\UpdateProgramRequest;
use App\Models\Lecturer;
use App\Models\ProdiKelas;

class ProgramController extends Controller
{
    public function data()
    {
        $programs = Program::all();
        return view('koordinator.program.data', compact('programs'));
    }

    public function tambah()
    {
        $schoolyears = SchoolYear::all();
        $generalsubjects = GeneralSubject::all();
        $kelas = Kelas::all();
        $prodis = Prodi::all();
        $prodikelas = ProdiKelas::all();
        $lecturers = Lecturer::all();
        return view('koordinator.program.tambah', compact('schoolyears', 'generalsubjects', 'kelas', 'prodis', 'prodikelas', 'lecturers'));
    }

    public function simpan(Request $request)
    {
            $program = new Program();
            $program->id_generalsubject = $request->id_generalsubject;
            $program->id_schoolyear = $request->id_schoolyear;
            $program->start_period = $request->start_period;
            $program->finish_period = $request->finish_period;
            $program->quota = $request->quota;
            $program->qualification = $request->qualification;
            $program->terms_and_conditions = $request->terms_and_conditions;
            $program->save();
            
            $id_program = $program->id;

            foreach ($request->prodikelas as $prodikelas) {
                $kelas = new Kelas();
                $kelas->id_prodikelas = $prodikelas;
                $kelas->id_program = $id_program;
                $kelas->id_dosen_pengampu = $request->dosen_pengampu[$prodikelas];

                $kelas->save();
            }
            return redirect()
            ->to(route('program.lihat', $program->id))
            ->withSuccess('Berhasil menambah data MKU');
    }

    public function lihat(Program $program)
    {
        $kelas=Kelas::all();
        $prodikelas= ProdiKelas::all();
        $prodi = Prodi::all();
        
        // $kelas=Kelas::all();
        // $prodis= Prodi::all();
        // $prodis = json_decode($generalsubject['prodi']);
        return view('koordinator.program.lihat', compact('program', 'kelas', 'prodikelas', 'prodi'));
    }

    public function edit(Program $program)
    {
        // $prodis = Prodi::all();
        $prodi_kelas= ProdiKelas::all();
        $schoolyears = SchoolYear::all();
        $generalsubjects = GeneralSubject::all();
        $kelas = Kelas::all();
        $prodis = Prodi::all();
        return view('koordinator.program.edit', compact('program','schoolyears', 'generalsubjects', 'kelas', 'prodis'));
    }

    public function update(Request $request, Program $program, Kelas $kelas)
    {
            
            $program->id_generalsubject = $request->id_generalsubject;
            $program->id_schoolyear = $program->id_schoolyear;
            $program->start_period = $request->start_period;
            $program->finish_period = $request->finish_period;
            $program->quota = $request->quota;
            $program->qualification = $request->qualification;
            $program->terms_and_conditions = $request->terms_and_conditions;
            $program->save();
            
            // $id_program = $program->id;
            $id_program = $program->id;

            foreach ($request->prodikelas as $prodikelas) {
                $kelas->id = $kelas->id ;
                $kelas->id_prodikelas = $prodikelas;
                $kelas->id_program = $id_program;
                $kelas->id_dosen_pengampu = $request->dosen_pengampu[$prodikelas];

                $kelas->save();
            }
            //}
            return redirect()
            ->to(route('program.lihat', $program->id))
            ->withSuccess('Berhasil mengubah program');
         }

         public function destroy(Program $program)
         {
             $program->delete();
             return redirect()->to(route('program.data'));
         }


    }

     


