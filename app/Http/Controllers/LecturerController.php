<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Prodi;
use App\Models\Dosen;
use Illuminate\Http\Request;
use App\Http\Requests\StoreDosenRequest;
use App\Http\Requests\UpdateDosenRequest;

class LecturerController extends Controller
{
    public function data()
    {
        $lecturers = Dosen::paginate(10);
        $prodis = Prodi::paginate(10);
        return view('koordinator.lecturer.data', compact('lecturers', 'prodis'));
    }

    // fungsi C (create)
    public function tambah()
    {
        
        $prodis = Prodi::all();
        return view('koordinator.lecturer.tambah', compact('prodis'));
    }

    // fungsi simpan data ke db dari yang diinputkan user
    public function simpan(Request $request)
    {
        $request->validate([
            'id_prodi'=> 'required',
            'nama' => 'required | string',
            'nip' => 'required | numeric | unique:dosens',
            'nidn' => 'required | numeric',
            'no_hp' => 'required | numeric |unique:dosens',
            
        ]);

        $lecturer = new Dosen;
        $lecturer->id_prodi = $request->id_prodi;
        $lecturer->nama = $request->nama;
        $lecturer->nip = $request->nip;
        $lecturer->nidn = $request->nidn;
        $lecturer->no_hp = $request->no_hp;
        $lecturer->jenis_kelamin = $request->jenis_kelamin;

        // menyimpan ke db
        $lecturer->save();

        return redirect()
            ->to(route('lecturer.lihat', $lecturer->id))
            ->withSuccess('Berhasil menambah data Dosen');
    }

    // melihat read / lihat detail data
    public function lihat(Dosen $lecturer)
    {
        return view('koordinator.lecturer.lihat', compact('lecturer'));
    }

    public function pilih(Prodi $prodi)
    {
        $lecturers = Dosen::where('id_prodi', $prodi->id)->get();
        return view('koordinator.lecturer.pilih', compact('prodi', 'lecturers'));
    }

    // edit data atau menampilkan data yang di klik untuk di edit
    public function edit(Dosen $lecturer)
    {
        $prodis = Prodi::all();
        return view('koordinator.lecturer.edit', compact('lecturer', 'prodis'));
    }

    public function update(Request $request, Dosen $lecturer, User $user)
    {

        $request->validate([
           
            'nama' => 'required | string',
            'nip' => 'required | numeric',
            'nidn' => 'required | numeric',
            'no_hp' => 'required | numeric',
            
        ]);

        $lecturer->id_prodi = $request->id_prodi;
        $lecturer->nama = $request->nama;
        $lecturer->nip = $request->nip;
        $lecturer->nidn = $request->nidn;
        $lecturer->no_hp = $request->no_hp;
        $lecturer->jenis_kelamin = $request->jenis_kelamin;
        $lecturer->save();

        // $lecturer->user->name = $request->name_dosen;
        // $user->email = $request->email;
        // $user->save();

        return redirect()->to(route('lecturer.lihat', $lecturer->id))
            ->withSuccess('Berhasil memperbarui data Dosen');;
    }

    // menampilkan detail data hasil perubahan
    public function destroy(Dosen $lecturer)
    {
        $lecturer->delete();
        return redirect()->to(route('lecturer.data'));
    }

    public function search(Request $request) {
        if($request->has('search')) {
            $lecturers = Dosen::where('nama', 'like', '%'.$request->search.'%')
            ->orWhere('nip', 'like', '%'.$request->search.'%')
            ->orWhere('nidn', 'like', '%'.$request->search.'%')
            ->orWhereHas('prodi', function($query) use ($request) {
                $query->where('nama', 'like', '%'.$request->search.'%');
            })
            ->paginate();
           
        } else {
            $lecturers = Dosen::paginate(10);
        }
        $prodis = Prodi::paginate(10);
        return view('koordinator.lecturer.data', compact('lecturers', 'prodis'));
    }

    // $lecturers = Dosen::all();
    // $prodis = Prodi::all();
}
