<?php

namespace App\Http\Controllers;
use App\Models\Prodi;
use App\Models\Program;
use App\Models\Fakultas;
use App\Models\Mata_kuliah;
use App\Models\Mku_program;
use App\Models\Pendaftaran;
use Illuminate\Http\Request;
use App\Models\Asisten_kelas;
use App\Http\Requests\StoreFakultasRequest;
use App\Http\Requests\UpdateFakultasRequest;
use App\Models\Tahun_ajaran;

class FakultasController extends Controller
{
    // controller untuk halaman dashboard
    public function dashboard(){
        $tahun_ajaran = Tahun_ajaran::all();
        $fakultas = Fakultas::all(); 
        $prodis = Prodi::all();
        $mku = Mata_kuliah::all();

        $program = Program::where('is_active', '1')->get();

        $mku_program = Mku_program::whereBelongsTo($program)->get();

        $registration = Pendaftaran::whereBelongsTo($program)->get();

        $registrationsBelumVerifikasi = Pendaftaran::whereBelongsTo($program)
        ->where('status', '0')->get();

        $registrationsTerima = Pendaftaran::whereBelongsTo($program)
        ->where('status', '1')->get();

        $registrationsTolak = Pendaftaran::whereBelongsTo($program)
        ->where('status', '2')->get();

        $asisten = Asisten_kelas::all();
        return view('admin', compact('tahun_ajaran','fakultas', 'program', 'prodis', 'mku', 'mku_program', 'registration', 'registrationsBelumVerifikasi', 'registrationsTerima', 'registrationsTolak', 'asisten'));
    }



    //controller untuk menu fakultas
   public function tambah(){
    return view('koordinator.fakultas.TambahFakultas');
   }

   public function simpan(Request $request){

    $request->validate([
        'nama'=> 'required',
        'kode' => 'required | unique:fakultas',
    ]);

    $fakultas=new Fakultas;
    $fakultas->nama = $request->nama;
    $fakultas->kode = $request->kode;

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
        $fakultas=Fakultas::paginate(5);
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

    $request->validate([
        'nama'=> 'required',
        'kode' => 'required',
    ]);

    $fakultas->nama = $request->nama;
    $fakultas->kode = $request->kode;
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

   public function search(Request $request) {
    if($request->has('search')) {
        $fakultas = Fakultas::where('nama', 'like', '%'.$request->search.'%')
        ->orWhere('kode', 'like', '%'.$request->search.'%')
        ->paginate(5);
    }else{
            $fakultas = Fakultas::paginate(5);
        }
        return view('koordinator.fakultas.DataFakultas', compact('fakultas'));

    }
   }


