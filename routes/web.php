<?php

use PhpOffice\PhpWord\Settings;
use PhpOffice\PhpWord\IOFactory;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaController;
use App\Http\Controllers\MkuController;
use App\Http\Controllers\UserController;
use PhpOffice\PhpWord\TemplateProcessor;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\ProdiController;
use App\Http\Controllers\AsistenController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\FakultasController;
use App\Http\Controllers\LecturerController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\MkuProgramController;
use App\Http\Controllers\ProdiKelasController;
use App\Http\Controllers\SchoolYearController;
use App\Http\Controllers\CoordinatorController;
use App\Http\Controllers\KoordinatorController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\GeneralSubjectController;
use App\Http\Controllers\KelasAssistentController;
use App\Http\Controllers\KetuapusatController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

// Route::group(['middleware' => ['auth', 'role:admin']], function() {
// // route untuk halaman beranda admin
// Route::get('/admin',function(){
    
//         return view('admin');
//     })->name('admin');

// route untuk menu crud koordinator mku

Route::post ('user_coordinator/simpan', [UserController ::class, 'simpan'])->name('user_coordinator.simpan');
Route::get ('coordinator/tambah', [CoordinatorController ::class, 'tambah'])->name('coordinator.tambah');
Route::post ('coordinator/simpan', [CoordinatorController ::class, 'simpan'])->name('coordinator.simpan');
Route::get ('coordinator/data', [CoordinatorController ::class, 'data'])->name('coordinator.data');
Route::get ('coordinator/{coordinator}', [CoordinatorController ::class, 'lihat'])->name('coordinator.lihat');
Route::get ('coordinator/{coordinator}/konfirmasi', [CoordinatorController ::class, 'konfirmasi'])->name('coordinator.konfirmasi');
Route::get ('coordinator/{coordinator}/edit', [CoordinatorController ::class, 'edit'])->name('coordinator.edit');
Route::put('coordinator/{coordinator}', [CoordinatorController ::class, 'update'])->name('coordinator.update');
Route::delete('coordinator/{coordinator}', [CoordinatorController::class,'destroy'])->name('coordinator.destroy');

// route untuk menu laporan


Route::get ('asisten/laporan/data', [KelasAssistentController ::class, 'laporandata'])->name('laporan.data');

Route::group(['middleware' => ['auth']], function() {
    // Route::get ('program/data', [ProgramController ::class, 'data'])->name('program.data');
Route::get ('mkuprogram/lihat/{mku_program}', [MkuProgramController ::class, 'lihat'])->name('mkuprogram.lihat');

Route::get ('/koordinator/data/asisten', [AsistenController ::class, 'data'])->name('asisten.data');
Route::get ('/koordinator/data/asisten/detail{registration}', [AsistenController ::class, 'lihat'])->name('asisten.detail');

Route::get ('data/asisten', [AsistenController ::class, 'datasisten'])->name('asisten.datasisten');
Route::get ('data/asisten/lihat{registration}', [AsistenController ::class, 'lihat'])->name('asisten.lihat');
Route::get ('data/asisten/mku/{generalsubject}/diterima', [AsistenController ::class, 'pilihasisten'])->name('asisten.pilih');
Route::delete('data/asisten/{registration}', [AsistenController::class,'destroy'])->name('asisten.destroy');
Route::get('data/asisten/search', [AsistenController::class,'search'])->name('asisten.search');
Route::get('asisten/export', [AsistenController::class, 'export'])->name('asisten.export');

});

Route::group(['middleware' => ['auth', 'role:admin']], function() {
//    route untuk halaman utama koordinator
    Route::get('/admin', [DashboardController ::class, 'dashboard'])->name('admin');

// profil koordonator login
Route::get ('profil/data', function(){
    return view('koordinator.profil.data');
})->name('profil.data');


//1. route untuk menu fakultas (crud) FIKS
Route::get ('fakultas/tambah', [FakultasController ::class, 'tambah'])->name('fakultas.tambah');
Route::post ('fakultas/simpan', [FakultasController ::class, 'simpan'])->name('fakultas.simpan');
Route::get ('fakultas/data', [FakultasController ::class, 'DataFakultas'])->name('fakultas.data');
Route::get ('fakultas/data/{fakultas}', [FakultasController ::class, 'lihat'])->name('fakultas.lihat');
Route::get ('fakultas/{fakultas}', [FakultasController ::class, 'konfirmasi'])->name('fakultas.konfirmasi');
Route::get ('fakultas/{fakultas}/edit', [FakultasController ::class, 'edit'])->name('fakultas.edit');
Route::put('fakultas/{fakultas}', [FakultasController ::class, 'update'])->name('fakultas.update');
Route::delete('fakultas/{fakultas}', [FakultasController::class,'destroy'])->name('fakultas.destroy');
Route::get ('fak/search', [FakultasController ::class, 'search'])->name('fakultas.search');

//2.route untuk menu data prodi -> prodi (crud) FIKS
Route::get ('prodi/data', [ProdiController ::class, 'data'])->name('prodi.data');
Route::get ('prodi/tambah', [ProdiController ::class, 'tambah'])->name('prodi.tambah');
Route::post ('prodi/simpan', [ProdiController ::class, 'simpan'])->name('prodi.simpan');
Route::get ('prodi/lihat/{prodi}', [ProdiController ::class, 'lihat'])->name('prodi.lihat');
Route::get ('prodi/{prodi}', [ProdiController ::class, 'konfirmasi'])->name('prodi.konfirmasi');
Route::get ('prodi/{prodi}/edit', [ProdiController ::class, 'edit'])->name('prodi.edit');
Route::put('prodi/{prodi}', [ProdiController ::class, 'update'])->name('prodi.update');
Route::delete('prodi/{prodi}', [ProdiController::class,'destroy'])->name('prodi.destroy');
Route::get('prodi/pilih/{fakultas}', [ProdiController ::class, 'pilih'])->name('prodi.pilih');
Route::get ('prod/search', [ProdiController ::class, 'search'])->name('prodi.search');

//3. route untuk menu data dosen( crud) FIKS
Route::get ('lecturer/tambah', [LecturerController ::class, 'tambah'])->name('lecturer.tambah');
Route::post ('lecturer/simpan', [LecturerController ::class, 'simpan'])->name('lecturer.simpan');
Route::get ('lecturer/data', [LecturerController ::class, 'data'])->name('lecturer.data');
Route::get ('lecturer/{lecturer}', [LecturerController ::class, 'lihat'])->name('lecturer.lihat');
Route::get ('lecturer/{lecturer}/edit', [LecturerController ::class, 'edit'])->name('lecturer.edit');
Route::put('lecturer/{lecturer}', [LecturerController ::class, 'update'])->name('lecturer.update');
Route::delete('lecturer/{lecturer}', [LecturerController::class,'destroy'])->name('lecturer.destroy');
Route::get('lecturer/prodi/{prodi}', [LecturerController ::class, 'pilih'])->name('lecturer.pilih');
Route::get ('dos/search', [LecturerController ::class, 'search'])->name('lecturer.search');


//4. route untuk menu mku (crud ) FIKS
Route::get ('generalsubject/tambah', [GeneralSubjectController ::class, 'tambah'])->name('generalsubject.tambah');
Route::post ('generalsubject/simpan', [GeneralSubjectController ::class, 'simpan'])->name('generalsubject.simpan');
Route::get ('generalsubject/data', [GeneralSubjectController ::class, 'data'])->name('generalsubject.data');
Route::get ('generalsubject/{generalsubject}', [GeneralSubjectController ::class, 'lihat'])->name('generalsubject.lihat');
Route::get ('generalsubject/{generalsubject}/edit', [GeneralSubjectController ::class, 'edit'])->name('generalsubject.edit');
Route::put('generalsubject/{generalsubject}', [GeneralSubjectController ::class, 'update'])->name('generalsubject.update');
Route::delete('generalsubject/{generalsubject}', [GeneralSubjectController::class,'destroy'])->name('generalsubject.destroy');
Route::get ('matakuliah/search', [GeneralSubjectController ::class, 'search'])->name('generalsubject.search');

// route untuk menu koordinator
Route::get ('koordinator/tambah', [KoordinatorController ::class, 'tambah'])->name('koordinator.tambah');
Route::post ('koordinator/simpan', [KoordinatorController ::class, 'simpan'])->name('koordinator.simpan');
Route::get ('koordinator/data', [KoordinatorController ::class, 'data'])->name('koordinator.data');
Route::get ('koordinator/{koordinator}', [KoordinatorController ::class, 'lihat'])->name('koordinator.lihat');
Route::get ('koordinator/{koordinator}/edit', [KoordinatorController ::class, 'edit'])->name('koordinator.edit');
Route::put('koordinator/{koordinator}', [KoordinatorController ::class, 'update'])->name('koordinator.update');
Route::delete('koordinator/{koordinator}', [KoordinatorController::class,'destroy'])->name('koordinator.destroy');
Route::get ('koordinator/mku/search', [KoordinatorController ::class, 'search'])->name('koordinator.search');


// ketua pusat
Route::get ('ketuapusat/', [KetuapusatController ::class, 'index'])->name('Ketuapusat.lihat');
Route::get ('ketuapusat/{ketuapusat}/edit', [KetuapusatController ::class, 'edit'])->name('Ketuapusat.edit');
Route::put('ketuapusat/{ketuapusat}', [KetuapusatController ::class, 'update'])->name('Ketuapusat.update');

//5. route untuk menu kelas(crud ) 
Route::get('/kelas/create', [KelasController::class, 'create'])->name('kelas.create');
Route::post('/kelas/store', [KelasController::class, 'store'])->name('kelas.store');
Route::get ('kelas/data', [KelasController ::class, 'data'])->name('kelas.data');
Route::get ('kelas/{kelas}/lihat', [KelasController ::class, 'lihat'])->name('kelas.lihat');
Route::get('kelas/{kelas}/edit', [KelasController ::class, 'edit'])->name('kelas.edit');
Route::put('kelas/{kelas}', [KelasController ::class, 'update'])->name('kelas.update');
Route::get ('kelas/pilih/{prodi}', [KelasController ::class, 'pilihProdi'])->name('kelas.pilihProdi');
Route::get ('kelas/pilih/{generalsubject}', [KelasController ::class, 'pilihMku'])->name('kelas.pilihMku');
Route::delete('kelas/{program}', [KelasController::class,'destroy'])->name('kelas.destroy');
Route::get('kelascari/search', [KelasController::class,'search'])->name('kelas.search');

//6. route untuk menu tahun akademik(crud ) FIKS
Route::get ('schoolyear/tambah', [SchoolYearController ::class, 'tambah'])->name('school_year.tambah');
Route::post ('schoolyear/simpan', [SchoolYearController ::class, 'simpan'])->name('school_year.simpan');
Route::get ('schoolyear/data', [SchoolYearController ::class, 'data'])->name('school_year.data');
Route::get ('schoolyear/data/{tahun}', [SchoolYearController ::class, 'lihat'])->name('school_year.lihat');
Route::get ('schoolyear/{tahun}', [SchoolYearController ::class, 'konfirmasi'])->name('school_year.konfirmasi');
Route::get ('schoolyear/{tahun}/edit', [SchoolYearController ::class, 'edit'])->name('school_year.edit');
Route::put('schoolyear/{tahun}', [SchoolYearController ::class, 'update'])->name('school_year.update');
Route::delete('schoolyear/{tahun}', [SchoolYearController::class,'destroy'])->name('school_year.destroy');
Route::get('ajaran/search', [SchoolYearController::class,'search'])->name('school_year.search');

// //2.2. route untuk prodi kelas
// Route::get ('prodi/kelas/tambah/{prodi}', [ProdiKelasController ::class, 'tambah'])->name('prodikelas.tambah');
// Route::post ('prodi/simpan{prodi}/', [ProdiKelasController ::class, 'simpan'])->name('prodikelas.simpan');

// 7 Route Program FIKS
Route::get ('program/tambah', [ProgramController ::class, 'tambah'])->name('program.tambah');
Route::post ('program/simpan', [ProgramController ::class, 'simpan'])->name('program.simpan');
Route::get ('program/data', [ProgramController ::class, 'data'])->name('program.data');
Route::get ('program/data/{program}', [ProgramController ::class, 'lihat'])->name('program.lihat');
Route::get ('program/{program}/edit', [ProgramController ::class, 'edit'])->name('program.edit');
Route::put('program/{program}', [ProgramController ::class, 'update'])->name('program.update');
Route::delete('program/{program}', [ProgramController::class,'destroy'])->name('program.destroy');
// Route::get('prog/search', [ProgramController::class,'search'])->name('program.search');
Route::get('prog/search', [ProgramController::class,'search'])->name('program.search');

//8 Route mku program FIKS
// Route::get ('mku_program/data/{program}', [MkuProgramController ::class, 'data'])->name('mku_program.data');
// Route::get ('mkuprogram/tambah/{program}', [MkuProgramController ::class, 'tambah'])->name('mkuprogram.tambah');
// Route::post('mkuprogram/simpan{program}', [MkuProgramController ::class, 'simpan'])->name('mkuprogram.simpan');
// Route::get ('mkuprogram/lihat/{mku_program}', [MkuProgramController ::class, 'lihat'])->name('mkuprogram.lihat');
// Route::get ('mkuprogram/data/{mku_program}/edit', [MkuProgramController ::class, 'edit'])->name('mkuprogram.edit');
// Route::put('mkuprogram/{mku_program}', [MkuProgramController ::class, 'update'])->name('mkuprogram.update');
// Route::delete('mkuprogram/{mku_program}', [MkuProgramController::class,'destroy'])->name('mkuprogram.destroy');

//7 route untuk menu mahasiswa ( lihat data all, singgle) fiks
Route::get ('student/data', [StudentController ::class, 'data'])->name('student.data');
Route::get ('student/{student}', [StudentController ::class, 'lihat'])->name('student.lihat');
Route::get ('student/prodi/{prodi}', [StudentController ::class, 'pilih'])->name('student.pilih');
Route::get('mahasiswa/search', [StudentController::class,'search'])->name('student.search');


Route::get ('data/asisten/mku', [AsistenController ::class, 'datasisten'])->name('asisten.datasisten');
//8. route untuk menu tahun pendaftran(crud ) FIKS


// Route::get ('data/asisten', [AsistenController ::class, 'datasisten'])->name('asisten.datasisten');
// Route::get ('data/asisten/lihat{registration}', [AsistenController ::class, 'lihat'])->name('asisten.lihat');
// Route::get ('data/asisten/mku/{generalsubject}/diterima', [AsistenController ::class, 'pilihasisten'])->name('asisten.pilih');
// Route::get('data/asisten/search', [AsistenController::class,'search'])->name('asisten.search');
//9. route untuk menu tahun berkas(crud )

//10. route untuk menu tahun sisten kelas(crud )
// Route::get ('asisten/data/', [KelasAssistentController ::class, 'data'])->name('asistenn.data');
// Route::get('assiten/{pendaftaran}/pemetaan', [KelasAssistentController ::class, 'pemetaan'])->name('asisten.pemetaan');
// Route::post('assiten/tambahasissten/{pendaftaran}', [KelasAssistentController ::class, 'tambah'])->name('asisten.tambah');
// Route::get('asisten/lihat/{asisten}', [KelasAssistentController ::class, 'lihat'])->name('asistenn.lihat');
// Route::get('asisten/{asisten}/edit', [KelasAssistentController ::class, 'edit'])->name('asisten.edit');
// Route::put('asisten/{asisten}', [KelasAssistentController ::class, 'update'])->name('asisten.update');
// Route::get ('asisten/pilih/{generalsubject}', [KelasAssistentController ::class, 'pilih'])->name('asistenn.pilih');

// Route::get('asisten/export', [KelasAssistentController::class, 'export'])->name('asisten.export');


// LAPORAN
// SERTIFIKAT
Route::get('/sertifikat', function () {
    return view('sertifikat');
});

});

Route::group(['middleware' => ['auth', 'role:koordinator']], function() {
//1. route untuk menu dashboard koordinator
Route::get('/koordinator', [DashboardController ::class, 'dashboardkoordinator'])->name('koordinator');

// 2. menu profil koordinator.
Route::get('/koordinator/profil/data', [KoordinatorController ::class, 'profil'])->name('koordinator.profil');
Route::get ('/koordinator/profil/data/edit', [KoordinatorController ::class, 'editProfil'])->name('koordinator.editProfil');
Route::put ('/koordinator/profil/data/update', [KoordinatorController ::class, 'updateProfil'])->name('koordinator.updateProfil');
Route::get ('/koordinator/profil/password/edit', [KoordinatorController ::class, 'ubahPassword'])->name('koordinator.ubahPassword');
Route::put ('/koordinator/profil/passwors/update', [KoordinatorController ::class, 'updatePassword'])->name('koordinator.updatePassword');

//  3 route untuk menu program mku
Route::get ('mkuprogram/tambah/', [MkuProgramController ::class, 'tambah'])->name('mkuprogram.tambah');
Route::get ('mkuprogram/data/', [MkuProgramController ::class, 'data'])->name('mkuprogram.data'); 
Route::post('mkuprogram/simpan', [MkuProgramController ::class, 'simpan'])->name('mkuprogram.simpan');
// Route::get ('mkuprogram/lihat/{mku_program}', [MkuProgramController ::class, 'lihat'])->name('mkuprogram.lihat');
Route::get ('mkuprogram/data/{mku_program}/edit', [MkuProgramController ::class, 'edit'])->name('mkuprogram.edit');
Route::put('mkuprogram/{mku_program}', [MkuProgramController ::class, 'update'])->name('mkuprogram.update');
Route::delete('mkuprogram/{mku_program}', [MkuProgramController::class,'destroy'])->name('mkuprogram.destroy');
Route::get('mkuprograms/search', [MkuProgramController::class,'search'])->name('mkuprogram.search');

// 4. route untuk menu pendaftaran 
Route::get ('registration/data', [RegistrationController ::class, 'data'])->name('registration.data');
Route::get ('registration/data/belumdiverifikasi', [RegistrationController ::class, 'databelum'])->name('registration.databelum');
Route::get ('registration/data/diterima', [RegistrationController ::class, 'dataterima'])->name('registration.dataterima');
Route::get ('registration/data/ditolak', [RegistrationController ::class, 'datatolak'])->name('registration.datatolak');
Route::get ('registration/{registration}/lihat', [RegistrationController ::class, 'lihat'])->name('registration.lihat');
Route::get ('registration/{registration}/edit', [RegistrationController ::class, 'edit'])->name('registration.edit'); //edit dilakukan oleh koordinator utk verifikasi
Route::put('registration/{registration}', [RegistrationController ::class, 'update'])->name('registration.update');
Route::get ('registration/pilih/{generalsubject}/belumdiverifikasi', [RegistrationController ::class, 'pilih'])->name('registration.pilih');
Route::get ('registration/pilih/{generalsubject}/diterima', [RegistrationController ::class, 'pilihterima'])->name('registration.pilihterima');
Route::get ('registration/pilih/{generalsubject}/ditolak', [RegistrationController ::class, 'pilihtolak'])->name('registration.pilihtolak');
Route::get('pendaftar/search', [RegistrationController::class,'search'])->name('registration.search');
  
Route::get ('data/asisten', [AsistenController ::class, 'data'])->name('asisten.data');
// Route::get ('/koordinator/data/asisten', [AsistenController ::class, 'data'])->name('asisten.data');
// Route::get ('/koordinator/data/asisten/detail{registration}', [AsistenController ::class, 'lihat'])->name('asisten.detail');

});


Route::group(['middleware' => ['auth', 'role:mahasiswa']], function() {
    // notifikasi
    Route::get('/mahasiswa/notifikasi', [MahasiswaController::class, 'notifikasi'])->name('mahasiswa.contact');

    // program
    Route::get('/mahasiswa/program/{mku_program}/detail', [MahasiswaController ::class, 'detail'])->name('mahasiswa.detail');
    Route::get('/mahasiswa/program/{mku_program}/daftar', [MahasiswaController ::class, 'daftar'])->name('mahasiswa.daftar');
    Route::post ('mahasiswa/program/{mku_program}/simpan', [MahasiswaController ::class, 'simpan'])->name('mahasiswa.simpan');

    // profil
    Route::get('/mahasiswa/profil', [MahasiswaController ::class, 'profil'])->name('mahasiswa.profil');
    Route::get ('/mahasiswa/profil/edit', [MahasiswaController ::class, 'edit'])->name('mahasiswa.edit');
    Route::put ('/mahasiswa/profil/update', [MahasiswaController ::class, 'update'])->name('mahasiswa.update');
    Route::get('/mahasiswa/password', [MahasiswaController ::class, 'password'])->name('mahasiswa.password');
    Route::get ('/mahasiswa/profil/edit/password', [MahasiswaController ::class, 'editPassword'])->name('mahasiswa.editPassword');
    Route::put ('/mahasiswa/profil/update/password', [MahasiswaController ::class, 'updatePassword'])->name('mahasiswa.updatePassword');

    // sertifikat
    Route::get('/mahasiswa/profil/sertifikat', [MahasiswaController ::class, 'sertifikat'])->name('mahasiswa.sertifikat');
    Route::get('/mahasiswa/profil/sertifikat/cetak/{id}', [MahasiswaController ::class, 'print'])->name('mahasiswa.print');
    Route::get('/mahasiswa/asdos/sertifikat/cetak/{id}', [MahasiswaController ::class, 'sertifikatAsdos'])->name('asdos.sertifikatAsdos');
    Route::get('/sertifikat', function () {
        return view('sertifikat');
    });

    // sertfikat
    // Route::get('/word', function () {
    //     $templateProcessor = new TemplateProcessor('templates/sertifikat.docx');
    //     $tanggal = \Carbon\Carbon::parse(\Carbon\Carbon::now())->translatedFormat('d F Y');
    
    //     $templateProcessor->setValues([
    //         'nama' => '{{ auth()->user()->name }}',
    //         'no' => '{{ 1245432q }}',
    //         'tanggal'=> $tanggal,
    //     ]);
    
    //     $fileName = '_temp/Sertifikat - '. time() . '.docx';
    //     $templateProcessor->saveAs($fileName);
    
    //     // Make sure you have `dompdf/dompdf` in your composer dependencies.
    //     Settings::setPdfRendererName(Settings::PDF_RENDERER_DOMPDF);
    //     // Any writable directory here. It will be ignored.
    //     Settings::setPdfRendererPath('.');
    
    //     $pdf = 'sertifikat-mahasiswa/Andi - '. time() . '.pdf';
    
    //     $phpWord = IOFactory::load($fileName);
    //     $phpWord->save($pdf, 'PDF');
    
    //     //remove file
    //     unlink($fileName);
    
    //     return response()->download(public_path($pdf));
    // });

    

});

// Route user tanpa login ( home, program, about)
    Route::get('/DataDiri/{user}',[MahasiswaController ::class, 'dataDiri'])->name('mahasiswa.dataDiri');
    Route::post('DataDiri/simpan/{user}', [MahasiswaController ::class, 'simpandataDiri'])->name('mahasiswa.simpandataDiri');

    Route::get('/home',[MahasiswaController ::class, 'home'])->name('mahasiswa');
    Route::get('/mahasiswa/about',function(){return view('mahasiswa.ProfilStudent.about');})->name('mahasiswa.about');
    Route::get ('mahasiswa/program', [MahasiswaController ::class, 'program'])->name('mahasiswa.program');







    // $templateProcessor = new TemplateProcessor('templates/sertifikat.docx');

    // $templateProcessor->setValues([
    //     'nama' => 'abc',
    //     'no' => '1245432q',
    // ]);

    // $fileName = '_temp/Sertifikat - '. time() . '.docx';
    // $templateProcessor->saveAs($fileName);

    // // Make sure you have `dompdf/dompdf` in your composer dependencies.
    // Settings::setPdfRendererName(Settings::PDF_RENDERER_DOMPDF);
    // // Any writable directory here. It will be ignored.
    // Settings::setPdfRendererPath('.');

    // $pdf = 'sertifikat-mahasiswa/Andi - '. time() . '.pdf';

    // $phpWord = IOFactory::load($fileName);
    // $phpWord->save($pdf, 'PDF');

    // //remove file
    // unlink($fileName);

    // return response()->download(public_path($pdf));


// $fileName = '_temp/Sertifikat - '. time() . '.docx';
// //save as word file
// $templateProcessor->saveAs($fileName);

// //download file
// return response()->download(public_path($fileName));