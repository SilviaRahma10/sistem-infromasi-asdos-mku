<?php

namespace App\Http\Controllers;
use App\Models\Kelas;
use App\Models\Prodi;
use Illuminate\Http\Request;
use App\Models\GeneralSubject;
use App\Http\Requests\StoreKelasRequest;
use App\Http\Requests\UpdateKelasRequest;

class KelasController extends Controller
{
   // menampilkan semua data prodi
   public function data()
   {
       $kelas = Kelas::all();
       $prodis = Prodi::all();
       return view('koordinator.kelas.data', compact('kelas', 'prodis'));
   }

   public function lihat(Kelas $kelas)
    {
        
        // $prodi = Prodi::all();
        return view('koordinator.kelas.lihat', compact('kelas'));
    }
    
    public function pilih(Prodi $prodi)
    {
        $kelas = Kelas::where('id_prodi', $prodi->id)->get();
        $generalsubjects = GeneralSubject::all();

        return view('koordinator.kelas.pilih', compact('prodi', 'kelas','generalsubjects'));
    }
}


