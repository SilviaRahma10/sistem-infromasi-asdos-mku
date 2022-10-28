

@extends('layouts.mainKoordinator')
@section('title', 'konfirmasi data pemetaan asdos')

@section('content')
<div class="container-fluid">
  <!-- Page Heading -->

  <h1 class="h3 mb-2 text-gray-800">Konfirmasi Data Pemetaan Asisten MKU</h1>
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <a href="{{ route('registration.data') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
    class="fas fa-arrow-left fa-sm text-white-50"></i> Kembali</a>
  </div>


    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Calon asisten kelas</h6>
      </div>

      <form class="pl-5">
        @csrf
        <br>

        <div class="container-fluid">
            <div class="mb-3" class="pl-5">
              <label for="id_asisten" class="form-label">Id Asisten</label>
              <input type="text" name="id_asisten" id="id_asisten" class="form-control" value="{{ $asiten->id }}" >
            </div>

            {{-- <div class="mb-3" class="pl-5">
              <label for="student_name" class="form-label">Nama Mahasiswa</label>
              <input type="text" name="student_name" id="student_name" class="form-control" value="{{ $asiten->student->user->name }}" readonly>
            </div>

            <div class="mb-3" class="pl-5">
              <label for="student_npm" class="form-label">NPM Mahasiswa</label>
              <input type="text" name="student_npm" id="student_npm" class="form-control" value="{{ $asiten->student->npm }}" readonly>
            </div>

            <div class="mb-3" class="pl-5">
              <label for="email" class="form-label">Email Mahasiswa</label>
              <input type="text" name="email" id="email" class="form-control" value="{{ $asiten->student->user->email }}" readonly>
            </div>

            <div class="mb-3" class="pl-5">
              <label for="school_year" class="form-label">Tahun Ajaran</label>
              <input type="text" name="school_year" id="school_year" class="form-control" value="{{ $asiten->schoolyear->school_year }}" readonly>
            </div>

            <div class="mb-3" class="pl-5">
              <label for="semester" class="form-label">Semester</label></label>
              <input type="text" name="semester" id="semester" class="form-control" value="{{ $asiten->schoolyear->semester }}" readonly>
            </div>

            <div class="mb-3" class="pl-5">
                <label for="generalsubject_name" class="form-label">MKU</label></label>
                <input type="text" name="generalsubject_name" id="generalsubject_name" class="form-control" value="{{ $asiten->generalsubject->name }}" readonly>
              </div>

              <div class="mb-3" class="pl-5">
                <label for="generalsubject_code" class="form-label">Code Mku</label></label>
                <input type="text" name="generalsubject_code" id="generalsubject_code" class="form-control" value="{{ $asiten->generalsubject->code }}" readonly>
              </div>

              <div class="mb-3" class="pl-5">
                <label for="kelas_prodi" class="form-label">Prodi</label></label>
                <input type="text" name="kelas_prodi" id="kelas_prodi" class="form-control" value="{{ $asiten->kelas->prodi->prodi_name }}" readonly>
              </div>

              <div class="mb-3" class="pl-5">
                <label for="kelas_dospem" class="form-label">Jenjang</label></label>
                <input type="text" name="kelas_dospem" id="kelas_dospem" class="form-control" value="{{ $asiten->kelas->lecturer->user->name }}" readonly>
              </div> --}}
        </div>
        
        <br><br>
      </form>
      
    </div> 
  </div> 
@endsection 

  