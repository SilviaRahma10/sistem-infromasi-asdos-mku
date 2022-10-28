<?php

namespace App\Http\Controllers;
use App\Models\Prodi;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{

    public function daftar(){
        return view('admin.coordinator.daftar');
       }
    public function simpan(Request $request){
        $user=new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->role = 'koordinator';
    
        $user->save();
        return view('admin.coordinator.tambah',compact('user'));

        // return redirect()->to(route('coordinator.tambah',compact('user')));
       }
       public function daftarlecturer(){
        return view('koordinator.lecturer.daftar');
       }
       
    // public function simpanlecturer(Request $request){
    //     $user=new User;
    //     $user->name = $request->name;
    //     $user->email = $request->email;
    //     $user->password = Hash::make($request->password);
    //     $user->role = 'dosen';
    
    //     $user->save();
    //     $prodis= Prodi::all();
    //     return view('koordinator.lecturer.tambah',compact('prodis','user'));

    //     // return redirect()->to(route('coordinator.tambah',compact('user')));
    //    }


       public function daftarstudent(){
        return view('mahasiswa.AccountStudent.daftar');
       }
    
    public function simpanstudent(Request $request){
        $user=new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->role = 'mahasiswa';
    
        $user->save();
        $prodis = Prodi::all();
        return view('mahasiswa.ProfilStudent.tambah',compact('user'));
        // return view('mahasiswa.student.tambah',compact('user'));
        // return redirect()->to(route('lecturer.tambah',compact('user')));
       }
}
