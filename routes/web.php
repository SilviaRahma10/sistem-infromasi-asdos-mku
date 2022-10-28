<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaController;
use App\Http\Controllers\MkuController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\ProdiController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\FakultasController;
use App\Http\Controllers\LecturerController;
use App\Http\Controllers\ProdiKelasController;
use App\Http\Controllers\SchoolYearController;
use App\Http\Controllers\CoordinatorController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\GeneralSubjectController;
use App\Http\Controllers\KelasAssistentController;
use App\Http\Controllers\KoordinatorMkuController;
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

Route::group(['middleware' => ['auth', 'role:admin']], function() {
// route untuk halaman beranda admin
Route::get('/admin',function(){
        return view('admin');
    })->name('admin');

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

// route untuk menu data mahasiswa
// Route::get ('student/DataProdi', [StudentController ::class, 'DataProdi'])->name('student.DataProdi');
// Route::get ('student/data/{student}', [StudentController ::class, 'data'])->name('student.data');
// Route::get ('student/{student}', [StudentController ::class, 'lihat'])->name('student.lihat');


});


Route::group(['middleware' => ['auth', 'role:koordinator']], function() {
//    route untuk halaman utama koordinator
    Route::get('/koordinator',function(){
        return view('admin');
    })->name('koordinator');

// profil koordonator login
Route::get ('profil/data', function(){
    return view('koordinator.profil.data');
})->name('profil.data');


//1. route untuk menu fakultas (crud)
Route::get ('fakultas/tambah', [FakultasController ::class, 'tambah'])->name('fakultas.tambah');
Route::post ('fakultas/simpan', [FakultasController ::class, 'simpan'])->name('fakultas.simpan');
Route::get ('fakultas/data', [FakultasController ::class, 'DataFakultas'])->name('fakultas.data');
Route::get ('fakultas/data/{fakultas}', [FakultasController ::class, 'lihat'])->name('fakultas.lihat');
Route::get ('fakultas/{fakultas}', [FakultasController ::class, 'konfirmasi'])->name('fakultas.konfirmasi');
Route::get ('fakultas/{fakultas}/edit', [FakultasController ::class, 'edit'])->name('fakultas.edit');
Route::put('fakultas/{fakultas}', [FakultasController ::class, 'update'])->name('fakultas.update');
Route::delete('fakultas/{fakultas}', [FakultasController::class,'destroy'])->name('fakultas.destroy');

// Route::get ('fakultas/prodi/{fakultas}', [FakultasController ::class, 'DataProdi'])->name('prodi.data');

//2.1  route untuk menu data prodi -> prodi (crud)
Route::get ('prodi/data', [ProdiController ::class, 'data'])->name('prodi.data');
Route::get ('prodi/tambah', [ProdiController ::class, 'tambah'])->name('prodi.tambah');
Route::post ('prodi/simpan', [ProdiController ::class, 'simpan'])->name('prodi.simpan');
Route::get ('prodi/lihat/{prodi}', [ProdiController ::class, 'lihat'])->name('prodi.lihat');
Route::get ('prodi/{prodi}', [ProdiController ::class, 'konfirmasi'])->name('prodi.konfirmasi');
Route::get ('prodi/{prodi}/edit', [ProdiController ::class, 'edit'])->name('prodi.edit');
Route::put('prodi/{prodi}', [ProdiController ::class, 'update'])->name('prodi.update');
Route::delete('prodi/{prodi}', [ProdiController::class,'destroy'])->name('prodi.destroy');
Route::get('prodi/pilih/{fakultas}', [ProdiController ::class, 'pilih'])->name('prodi.pilih');



//2.2. route untuk prodi kelas
Route::get ('prodi/kelas/tambah/{prodi}', [ProdiKelasController ::class, 'tambah'])->name('prodikelas.tambah');
Route::post ('prodi/simpan{prodi}/', [ProdiKelasController ::class, 'simpan'])->name('prodikelas.simpan');

//2.2 route untuk menu data prodi -> dosen ( crud)
// Route::get ('Kategori/', [LecturerController ::class, 'kategori'])->name('lecturer.kategory');
Route::get ('lecturer/tambah', [LecturerController ::class, 'tambah'])->name('lecturer.tambah');
Route::post ('lecturer/simpan', [LecturerController ::class, 'simpan'])->name('lecturer.simpan');
Route::get ('lecturer/data', [LecturerController ::class, 'data'])->name('lecturer.data');
Route::get ('lecturer/{lecturer}', [LecturerController ::class, 'lihat'])->name('lecturer.lihat');
Route::get ('lecturer/{lecturer}/edit', [LecturerController ::class, 'edit'])->name('lecturer.edit');
Route::put('lecturer/{lecturer}', [LecturerController ::class, 'update'])->name('lecturer.update');
Route::delete('lecturer/{lecturer}', [LecturerController::class,'destroy'])->name('lecturer.destroy');
Route::get('lecturer/prodi/{prodi}', [LecturerController ::class, 'pilih'])->name('lecturer.pilih');

//3. route untuk menu mku (crud )
Route::get ('generalsubject/tambah', [GeneralSubjectController ::class, 'tambah'])->name('generalsubject.tambah');
Route::post ('generalsubject/simpan', [GeneralSubjectController ::class, 'simpan'])->name('generalsubject.simpan');
Route::get ('generalsubject/data', [GeneralSubjectController ::class, 'data'])->name('generalsubject.data');
Route::get ('generalsubject/{generalsubject}', [GeneralSubjectController ::class, 'lihat'])->name('generalsubject.lihat');
Route::get ('generalsubject/{generalsubject}/edit', [GeneralSubjectController ::class, 'edit'])->name('generalsubject.edit');
Route::put('generalsubject/{generalsubject}', [GeneralSubjectController ::class, 'update'])->name('generalsubject.update');
Route::delete('generalsubject/{generalsubject}', [GeneralSubjectController::class,'destroy'])->name('generalsubject.destroy');


//Route Program
Route::get ('program/tambah', [ProgramController ::class, 'tambah'])->name('program.tambah');
Route::post ('program/simpan', [ProgramController ::class, 'simpan'])->name('program.simpan');
Route::get ('program/data', [ProgramController ::class, 'data'])->name('program.data');
Route::get ('program/{program}', [ProgramController ::class, 'lihat'])->name('program.lihat');
Route::get ('program/{program}/edit', [ProgramController ::class, 'edit'])->name('program.edit');
Route::put('program/{program}', [ProgramController ::class, 'update'])->name('program.update');
Route::delete('program/{program}', [ProgramController::class,'destroy'])->name('program.destroy');


//5. route untuk menu kelas(crud )
Route::get ('kelas/data', [KelasController ::class, 'data'])->name('kelas.data');
Route::get ('kelas/{kelas}', [KelasController ::class, 'lihat'])->name('kelas.lihat');
Route::get ('kelas/prodi/{prodi}', [KelasController ::class, 'pilih'])->name('kelas.pilih');

//6. route untuk menu tahun akademik(crud )
Route::get ('schoolyear/tambah', [SchoolYearController ::class, 'tambah'])->name('school_year.tambah');
Route::post ('schoolyear/simpan', [SchoolYearController ::class, 'simpan'])->name('school_year.simpan');
Route::get ('schoolyear/data', [SchoolYearController ::class, 'data'])->name('school_year.data');
Route::get ('schoolyear/data/{schoolyear}', [SchoolYearController ::class, 'lihat'])->name('school_year.lihat');
Route::get ('schoolyear/{schoolyear}', [SchoolYearController ::class, 'konfirmasi'])->name('school_year.konfirmasi');
Route::get ('schoolyear/{schoolyear}/edit', [SchoolYearController ::class, 'edit'])->name('school_year.edit');
Route::put('schoolyear/{schoolyear}', [SchoolYearController ::class, 'update'])->name('school_year.update');
Route::delete('schoolyear/{schoolyear}', [SchoolYearController::class,'destroy'])->name('school_year.destroy');

//7 route untuk menu mahasiswa ( lihat data all, singgle)
// Route::get ('student/DataProdi/', [StudentController ::class, 'DataProdi'])->name('student.DataProdi');
Route::get ('student/data', [StudentController ::class, 'data'])->name('student.data');
Route::get ('student/{student}', [StudentController ::class, 'lihat'])->name('student.lihat');
Route::get ('student/prodi/{prodi}', [StudentController ::class, 'pilih'])->name('student.pilih');
// Route::delete('student/{student}', [StudentController::class,'destroy'])->name('student.destroy');

//8. route untuk menu tahun pendaftran(crud )
Route::get ('registration/data/', [RegistrationController ::class, 'data'])->name('registration.data');
Route::get ('registration/{registration}/edit', [RegistrationController ::class, 'edit'])->name('registration.edit');
Route::put('registration/{registration}', [RegistrationController ::class, 'update'])->name('registration.update');


//9. route untuk menu tahun berkas(crud )

//10. route untuk menu tahun sisten kelas(crud )
Route::get ('asisten/data/', [KelasAssistentController ::class, 'data'])->name('asisten.data');
Route::get('assiten/{registration}/pemetaan', [KelasAssistentController ::class, 'pemetaan'])->name('asisten.pemetaan');
Route::post('assiten/tambahasissten/{registration}', [KelasAssistentController ::class, 'tambah'])->name('asisten.tambah');
Route::get('asisten/{asisten}', [KelasAssistentController ::class, 'konfirmasi'])->name('asisten.konfirmasi');
});

Route::group(['middleware' => ['auth', 'role:mahasiswa']], function() {
// route untuk menu  mahasiswa (register + tambah data diri + simpan data diri + lihat data diri + edit data diri+
Route::get ('user_student/daftarstudent', [UserController ::class, 'daftarstudent'])->name('user_student.daftarstudent');
Route::post ('user_student/simpanstudent', [UserController ::class, 'simpanstudent'])->name('user_student.simpanstudent');
Route::get ('student/tambah', [StudentController ::class, 'tambah'])->name('student.tambah');
Route::post ('student/simpan', [StudentController ::class, 'simpan'])->name('student.simpan');
// Route::get ('student/{student}', [StudentController ::class, 'lihat'])->name('student.lihat');
Route::get ('student/{student}/edit', [StudentController ::class, 'edit'])->name('student.edit');
Route::put('student/{student}', [StudentController ::class, 'update'])->name('student.update');

});

Route::group(['middleware' => ['auth', 'role:dosen']], function() {
    Route::get('/dosen', function() {

    });
});

Route::get('/sert', function () {
    return view('sertifikat');
});