<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Coordinator;
use Illuminate\Http\Request;
use App\Http\Requests\StoreCoordinatorRequest;
use App\Http\Requests\UpdateCoordinatorRequest;

class CoordinatorController extends Controller
{
   public function tambah(){
    return view('admin.coordinator.tambah');
   }
   public function simpan(Request $request)
   {

    $user = new User;
    $user->name = $request->name;
    $user->email = $request->email;
    $user->email_verified_at = now();
    $user->password = bcrypt($request->password);
    $user->role = 'koordinator';
    $user->save();

    $coordinator=new Coordinator;
    $coordinator->user_id = $user->id;
    $coordinator->nip = $request->nip;
    $coordinator->nidn = $request->nidn;
    $coordinator->name = $request->name;
    $coordinator->address = $request->address;
    $coordinator->no_hp = $request->no_hp;
    $coordinator->status = $request->status;
    
    $coordinator->save();

    // coordinator.konfirmasi
    return redirect()
    ->to(route('coordinator.konfirmasi', $coordinator->id))
    ->withSuccess('Berhasil menambah data Koordinator');
   }

   public function konfirmasi(Coordinator $coordinator)
   {
    return view('admin.coordinator.lihat', compact('coordinator'));
   }

   public function data()
   {
    $coordinators=Coordinator::all();
    return view('admin.coordinator.data', compact('coordinators'));
   }

   public function lihat(Coordinator $coordinator)
   {
    return view('admin.coordinator.lihat', compact('coordinator'));
   }

   public function edit(Coordinator $coordinator)
   {
        return view('admin.coordinator.edit', compact('coordinator'));
   }

   public function update(Request $request, Coordinator $coordinator)
   {
    $coordinator->nip = $request->nip;
    $coordinator->nidn = $request->nidn;
    $coordinator->name = $request->name;
    $coordinator->address = $request->address;
    $coordinator->no_hp = $request->no_hp;
    $coordinator->status = $request->status;

    $coordinator->save();
    return redirect()
    ->to(route('coordinator.konfirmasi', $coordinator->id))
    ->withSuccess('Berhasil memperbarui data Koordinator');
   }

   public function destroy(Coordinator $coordinator)
   {
       $coordinator->delete();
       return redirect()->to(route('coordinator.data'));
   }
}
