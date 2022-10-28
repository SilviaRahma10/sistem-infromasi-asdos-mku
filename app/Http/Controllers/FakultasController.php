<?php

namespace App\Http\Controllers;
use App\Models\Prodi;
use App\Models\Fakultas;
use Illuminate\Http\Request;
use App\Http\Requests\StoreFakultasRequest;
use App\Http\Requests\UpdateFakultasRequest;

class FakultasController extends Controller
{
   public function tambah(){
    return view('koordinator.fakultas.TambahFakultas');
   }

   public function simpan(Request $request){
    $fakultas=new Fakultas;
    $fakultas->faculty_name = $request->nama_fakultas;
    $fakultas->code = $request->code;

    $fakultas->save();

    return redirect()
    ->to(route('fakultas.konfirmasi', $fakultas->id))
    ->withSuccess('Berhasil menambah data fakultas');
   }

   public function konfirmasi(Fakultas $fakultas)
   {
    return view('koordinator.fakultas.konfirmasi', compact('fakultas'));
   }

   public function DataFakultas()
   {
    $fakultas=Fakultas::all();
    return view('koordinator.fakultas.DataFakultas', compact('fakultas'));
   }

   public function DataProdi(Fakultas $fakultas)
   {
    // $prodis=Prodi::all();
    return view('koordinator.prodi.data', compact('fakultas'));
   }

   public function lihat(Fakultas $fakultas)
   {
    return view('koordinator.fakultas.lihat', compact('fakultas'));
   }

   public function edit(Fakultas $fakultas)
   {
        return view('koordinator.fakultas.edit', compact('fakultas'));
   }

   public function update(Request $request, Fakultas $fakultas)
   {
    $fakultas->faculty_name = $request->nama_fakultas;
    $fakultas->code = $request->code;
    $fakultas->save();

    return redirect()
    ->to(route('fakultas.konfirmasi', $fakultas->id))
    ->withSuccess('Berhasil memperbarui data fakultas');
   }
   public function destroy(Fakultas $fakultas)
   {
       $fakultas->delete();
       return redirect()->to(route('fakultas.data'));
   }

}
