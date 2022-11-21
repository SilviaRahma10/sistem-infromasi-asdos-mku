<?php

namespace App\Http\Controllers;

use App\Models\Mata_kuliah;
use App\Models\Prodi;
use Illuminate\Http\Request;

class MataKuliahProdi extends Controller
{
    public function data()
    {
        $generalsubjetcs = Mata_kuliah::all();
        $prodis = Prodi::all();
        
        return view('koordinator.prodi.data', compact('generalsubjetcs','prodis'));
    }
}
