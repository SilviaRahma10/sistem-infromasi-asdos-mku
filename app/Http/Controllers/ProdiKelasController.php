<?php

namespace App\Http\Controllers;

use App\Models\Prodi;
use Illuminate\Http\Request;
use App\Models\ProdiKelas;
use App\Http\Requests\StoreProdiKelasRequest;
use App\Http\Requests\UpdateProdiKelasRequest;

class ProdiKelasController extends Controller
{
    
    public function tambah(Prodi $prodi){
        return view('koordinator.kelasprodi.tambah', compact('prodi'));
    }

    public function simpan(Request $request, Prodi $prodi)
    {
        // mengirimkan data yang diinput dihalaman daftar ke db
        $prodikelas = new ProdiKelas;
        $prodikelas->prodi_id = $prodi->id;
        $prodikelas->nama_kelas = $request->nama_kelas;
        $prodikelas->jumlah_mahasiswa = $request->jumlah_mahasiswa;
        // menyimpan ke db
        $prodikelas->save();
      
        // return redirect()
        // ->to(route('prodi.lihat', $prodi->id))
        // ->withSuccess('Berhasil menambah kelas');
        
    }

}
