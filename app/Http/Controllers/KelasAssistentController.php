<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Program;
use App\Models\Student;
use App\Models\SchoolYear;
use App\Models\Mata_Kuliah;
use App\Models\Pendaftaran;
use App\Models\Registration;
use Illuminate\Http\Request;
use App\Models\Asisten_kelas;
use App\Exports\AsistenExport;

use App\Models\GeneralSubject;
use App\Models\Mata_kuliah_prodi;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Requests\StoreKelasAssistentRequest;
use App\Http\Requests\UpdateKelasAssistentRequest;
use App\Models\Tahun_ajaran;

class KelasAssistentController extends Controller
{
   
    public function pemetaan(Pendaftaran $pendaftaran)
    {
        $prodi = $pendaftaran->mku->mata_kuliah_prodi;

        return view('koordinator.kelas_asisstent.pemetaan', compact('pendaftaran', 'prodi'));
    }

    public function tambah(Request $request, Pendaftaran $pendaftaran)
    {
        // $id_mahasiswa_pendaftar = $pendaftaran->id;
        // $id_kelas = $request->id_kelas;

        $asisten = new Asisten_kelas();
        $asisten->id_mahasiswa_pendaftar = $pendaftaran->id;
        $asisten->id_kelas = $request->id_kelas;
        $asisten->save();
        
        return redirect()
            ->to(route('asisten.lihat', $asisten->id))
            ->withSuccess('Berhasil Memetakan Asisten Kelas');
    }

    public function data()
    {
        $asisten = Asisten_kelas :: all();
        $generalsubjects = Mata_Kuliah::all();
        $tahun_ajarans = Tahun_ajaran::all();
        

        return view('koordinator.kelas_asisstent.data', compact('asisten', 'generalsubjects', 'tahun_ajarans'));
    }

       public function lihat(Asisten_kelas $asisten){

        return view('koordinator.kelas_asisstent.lihat', compact('asisten'));
    }

    public function edit(Asisten_kelas $asisten)
    {
        $prodi = $asisten->pendaftaran->mku->mata_kuliah_prodi;

        return view('koordinator.kelas_asisstent.edit', compact('asisten', 'prodi'));
    }
    public function update(Request $request, Asisten_kelas $asisten)
    {
       
        $asisten->id_kelas = $request->id_kelas;
        $asisten->save();
        
        return redirect()
            ->to(route('asisten.lihat', $asisten->id))
            ->withSuccess('Berhasil Mengubah Data Asisten Kelas');
    }

    public function pilih(Mata_kuliah $generalsubject)
  {
    $program = Program::where('is_active', '1')->get();
    $registrations = Pendaftaran::whereBelongsTo($program)
      ->where('status', '0')->get();
    //
  }
        public function export(Request $request, Tahun_ajaran $id_tahun)
        {
            $idTahun = $request->get('id_tahun');

            return Excel::download(new AsistenExport($idTahun), 'Asisten Kelas.xlsx');
        }
}
