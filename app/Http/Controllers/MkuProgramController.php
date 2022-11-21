<?php

namespace App\Http\Controllers;

use App\Models\Program;
use App\Models\Mata_kuliah;
use App\Models\Mku_program;
use App\Models\Tahun_ajaran;
use Illuminate\Http\Request;

class MkuProgramController extends Controller
{
    //
    public function tambah(Program $program)
    {
        $generalsubjects = Mata_kuliah::all();
        return view('koordinator.mku_program.tambah', compact('program', 'generalsubjects'));
    }

    public function simpan(Request $request, Program $program)
    {
        $request->validate([
            'id_mata_kuliah'=> 'required',
            'kuota' => 'required | numeric',
            'syarat' => 'required | string',
            'kualifikasi' => 'required | string',
        ]);

        $mku_program = new Mku_program;
        $mku_program->id_program = $program->id;
        $mku_program->id_mata_kuliah = $request->id_mata_kuliah;
        $mku_program->kuota = $request->kuota;
        $mku_program->syarat = $request->syarat;
        $mku_program->kualifikasi = $request->kualifikasi;

        $mku_program->save();

        return redirect()
        ->to(route('mkuprogram.lihat', $mku_program->id ))
        ->withSucces('Berhasil Menambahkan Program MKU');
    }

    public function lihat(Mku_program $mku_program){
        $generalsubjects = Mata_kuliah::all();  
        $program = Program::all();
        return view('koordinator.mku_program.lihat', compact('mku_program', 'program', 'program', 'generalsubjects' ));
    }

    public function edit(Mku_program $mku_program )
    {
        $generalsubjects = Mata_kuliah::all();
        return view('koordinator.mku_program.edit', compact('mku_program', 'generalsubjects',)); 
       
    }

    public function update(Request $request,Mku_program $mku_program )
    {
        $request->validate([
            'kuota' => 'required | numeric',
            'syarat' => 'required | string',
            'kualifikasi' => 'required | string',
        ]);

        $mku_program->kuota = $request->kuota;
        $mku_program->syarat = $request->syarat;
        $mku_program->kualifikasi = $request->kualifikasi;

        $mku_program->save();

        return redirect()
        ->to(route('mkuprogram.lihat', $mku_program->id ))
        ->withSucces('Berhasil Mengubah Program MKU');
        
    }

    public function destroy(Mku_program $mku_program)
    {
        $mku_program->delete();
        return redirect()->to(route('program.data'));
    }
}
