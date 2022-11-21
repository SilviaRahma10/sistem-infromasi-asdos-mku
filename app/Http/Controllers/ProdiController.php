<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Prodi;
use App\Models\Fakultas;
use App\Http\Requests\StoreProdiRequest;
use App\Http\Requests\UpdateProdiRequest;
use App\Models\Mata_kuliah_prodi;

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

        $request->validate([
            'id_fakultas'=> 'required',
            'kode' => 'required | unique:prodis',
            'nama' => 'required',
        ]);

        // mengirimkan data yang diinput dihalaman daftar ke db
        $prodi = new Prodi;
        $prodi->id_fakultas = $request->id_fakultas;
        $prodi->kode = $request->kode;
        $prodi->nama = $request->nama;
    
        $prodi->save();
       
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
        $prodis = Prodi::paginate(10);
        $fakultas = Fakultas::paginate(10);

        
        return view('koordinator.prodi.data', compact('prodis', 'fakultas'));
    }

    public function pilih(Fakultas $fakultas)
    {   
        $prodis = Prodi::where('id_fakultas', $fakultas->id)->get();
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

        $request->validate([
            
            'kode' => 'required',
            'nama' => 'required',
        ]);

        $prodi->id_fakultas = $request->id_fakultas;
        $prodi->kode = $request->kode;
        $prodi->nama = $request->nama;
        // $prodi->accreditation = $request->akreditasi;
        // $prodi->level = $request->jenjang;

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

    public function search(Request $request) {
        if($request->has('search')) {
            $prodis = Prodi::where('nama', 'like', '%'.$request->search.'%')
            ->orWhere('kode', 'like', '%'.$request->search.'%')->paginate();
            // ->paginate(10);
        } else {
            $prodis = Prodi::paginate(10);
        }
        $fakultas = Fakultas::paginate(10);
        return view('koordinator.prodi.data', compact('prodis', 'fakultas'));
    }
}
