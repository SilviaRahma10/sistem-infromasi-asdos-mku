<?php

namespace App\Http\Controllers;
use App\Models\Dosen;
use App\Models\Kelas;
use App\Models\Prodi;
use App\Models\Dosen_pengampu;
use App\Models\Mata_kuliah;
use App\Models\Mata_kuliah_prodi;
use Illuminate\Http\Request;
use App\Models\GeneralSubject;
use App\Http\Requests\StoreKelasRequest;
use App\Http\Requests\UpdateKelasRequest;
use App\Models\Lecturer;
use PhpParser\Node\NullableType;

class KelasController extends Controller
{

    public function create()
    {
        $prodis = Prodi::all();
        $dosens = Dosen::all();
        
        return view('koordinator.kelas.create', compact('prodis', 'dosens'));
    }

   // menampilkan semua data prodi
   public function data()
   {
        $kelas = Kelas::paginate(10);
        $prodis =Prodi::paginate(10);
        $mata_kuliah = Mata_Kuliah::paginate(10);
       return view('koordinator.kelas.data', compact('kelas', 'prodis', 'mata_kuliah'));
   }

   public function lihat(Kelas $kelas)
    {
        $dosenpengampu = Dosen_pengampu::where('id_kelas', $kelas->id)->get();
        return view('koordinator.kelas.lihat', compact('kelas', 'dosenpengampu'));
    }
    
    public function pilihProdi(Prodi $prodi)
    
    {
        $kelas = Kelas::where(function($query){
            $query->select('id')
            ->from('mata_kuliah_prodis')
            ->whereColumn('mata_kuliah_prodis.id_prodi', 'prodis.id');
        })->get();
        
        // $kelas = Mata_kuliah_prodi::where('id_prodi', $prodi->id)
        
        // ->get();
        // $kelas = 
        // $mata_kuliah_prodi= Mata_kuliah_prodi::all();
        // $kelas = Kelas::where('id_mata_kuliah_prodi',$mku_prodi->id)->get();
        return view('koordinator.kelas.pilihProdi', compact('prodi','kelas'));
        // return view('koordinator.kelas.pilih', compact('prodi', 'mku_prodi','kelas'));
    }

    public function pilihMku(Mata_kuliah $generalsubject)
    {
        

        
        // $generalsubjects = GeneralSubject::all();

        return view('koordinator.kelas.pilih');
    }

    public function store(Request $request)
    {
        // dd($request->all());

        $request->validate([
            // 'id_mata_kuliah_prodi' => 'required',
           'nama' => 'required | string | min:1 |max:10',
           'dosen' =>'required',
           'hari'=> 'nullable',
            'waktu' => 'nullable',
           'ruang' => 'nullable',
        ],[
            'id_mata_kuliah_prodi.required' => " mata kuliah harus diisi",
            'nama.required' => " nama kelas harus diisi"
        ]);



        $kelas = new Kelas();
        $kelas->id_mata_kuliah_prodi = $request->id_mata_kuliah;
        $kelas->nama = $request->nama;
        $kelas->hari = $request->hari;
        $kelas->waktu = $request->waktu;
        $kelas->ruang = $request->ruang;
        $kelas->save();

        $dosen = $request->dosen;
        if (is_array($dosen) && count($dosen) > 0) {
            foreach ($dosen as $key => $value) {
                $kelas->dosen()->attach($value);
            }
        }

        return redirect()
            ->route('kelas.data')->with('success', 'Data Kelas Berhasil Ditambahkan');
    }

    public function edit(Kelas $kelas)
    {
        $prodis = Prodi::all();
        $dosens = Dosen::all();
        return view('koordinator.kelas.edit', compact('kelas', 'prodis', 'dosens'));
    }

    public function update(Request $request, Kelas $kelas)
    {
        // dd($request->all());
        $kelas->id_mata_kuliah_prodi = $request->id_mata_kuliah;
        $kelas->nama = $request->nama;
        $kelas->hari = $request->hari;
        $kelas->waktu = $request->waktu;
        $kelas->ruang = $request->ruang;
        $kelas->save();

        $dosen = $request->dosen;
        if (is_array($dosen) && count($dosen) > 0) {
            foreach ($dosen as $key => $value) {
                $kelas->dosen()->attach($value);
            }
        }

        return redirect()
            ->route('kelas.data')->with('success', 'Data Kelas Berhasil Diubah');
    }

    public function destroy(Kelas $kelas)
    {
        $kelas->delete();
        return redirect()->to(route('kelas.data'));
    }

    public function search(Request $request) {
        if($request->has('search')) {
            
            $kelas = Kelas::where('nama', 'like', '%'.$request->search.'%')
            ->orWhere('hari', 'like', '%'.$request->search.'%')
            ->orWhere('hari', 'like', '%'.$request->search.'%')
            ->orWhere('waktu', 'like', '%'.$request->search.'%')
            ->orWhere('ruang', 'like', '%'.$request->search.'%')
            ->paginate();
            // ->paginate(10);
        } else {
            $kelas = Kelas::paginate(10);
        }
         $prodis =Prodi::paginate(10);
        $mata_kuliah = Mata_Kuliah::paginate(10);
        
        return view('koordinator.kelas.data', compact('kelas','prodis', 'mata_kuliah'));
    }

}


