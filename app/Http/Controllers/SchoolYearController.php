<?php

namespace App\Http\Controllers;
use App\Models\SchoolYear;
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
          DB::table('school_years')->update([
               'is_active' => false
          ]);

            $schoolyear = new SchoolYear;
            $schoolyear->school_year = $request->school_year;
            $schoolyear->semester = $request->semester;
            $schoolyear->is_active = true;
            $schoolyear->save();
            

            return redirect()
          ->to(route('school_year.konfirmasi', $schoolyear->id))
          ->withSuccess('Berhasil menambah data Tahun Akademik');
     
     }

     public function konfirmasi(SchoolYear $schoolyear)
          {
               return view('koordinator.schoolyear.konfirmasi', compact('schoolyear'));
          }
    
       public function data()
       {
            $schoolyears = SchoolYear::all();
            return view('koordinator.schoolyear.data', compact('schoolyears'));
       }
    
       public function lihat(SchoolYear $schoolyear)
       {
            return view('koordinator.schoolyear.lihat', compact('schoolyear'));
       }
    
       public function edit(SchoolYear $schoolyear)
       {
            return view('koordinator.schoolyear.edit', compact('schoolyear'));
       }
    
       public function update(Request $request, SchoolYear $schoolyear)
       {
            $schoolyear->school_year = $request->school_year;
            $schoolyear->semester = $request->semester;
            $schoolyear->save();
        
            return redirect()
            ->to(route('school_year.konfirmasi', $schoolyear->id))
            ->withSuccess('Berhasil memperbarui data Tahun Akademik');
       }
       public function destroy(SchoolYear $schoolyear)
       {
           $schoolyear->delete();
           return redirect()->to(route('school_year.data'));
       }
    
    }
    

