<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Kelas;
use App\Models\Prodi;
use App\Models\Program;
use App\Models\Mahasiswa;
use App\Models\Mata_kuliah;
use App\Models\Mku_program;
use App\Models\Pendaftaran;
use App\Models\Asisten_kelas;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    //untuk view home user
  public function dataDiri(User $user)
  {
    $prodis = Prodi::all();
    return view('mahasiswa.ProfilStudent.registerMahasiswa', compact('user', 'prodis'));
  }

  public function simpandataDiri(Request $request, User $user)
  {
    $request->validate([
        'npm' => 'required | min:9 | max:9 |unique:mahasiswas',
        'prodi_id' => 'required',
        'angkatan' => 'required| min:4 | max:4',
        'no_hp' => 'required | unique:mahasiswas',
        'address' => 'required',
        'gender' => 'required',
  ],[
        'nama.string' => "nama lengkap harus berupa huruf bukan angka",
        'npm.required' => "npm lengkap harus diisi",
        'npm.min' => "npm harus sebanyak 9 karakter ex: G1A020010",
        'npm.max' => "npm harus sebanyak 9 karakter ex: G1A020010",
        'npm.unique' => "npm anda telah didaftarkan",
        'prodi_id.required' => "program studi lengkap harus diisi",
        'angkatan.required' => "tahun anagkatan lengkap harus diisi",
        'angkatan.min' => "angkatan diisi dengan tahun , ex : 2020",
        'angkatan.max' => "angkatan diisi dengan tahun , ex : 2020",
        'no_hp.required' => "no hp harus diisi",
        'no_hp.unique' => "no hp anda telah didaftarkan",
        'no_hp.numeric' => "no hp harus berupa angka",
        'address.required' => "alamat harus diisi",
        'gender.required' => "gender harus diisi",
  ]);

    $mahasiswa = new Mahasiswa;
    $mahasiswa->user_id = $user->id;
    $mahasiswa->npm = $request->npm;
    $mahasiswa->prodi_id = $request->prodi_id;
    $mahasiswa->angkatan = $request->angkatan;
    $mahasiswa->no_hp= $request->no_hp;
    $mahasiswa->address= $request->address;
    $mahasiswa->gender= $request->gender;

    $mahasiswa->save();

    // return ke halaman login
    return redirect()
    ->to(route('login')) 
    ->withSuccess('success', 'berhasil mendaftar');
  }

    public function home(){
      $registrations = Pendaftaran::all();
      $generalsubjects = Mata_kuliah::all();
      $kelas = Kelas::all();
      $asisten = Asisten_kelas::all();
      return view('mahasiswa.ProfilStudent.home', compact('registrations', 'generalsubjects', 'kelas', 'asisten'));
    }

    // untuk view perogram user
    public function program()
    {
      //$users = DB::table('users')->where('votes', 100)->get();       
      $program = Program::where('is_active', '1')->get();
      $mku_programs = Mku_program::whereBelongsTo($program)->get();      
      return view('mahasiswa.ProfilStudent.program', compact('program', 'mku_programs'));
   }
   //untuk detail program user
   public function detail(Mku_program $mku_program)
   {
     return view('mahasiswa.ProfilStudent.detailprogram', compact('mku_program'));
   }

  //  untuk daftar program user
    public function daftar(Mku_program $mku_program)
  {
    return view('mahasiswa.ProfilStudent.form', compact('mku_program'));
  }

  public function simpan(Request $request, Mku_program $mku_program)
  {
    $request->validate([
      'nilai_matkul' => 'required',
      'KHS' =>'required | image |file',
      'KRS' => 'required | image |file ',
      'surat_rekomendasi' => 'required | image |file',
    ], [
      'nilai_matkul.required' => "nilai matkul harus diisi",
      'KHS.required' => "KHS harus diisi",
      'KHS.image' => "KHS harus berupa gambar",
      'KHS.file' => "KHS harus berupa file",
      'KRS.required' => "KRS harus diisi",
      'KRS.image' => "KRS harus berupa gambar",
      'KRS.file' => "KRS harus berupa file",
      'surat_rekomendasi.required' => "surat rekomendasi harus diisi",
      'surat_rekomendasi.image' => "surat rekomendasi harus berupa gambar",
      'surat_rekomendasi.file' => "surat rekomendasi harus berupa file",
    ]);
    $extentionKRS = $request->file('KRS')->getClientOriginalExtension();
    $extentionKHS = $request->file('KHS')->getClientOriginalExtension();
    $extentionsurat = $request->file('surat_rekomendasi')->getClientOriginalExtension();

    $krs = $request->nilai_matkul.'-'.now()->timestamp.'.'.$extentionKRS;
    $KRS = $request->file('KRS')->storeAs('krs', $krs  );

    $krs = $request->nilai_matkul.'-'.now()->timestamp.'.'.$extentionKHS;
    $KHS = $request->file('KHS')->storeAs('khs', $krs  );

    $surat = $request->nilai_matkul.'-'.now()->timestamp.'.'.$extentionsurat;
    $Surat = $request->file('surat_rekomendasi')->storeAs('surat', $surat  );

    // dd($KRS);

    $registration = new Pendaftaran;
    $registration->id_mahasiswa = auth()->user()->mahasiswa->id;
    $registration->id_program = $mku_program->program->id;
    $registration->id_mata_kuliah = $mku_program->mku->id;
    $registration->nilai_matkul = $request->nilai_matkul;
    $registration->KHS = $KHS;
    $registration->KRS = $KRS;
    $registration->surat_rekomendasi = $Surat;
    $registration->status = '0';

    $registration->save();

    return redirect()
    ->to(route('mahasiswa.detail', $mku_program->id ))
    ->withSuccess('success', 'berhasil mendaftar');
  }

  // untuk profil user ( lihat data diri )
  public function profil(){
    return view('mahasiswa.ProfilStudent.profile');
  }

  // untuk edit data diri user
  public function edit(){
    $prodis = Prodi::all();
    return view('mahasiswa.ProfilStudent.editProfil', compact('prodis'));
  }

  public function update(Request $request)
  {
    
    $request->validate([
      'name' => 'required | string',
      'email' => 'required | email',
      'npm' => 'required | min:9 | max:9 ',
      'prodi_id' => 'required',
      'angkatan' => 'required',
      'no_hp' => 'required | numeric',
      'address' => 'required',
      'gender' => 'required',
],[
      'name.required' => "nama lengkap harus diisi",
      'name.string' => "nama lengkap harus berupa huruf bukan angka",
      'email.required' => "email  harus diisi",
      'email.email' => "masukkan format email",
      'npm.required' => "npm harus diisi",
      'npm.min' => "npm harus sebanyak 9 karakter ex: G1A020010",
      'npm.max' => "npm harus sebanyak 9 karakter ex: G1A020010",
      'npm.unique' => "npm anda telah didaftarkan",
      'prodi_id.required' => "program studi lengkap harus diisi",
      'angkatan.required' => "tahun anagkatan lengkap harus diisi",
      'angkatan.year' => "angkatan diisi dengan tahun , ex : 2020",
      'no_hp.required' => "no hp harus diisi",
      'no_hp.unique' => "no hp anda telah didaftarkan",
      'no_hp.numeric' => "no hp harus berupa angka",
      'address.required' => "alamat harus diisi",
      'gender.required' => "gender harus diisi",

]);
    $user = User::find(auth()->id());

    $user->update([
      
      'name' => $request->name,
      'email' => $request->email,
      // $user->save();
    ]);

    $user->mahasiswa->update([
      
      'npm'=> $request->npm,
      'prodi_id' =>$request->prodi_id,
      'angkatan'=>$request->angkatan,
      'address'=> $request->address,
      'no_hp'=> $request->no_hp,
      'gender' => $request->gender,
    
  ]);
    return redirect()
    ->to(route('mahasiswa.profil'))
    ->withSuccess('success', 'Data berhasil diubah');
  }

  public function password(){
  
    return view('mahasiswa.ProfilStudent.password');
  }

  public function editPassword(){
  
    return view('mahasiswa.ProfilStudent.editPassword');
  }

  public function updatePassword(Request $request){
    $user = User::find(auth()->id());

    $user->update([
      
      'password' => bcrypt($request->password),
    ]);

    return redirect()
    ->to(route('mahasiswa.password'))
    ->withSuccess('success', 'Data berhasil diubah');
  }

  public function  notifikasi()
  {
    $asistens = Asisten_kelas::
      whereHas('pendaftaran.mahasiswa.user', function ($query) {
        return $query->where('id', auth()->user()->id);
      })
      ->with(['pendaftaran', 'pendaftaran.mahasiswa', 'pendaftaran.mahasiswa.user'])
      ->get();

    // dd($asistens);

    return view('mahasiswa.ProfilStudent.notifikasi', compact('asistens'));

  }

  public function sertifikat(){
  
    return view('mahasiswa.ProfilStudent.halamansertifikat');
  }

}
