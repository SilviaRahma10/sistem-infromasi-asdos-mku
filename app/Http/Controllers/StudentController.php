<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateStudentRequest;
use App\Models\Prodi;

class StudentController extends Controller
{

        // public function DataProdi()
        // {
        //     $prodis =Prodi::all();
        //     return view('koordinator.student.ProdiData', compact('prodis'));
        // }

        // fungsi C (create)
        // public function tambah(){
            
        //     $prodis = Prodi::all();
        //     return view('student.tambah', compact('prodis'));
        // }

        public function data()
        {
            $students= Student::all();
            $prodis = Prodi::all();
            return view('koordinator.student.data', compact('students', 'prodis'));
        }
    
        // fungsi simpan data ke db dari yang diinputkan user
        public function simpan(Request $request)
        {
            // membuat validasi
            // $request->validate([
            // 'nama_prodi'=> 'required',
            // 'fakultas'=> 'required',
            // 'jumlah_kelas'=> 'required|min:1',
            // 'akreditasi'=> 'required',
            // 'jenjang'=> 'required',
            // ]);

            // mengirimkan data yang diinput dihalaman daftar ke db
            $student = new Student();
            $student->user_id =$request->user_id;
            $student->npm =$request->npm;
            $student->name = $request->name;
            $student->prodi_id = $request->prodi_id;
            $student->angkatan = $request->angkatan;
            $student->email = $request->email;
            $student->no_hp = $request->no_hp;
            $student->address = $request->address;
            $student->gender = $request->gender;
            // menyimpan ke db
            // $student->save();
            return view('mahasiswa.ProfilStudent.detail', compact('student'));
         }
    
        // menampilkan semua data prodi( sbg kategory)
 
    
        // melihat read / lihat detail data
        public function lihat(Student $student)
        {
            $prodi = Prodi::all();
            return view('koordinator.student.lihat', compact('student', 'prodi'));
        }

        public function pilih(Prodi $prodi)
        {
            $student = Student::where('prodi_id', $prodi->id)->get();
            return view('koordinator.student.pilih',compact('prodi','student'));
        }
        // edit data atau menampilkan data yang di klik untuk di edit
        // public function edit(Student $student)
        // {
        //     $prodis = Prodi::all();
        // return view('student.edit', compact('student', 'prodis'));
        // }
    
        // public function update( Request $request, Student $student)
        // {
        //     $student->npm =$request->npm;
        //     $student->name = $request->name;
        //     $student->prodi_id = $request->prodi_id;
        //     $student->angkatan = $request->angkatan;
        //     $student->email = $request->email;
        //     $student->no_hp = $request->no_hp;
        //     $student->address = $request->address;
        //     $student->jenis_kelamin = $request->jenis_kelamin;
    
        // // simpan
        // $student->save();
    
        // // menampilkan detail data hasil perubahan
        // return redirect()->to(route('student.lihat', $student->id));
        // }
    
        public function destroy(Student $student)
        {
            $student->delete();
            return redirect()->to(route('student.DataProdi'));
        }
    }
    

