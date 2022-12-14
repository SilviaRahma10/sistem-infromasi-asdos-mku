<?php

namespace App\Http\Controllers;

use App\Models\Ketuapusat;
use Illuminate\Http\Request;

class KetuapusatController extends Controller
{
    //
    public function index()
    {
        $ketuapusat = Ketuapusat::first();
        return view('koordinator.ketua.index', compact('ketuapusat'));
    }

    public function edit(Request $request,Ketuapusat $ketuapusat)
    {
        return view('koordinator.ketua.edit', compact('ketuapusat'));
    }

    public function update( Request $request, Ketuapusat $ketuapusat)
    {
        $request->validate([
            
            'ketua' => 'required',
            'nip' => 'required | unique:ketuapusats',
        ]);

        $ketuapusat->ketua = $request->ketua;
        $ketuapusat->nip = $request->nip;
        $ketuapusat->save();

        return redirect()
        ->to(route('Ketuapusat.lihat'))
        ->withSuccess('Berhasil memperbarui Data ketua pusat');
    }

    
}
