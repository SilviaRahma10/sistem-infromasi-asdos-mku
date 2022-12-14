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

    public function data()
    {
        $idMku = auth()->user()->koordinator->id_mku;

        $mku_program = Mku_program::where('id_mata_kuliah', $idMku)
        ->orderBy('id', 'DESC')
        ->paginate(10);
        return view('koordinator.mku_program.data', compact('mku_program'));
    }

    public function tambah()
    {  
        $program = Program::where('is_active', '1')->get()[0];
        // dd($program);
        $idMku = auth()->user()->koordinator;
        return view('koordinator.mku_program.tambah', compact('idMku', 'program'));
    }

    public function simpan(Request $request)
    {
        $request->validate([
            
            'kuota' => 'required | numeric',
            'syarat' => 'required | string',
            'kualifikasi' => 'required | string',
        ]);

        $program = Program::where('is_active', '1')->get()[0];
        $idMku = auth()->user()->koordinator;

        $mku_program = new Mku_program;
        $mku_program->id_program = $program->id;
        $mku_program->id_mata_kuliah = $idMku->mku->id;
        $mku_program->kuota = $request->kuota;
        $mku_program->syarat = $request->syarat;
        $mku_program->kualifikasi = $request->kualifikasi;

        $mku_program->save();

        return redirect()
        ->to(route('mkuprogram.lihat', $mku_program->id ))
        ->withSuccess('Berhasil Menambahkan Program MKU');
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
        ->withSuccess('Berhasil Mengubah Program MKU');
        
    }

    public function destroy(Mku_program $mku_program)
    {
        $mku_program->delete();
        return redirect()->to(route('mkuprogram.data'));
    }

    public function search(Request $request){
        if($request->has('search')) {

            $idMku = auth()->user()->koordinator->id_mku;

            $mku_program = Mku_program::where('kuota', 'like', '%'.$request->search.'%')
            ->where('id_mata_kuliah', $idMku);

            $mku_program = Mku_program::where('syarat', 'like', '%'.$request->search.'%')
            ->where('id_mata_kuliah', $idMku);

            $mku_program = Mku_program::where('kualifikasi', 'like', '%'.$request->search.'%')
            ->where('id_mata_kuliah', $idMku)
            ->orWhereHas('mku', function($query) use ($request) {
                $query->where('nama', 'like', '%'.$request->search.'%');
            })

            ->paginate(10);
        }else{
            $idMku = auth()->user()->koordinator->id_mku;

        $mku_program = Mku_program::where('id_mata_kuliah', $idMku)->paginate(10);
        }
        return view('koordinator.mku_program.data', compact('mku_program'));

        // public function search(Request $request) {

        //     if($request->has('search')){
               
        //         $kunjungans=Kunjungan::where('status', 'LIKE', '%'.$request->search.'%') 
        //         ->orwhereHas('pengunjung', function($query) use($request) {
        //             $query->where('nama', 'like', '%'.$request->search.'%');
        //         })
        //         ->wherein('status', ['Belum Diproses', 'Dilewati'])
        //         ->orwhereHas('wargabinaan', function($query) use($request) {
        //             $query->where('nama', 'like', '%'.$request->search.'%');
        //         })
        //         ->wherein('status', ['Belum Diproses', 'Dilewati'])
        //         ->paginate();
    
        //     // dd($kunjungans);
        //     }else{
        //     $kunjungans=Kunjungan::where('status', 'Belum Diproses')->orWhere('status', 'Dilewati')->paginate(2);
        //     };
        //     return view('kunjungan.index', compact('kunjungans'));
        //     }
    }
}
