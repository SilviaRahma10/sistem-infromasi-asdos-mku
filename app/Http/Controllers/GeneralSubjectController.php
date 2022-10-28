<?php

namespace App\Http\Controllers;

use App\Models\Prodi;
use Illuminate\Http\Request;
use App\Models\GeneralSubject;
use App\Http\Requests\StoreGeneralSubjectRequest;
use App\Http\Requests\UpdateGeneralSubjectRequest;
use App\Models\Kelas;

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
        // dd($request->all());

        // membuat validasi
        // $request->validate([
            // 'nama_prodi'=> 'required',
            // 'fakultas'=> 'required',
            // 'jumlah_kelas'=> 'required|min:1',
            // 'akreditasi'=> 'required',
            // 'jenjang'=> 'required',
            // ]);
            
            // mengirimkan data yang diinput dihalaman daftar ke db
            $generalsubject = new GeneralSubject;
            $generalsubject->name = $request->name;
            $generalsubject->code = $request->code;
    
            $generalsubject->save();
            
            return redirect()
            ->to(route('generalsubject.lihat', $generalsubject->id))
            ->withSuccess('Berhasil menambah data MKU');
    }

    // menampilkan semua data prodi
    public function data()
    {
        $generalsubjects = GeneralSubject::all();
        return view('koordinator.generalsubject.data', compact('generalsubjects'));
    }

    // melihat read / lihat detail data
    public function lihat(GeneralSubject $generalsubject)
    {
        $kelas=Kelas::all();
        $prodis= Prodi::all();
        // $prodis = json_decode($generalsubject['prodi']);
        return view('koordinator.generalsubject.lihat', compact('generalsubject', 'kelas'));
    }

    // edit data atau menampilkan data yang di klik untuk di edit
    public function edit(GeneralSubject $generalsubject)
    {
        $prodis = Prodi::all();
        return view('koordinator.generalsubject.edit', compact('generalsubject', 'prodis'));
    }

    public function update(Request $request, GeneralSubject $generalsubject, Kelas $kelas)
    {
        $generalsubject->name = $request->name;
        $generalsubject->code = $request->code;
        // $generalsubject->start_period = $request->start_period;
        // $generalsubject->finish_period = $request->finish_period;
        // $generalsubject->quota = $request->quota;
        // $generalsubject->qualification = $request->qualification;
        // $generalsubject->terms_and_conditions = $request->terms_and_conditions;
        // // simpan
        // $generalsubject->save();

        $generalsubject->save();
        // $id_mku = $generalsubject->id; 
        // // dd($request->dosen_pengampu);

        // $kelas->where('id_mku', $generalsubject->id)->delete();

        // foreach ($request->prodi as $prodi) {
        //     $kelas = new Kelas();
        //     $kelas->id_prodi = $prodi;
        //     $kelas->id_mku = $id_mku;
        //     $kelas->id_dosen_pengampu = $request->dosen_pengampu[$prodi];

        //     $kelas->save();
        // }

        // menampilkan detail data hasil perubahan
        return redirect()
            ->to(route('generalsubject.lihat', $generalsubject->id))
            ->withSuccess('Berhasil memperbarui data MKU');
    }

    public function destroy(GeneralSubject $generalsubject)
    {
        $generalsubject->delete();
        return redirect()->to(route('generalsubject.data'));
    }
}
