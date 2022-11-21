<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Mahasiswa;
use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateStudentRequest;
use App\Models\Prodi;

class StudentController extends Controller
{
        public function data()
        {
            $students= Mahasiswa::paginate(20);
            $prodis = Prodi::paginate(20);
            return view('koordinator.student.data', compact('students', 'prodis'));
        }
          
        public function lihat(Mahasiswa $student)
        {
            $prodi = Prodi::all();
            return view('koordinator.student.lihat', compact('student', 'prodi'));
        }

        public function pilih(Prodi $prodi)
        {
            $student = Mahasiswa::where('prodi_id', $prodi->id)->get();
            return view('koordinator.student.pilih',compact('prodi','student'));
        }
        
    
        public function destroy(Mahasiswa $student)
        {
            $student->delete();
            return redirect()->to(route('student.DataProdi'));
        }

        public function search(Request $request) {
            if($request->has('search')) {
                $students = Mahasiswa::where('npm', 'like', '%'.$request->search.'%')
                ->orWhere('angkatan', 'like', '%'.$request->search.'%')
                ->orWhere('no_hp', 'like', '%'.$request->search.'%')
                ->orWhere('address', 'like', '%'.$request->search.'%')
                ->paginate();
                // ->paginate(10);
            } else {
                $students = Mahasiswa::paginate(20);
            }
            $prodis = Prodi::paginate(20);
            
            return view('koordinator.student.data', compact('prodis', 'students'));
        }

        // $students= Mahasiswa::paginate(20);
        // $prodis = Prodi::paginate(20);


    }
    

