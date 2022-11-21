<?php

namespace App\Http\Controllers;
use App\Models\Tahun_ajaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreSchoolYearRequest;
use App\Http\Requests\UpdateSchoolYearRequest;

class SchoolYearController extends Controller
{
   
     public function tambah()
     {
        return view('koordinator.schoolyear.tambah');
     }
    
     public function simpan(Request $request)
     {
          $request->validate([
               'tahun' => 'required| min:8 | max: 10',
               'semester' => 'required',
          ], [
               'tahun.required' => "tahun ajaran harus diisi",
               'tahun.min' => "tahun ajaran memiliki minimal 8 karakter, ex: 2022/2023",
               'tahun.max' => "tahun ajaran memiliki minimal 9 karakter, ex: 2022/2023",
               'semester.required' => "semester harus diisi"

          ]);

            $tahun = new Tahun_ajaran;
            $tahun->tahun = $request->tahun;
            $tahun->semester = $request->semester;
            $tahun->save();
            

            return redirect()
          ->to(route('school_year.konfirmasi', $tahun->id))
          ->withSuccess('Berhasil menambah data Tahun Akademik');
     
     }

     public function konfirmasi(Tahun_ajaran $tahun)
          {
               return view('koordinator.schoolyear.konfirmasi', compact('tahun'));
          }
    
       public function data()
       {
            $tahuns = Tahun_ajaran::paginate(10);
            return view('koordinator.schoolyear.data', compact('tahuns'));
       }
    
       public function lihat(Tahun_ajaran $tahun)
       {
            return view('koordinator.schoolyear.lihat', compact('tahun'));
       }
    
       public function edit(Tahun_ajaran $tahun)
       {
            return view('koordinator.schoolyear.edit', compact('tahun'));
       }
    
       public function update(Request $request, Tahun_ajaran $tahun)
       {
          $request->validate([
               'tahun' => 'required| min:8 | max: 10',
               'semester' => 'required',
          ], [
               'tahun.required' => "tahun ajaran harus diisi",
               'tahun.min' => "tahun ajaran memiliki minimal 8 karakter, ex: 2022/2023",
               'tahun.max' => "tahun ajaran memiliki minimal 9 karakter, ex: 2022/2023",
               'semester.required' => "semester harus diisi"

          ]);

            $tahun->tahun = $request->tahun;
            $tahun->semester = $request->semester;
            $tahun->save();
        
            return redirect()
            ->to(route('school_year.konfirmasi', $tahun->id))
            ->withSuccess('Berhasil memperbarui data Tahun Akademik');
       }

       public function destroy(Tahun_ajaran $tahun)
       {
           $tahun->delete();
           return redirect()->to(route('school_year.data'));
       }

       public function search(Request $request) {
          if($request->has('search')) {
               if(strtolower($request->search) == 'ganjil'){
                    $tahuns = Tahun_ajaran::where('tahun', 'like', '%'.$request->search.'%')
                    ->orWhere('semester', '1')
                    ->paginate();
               }elseif(strtolower($request->search) == 'genap'){
                    $tahuns = Tahun_ajaran::where('tahun', 'like', '%'.$request->search.'%')
                    ->orWhere('semester', '2')
                    ->paginate();
               }else{
                    $tahuns = Tahun_ajaran::where('tahun', 'like', '%'.$request->search.'%')
                    ->paginate();
               }
               
          }else{
               $tahuns = Tahun_ajaran::paginate(10);
              }
              return view('koordinator.schoolyear.data', compact('tahuns'));
      
          }
    
    }
    

