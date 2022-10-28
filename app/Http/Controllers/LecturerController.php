<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Prodi;
use App\Models\Lecturer;
use Illuminate\Http\Request;
use App\Http\Requests\StoreLecturerRequest;
use App\Http\Requests\UpdateLecturerRequest;

class LecturerController extends Controller
{
    public function data()
    {
        $lecturers = Lecturer::all();
        $prodis = Prodi::all();
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
        // menambah akun dosen ke tb users
        $user = new User;
        $user->name = $request->name_dosen;
        $user->email = $request->email;
        $user->email_verified_at = now();
        $user->password = bcrypt($request->password);
        $user->role = 'dosen';
        $user->save();

        // dd($request); 
        // mengirimkan data yang diinput dihalaman daftar ke db
        $lecturer = new Lecturer;
        $lecturer->prodi_id = $request->prodi;
        $lecturer->user_id = $user->id;
        $lecturer->nip = $request->nip_dosen;
        $lecturer->nidn = $request->nidn_dosen;
        $lecturer->no_hp = $request->no_hp;
        $lecturer->gender = $request->gender;
        $lecturer->highest_education = $request->pendidikan;

        // menyimpan ke db
        $lecturer->save();
        return redirect()
            ->to(route('lecturer.lihat', $lecturer->id))
            ->withSuccess('Berhasil menambah data Dosen');
    }

    // melihat read / lihat detail data
    public function lihat(Lecturer $lecturer)
    {
        return view('koordinator.lecturer.lihat', compact('lecturer'));
    }

    public function pilih(Prodi $prodi)
    {
        $lecturers = Lecturer::where('prodi_id', $prodi->id)->get();
        return view('koordinator.lecturer.pilih', compact('prodi', 'lecturers'));
    }

    // edit data atau menampilkan data yang di klik untuk di edit
    public function edit(Lecturer $lecturer)
    {
        $prodis = Prodi::all();
        return view('koordinator.lecturer.edit', compact('lecturer', 'prodis'));
    }

    public function update(Request $request, Lecturer $lecturer, User $user)
    {
        // mengirimkan data yang diinput dihalaman daftar ke db
        // lecture->user->name
        $lecturer->prodi_id = $request->prodi;
        $lecturer->nip = $request->nip_dosen;
        $lecturer->nidn = $request->nidn_dosen;
        $lecturer->no_hp = $request->no_hp;
        $lecturer->gender = $request->gender;
        $lecturer->highest_education = $request->pendidikan;
        $lecturer->save();

        $user_id = $user->id;
        $user->name = $request->name_dosen;
        $user->email = $request->email;
        $user->password = bcrypt($user->password) ;
        $user->save();

        // $lecturer->user->name = $request->name_dosen;
        // $user->email = $request->email;
        // $user->save();

        return redirect()->to(route('lecturer.lihat', $lecturer->id))
            ->withSuccess('Berhasil memperbarui data Dosen');;
    }

    // menampilkan detail data hasil perubahan
    public function destroy(Lecturer $lecturer)
    {
        $lecturer->delete();
        return redirect()->to(route('lecturer.data'));
    }
}
