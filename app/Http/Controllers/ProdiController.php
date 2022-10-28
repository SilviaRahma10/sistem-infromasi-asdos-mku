<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Prodi;
use App\Models\Fakultas;
use App\Http\Requests\StoreProdiRequest;
use App\Http\Requests\UpdateProdiRequest;

class ProdiController extends Controller
{
    // fungsi C (create)
    public function tambah()
    {
        
        $fakultas = Fakultas::all();
        return view('koordinator.prodi.tambah', compact('fakultas'));
    }

    // fungsi simpan data ke db dari yang diinputkan user
    public function simpan(Request $request)
    {
        // mengirimkan data yang diinput dihalaman daftar ke db
        $prodi = new Prodi;
        $prodi->fakultas_id = $request->fakultas_id;
        // $prodi->fakultas_id = $fakultas->id;
        $prodi->code = $request->kode_prodi;
        $prodi->prodi_name = $request->nama_prodi;
        $prodi->accreditation = $request->akreditasi;
        $prodi->level = $request->jenjang;
        // menyimpan ke db
        $prodi->save();
        // prodi.konfirmasi
        return redirect()
        ->to(route('prodi.konfirmasi', $prodi->id))
        ->withSuccess('Berhasil menambah Data Program Studi');
        
    }
    public function konfirmasi(Prodi $prodi)
    {
        $fakultas = Fakultas::all();
    return view('koordinator.prodi.konfirmasi', compact('prodi', 'fakultas'));
    }

    // menampilkan semua data prodi
    public function data()
    {   
        $prodis = Prodi::all();
        $fakultas = Fakultas::all();
        
        return view('koordinator.prodi.data', compact('prodis','fakultas'));
    }

    public function pilih(Fakultas $fakultas)
    {   
        $prodis = Prodi::where('fakultas_id', $fakultas->id)->get();
        return view('koordinator.prodi.pilih', compact('fakultas', 'prodis'));
    }

    // melihat read / lihat detail data
    public function lihat(Prodi $prodi)
    {
        $fakultas = Fakultas::all();
    return view('koordinator.prodi.lihat', compact('prodi', 'fakultas'));
    }

    // edit data atau menampilkan data yang di klik untuk di edit
    public function edit(Prodi $prodi)
    {
        $fakultas = Fakultas::all();
    return view('koordinator.prodi.edit', compact('prodi', 'fakultas'));
    }

    public function update( Request $request, Prodi $prodi)
    {
        $prodi->fakultas_id = $request->fakultas;
        $prodi->code = $request->kode_prodi;
        $prodi->prodi_name = $request->nama_prodi;
        $prodi->accreditation = $request->akreditasi;
        $prodi->level = $request->jenjang;

         // simpan
        $prodi->save();
        return redirect()
        ->to(route('prodi.konfirmasi', $prodi->id))
        ->withSuccess('Berhasil memperbarui Data Program Studi');

    // menampilkan detail data hasil perubahan
    
    }

    public function destroy(Prodi $prodi)
    {
        $prodi->delete();
        return redirect()->to(route('fakultas.data'));
    }
}
