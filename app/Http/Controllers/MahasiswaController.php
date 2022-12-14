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
use App\Models\Tahun_ajaran;
use Illuminate\Http\Request;
use App\Models\Asisten_kelas;
use App\Models\Ketuapusat;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use PhpOffice\PhpWord\Settings;
use PhpOffice\PhpWord\IOFactory;
use PhpOffice\PhpWord\TemplateProcessor;

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
        'no_hp' => 'required | numeric | unique:mahasiswas',
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

    //logout authenticated user
    auth()->logout();

    // return ke halaman login
    return redirect()
    ->to(route('login')) 
    ->withSuccess('success', 'berhasil mendaftar');
  }

    public function home(){

      $program = Program::where('is_active', '1')->get();
      $registrations = Pendaftaran::whereBelongsTo($program)->get();
      $generalsubjects = Mata_kuliah::all();
     
      $asisten = Pendaftaran::whereBelongsTo($program)
      ->where('status', '1')->get();

      $kuota  = 0;
      $mku = Mku_program::where('id_program', $program[0]->id)->get();

      foreach ($mku as $p) {
        $kuota += $p->kuota;
      }

      return view('mahasiswa.ProfilStudent.home', compact('registrations', 'generalsubjects', 'asisten', 'kuota'));
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
        $dt = Carbon::now();
        $date = $dt->toDateString(); 
     return view('mahasiswa.ProfilStudent.detailprogram', compact('mku_program', 'date'));
   }

  //  untuk daftar program user
    public function daftar(Mku_program $mku_program)
  {
    return view('mahasiswa.ProfilStudent.form', compact('mku_program'));
  }

  // simpan data pendaftaran
  public function simpan(Request $request, Mku_program $mku_program)
  {
    $request->validate([
      'nilai_matkul' => 'required',
      'KHS' =>'required',
      'KRS' => 'required',
      'surat_rekomendasi' => 'required ',
    ], [
    'nilai_matkul.required' => "nilai matkul harus diisi",
    'KHS.required' => "KHS harus diisi",
    //   'KHS.image' => "KHS harus berupa gambar",
    //   'KHS.file' => "KHS harus berupa file",
    'KRS.required' => "KRS harus diisi",
    //   'KRS.image' => "KRS harus berupa gambar",
    //   'KRS.file' => "KRS harus berupa file",
    'surat_rekomendasi.required' => "surat rekomendasi harus diisi",
    //   'surat_rekomendasi.image' => "surat rekomendasi harus berupa gambar",
    //   'surat_rekomendasi.file' => "surat rekomendasi harus berupa file",
    ]);

    // $extentionKRS = $request->file('KRS')->getClientOriginalExtension();
    // $extentionKHS = $request->file('KHS')->getClientOriginalExtension();
    // $extentionsurat = $request->file('surat_rekomendasi')->getClientOriginalExtension();

    // $krs = $request->nilai_matkul.'-'.now()->timestamp.'.'.$extentionKRS;
    // $KRS = $request->file('KRS')->storeAs('krs', $krs  );

    // $krs = $request->nilai_matkul.'-'.now()->timestamp.'.'.$extentionKHS;
    // $KHS = $request->file('KHS')->storeAs('khs', $krs  );

    // $surat = $request->nilai_matkul.'-'.now()->timestamp.'.'.$extentionsurat;
    // $Surat = $request->file('surat_rekomendasi')->storeAs('surat', $surat  );

    // dd($KRS);

    $registration = new Pendaftaran;
    $registration->id_mahasiswa = auth()->user()->mahasiswa->id;
    $registration->id_program = $mku_program->program->id;
    $registration->id_mata_kuliah = $mku_program->mku->id;
    $registration->nilai_matkul = $request->nilai_matkul;
    $registration->KHS = $request->KHS;
    $registration->KRS = $request->KRS;
    $registration->surat_rekomendasi = $request->surat_rekomendasi;
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

  public function notifikasi()
  {
    $notifications = Pendaftaran::where('id_mahasiswa', auth()->user()->mahasiswa->id)->get();
    return view('mahasiswa.ProfilStudent.notifikasi', compact('notifications'));
  }
  

  // public function  notifikasi()
  // {
  //   $asistens = Asisten_kelas::
  //     whereHas('pendaftaran.mahasiswa.user', function ($query) {
  //       return $query->where('id', auth()->user()->id);
  //     })
  //     ->with(['pendaftaran', 'pendaftaran.mahasiswa', 'pendaftaran.mahasiswa.user'])
  //     ->get();

  //   // dd($asistens);

  //   return view('mahasiswa.ProfilStudent.notifikasi', compact('asistens'));

  // }

  public function sertifikat()
  {
    $items = Pendaftaran::where('id_mahasiswa', Auth::user()->mahasiswa->id)
    ->where('status', '1')
    ->get();

    return view('mahasiswa.ProfilStudent.halamansertifikat', compact('items'));
  }

  public function print($id)
  {
    $item = Pendaftaran::where('id', $id)
    ->where('id_mahasiswa', Auth::user()->mahasiswa->id)->first();
    return view('mahasiswa.ProfilStudent.sertifikat', compact('item'));
  }

  public function sertifikatAsdos($id){

    // $asdos = Pendaftaran::where('id_mahasiswa', Auth::user()->mahasiswa->id)
    // ->where('status', '1')
    // ->get();

    $asdos = Pendaftaran::where('id', $id)
    ->where('id_mahasiswa', Auth::user()->mahasiswa->id)->first();
    $tanggal = \Carbon\Carbon::parse(\Carbon\Carbon::now())->translatedFormat('d F Y');
    $templateProcessor = new TemplateProcessor('templates/sertifikat.docx');
    $ketua = Ketuapusat::first();

    $templateProcessor->setValues([
      'nama' => $asdos->mahasiswa->user->name,
        // 'nama' => '{{ Auth::user()->name }}',
        'npm' => Auth::user()->mahasiswa->npm,
        'mku' => $asdos->mku->nama,
        'tahun_ajaran' => $asdos->program->tahun_ajaran->tahun,
        'semester' => $asdos->program->tahun_ajaran->semester,
        'tanggal' => $tanggal,
        'no' => '1245432q',
        'nama_ketua' => $ketua->ketua,
        'nip' => $ketua->nip,
    ]);

    $fileName = '_temp/Sertifikat - '. time() . '.docx';
    $templateProcessor->saveAs($fileName);
    // Make sure you have `dompdf/dompdf` in your composer dependencies.
    // Settings::setPdfRendererName(Settings::PDF_RENDERER_DOMPDF);
    // // Any writable directory here. It will be ignored.
    // Settings::setPdfRendererPath('.');

    // $pdf = 'sertifikat-mahasiswa/sil - '. time() . '.pdf';

    // $phpWord = IOFactory::load($fileName);
    // $phpWord->save($pdf, 'PDF');

    //remove file
    // unlink($fileName);

    return response()->download(public_path($fileName));
  }

}
