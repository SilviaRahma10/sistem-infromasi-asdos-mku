<?php

namespace App\Http\Controllers;

use App\Models\Prodi;
use Illuminate\Http\Request;
use App\Models\Mata_kuliah;
use App\Models\Kelas;
use App\Models\Mata_kuliah_prodi;

class GeneralSubjectController extends Controller
{
    // fungsi C (create)
    public function tambah()
    {
        $prodis = Prodi::all();
        return view('koordinator.generalsubject.tambah', compact('prodis'));
    }


    // fungsi simpan data ke db dari yang diinputkan user
    public function simpan(Request $request)
    {

        $request->validate([
            'nama'=> 'required | string',
            'kode' => 'required | unique:mata_kuliahs',
        ]);

            $generalsubject = new Mata_kuliah;
            $generalsubject->nama = $request->nama;
            $generalsubject->kode = $request->kode;
    
            $generalsubject->save();

            $prodi = $request->prodi;
            foreach ($prodi as $p) {
                $generalsubject->prodi()->attach($p);
            }
            return redirect()
            ->to(route('generalsubject.lihat', $generalsubject->id))
            ->withSuccess('Berhasil menambah data MKU');
    }

    // menampilkan semua data prodi
    public function data()
    {
        $generalsubjects = Mata_kuliah::paginate(10);
        return view('koordinator.generalsubject.data', compact('generalsubjects'));
    }

    // melihat read / lihat detail data
    public function lihat(Mata_kuliah $generalsubject)
    {
        $mata_kuliah_prodis = Mata_kuliah_prodi::where('id_mata_kuliah', $generalsubject->id)->get();
        // $kelas=Kelas::all();
        // $prodis= Prodi::all();
        // $prodi = $generalsubject->prodi;
        return view('koordinator.generalsubject.lihat', compact('generalsubject', 'mata_kuliah_prodis'));
    }

    // edit data atau menampilkan data yang di klik untuk di edit
    public function edit(Mata_kuliah $generalsubject)
    {
        $program_studis = $generalsubject->prodi; //prodi yg mengambil mata kuliah
        $program_studi = [];

        foreach ($program_studis as $p) {
            $program_studi[] = $p->id;
        }

        $prodis = Prodi::all();
        return view('koordinator.generalsubject.edit', compact('generalsubject', 'prodis', 'program_studi'));
    }

    public function update(Request $request, Mata_kuliah $generalsubject, Kelas $kelas)
    {
        $request->validate([
            'nama'=> 'required | string',
            'kode' => 'required',
        ]);

        $generalsubject->nama = $request->nama;
        $generalsubject->kode = $request->kode;
        $generalsubject->save();

        $generalsubject->prodi()->sync([]);

        $prodi = $request->prodi;
            foreach ($prodi as $p) {
                $generalsubject->prodi()->attach($p);
            }

        return redirect()
            ->to(route('generalsubject.lihat', $generalsubject->id))
            ->withSuccess('Berhasil memperbarui data MKU');
    }

    public function destroy(Mata_kuliah $generalsubject)
    {
        $generalsubject->delete();
        return redirect()->to(route('generalsubject.data'));
    }

    public function search(Request $request) {
        if($request->has('search')) {
            
            $generalsubjects = Mata_kuliah::where('nama', 'like', '%'.$request->search.'%')
            ->orWhere('kode', 'like', '%'.$request->search.'%')
            ->paginate(10);
        }else{
                $generalsubjects = Mata_kuliah::paginate(10);
            }
            return view('koordinator.generalsubject.data', compact('generalsubjects'));
    
        }
}
