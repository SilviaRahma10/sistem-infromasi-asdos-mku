@extends('layouts.mainKoordinator')
@section('title', 'data pendaftar')

@section('content')

  <div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Detail {{ $registration->student->name }}</h1>
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <a href="{{ route('registration.data') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
      class="fas fa-arrow-left fa-sm text-white-50"></i> Kembali</a>
    </div>
    <div class="card shadow mb-4">
      <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Data pendaftar mku {{  $registration->generalsubject->code }}</h6>
      </div>
      
        <form class="pl-5" action="{{ route('registration.update', $registration->id) }}" method="POST">
          @csrf
          @method('PUT')
          <br>
        
        <div class="container-fluid">
          
            <div class="mb-3" class="pl-5">
              <label for="id_registration" class="form-label">Id Pendaftaran</label>
              <input type="id" name="id_registration" id="id_registration" class="form-control" value="{{ $registration->id }}" readonly>
            </div>

            <div class="mb-3" class="pl-5">
              <label for="student_name" class="form-label">Nama Mahasiswa</label>
              <input type="text" name="student_name" id="student_name" class="form-control" value="{{ $registration->student->user->name }}" readonly>
            </div>

            <div class="mb-3" class="pl-5">
              <label for="student_npm" class="form-label">NPM Mahasiswa</label>
              <input type="text" name="student_npm" id="student_npm" class="form-control" value="{{ $registration->student->npm }}" readonly>
            </div>

            <div class="mb-3" class="pl-5">
              <label for="school_year" class="form-label">Tahun Ajaran</label>
              <input type="text" name="school_year" id="school_year" class="form-control" value="{{ $registration->schoolyear->school_year }}" readonly>
            </div>

            <div class="mb-3" class="pl-5">
              <label for="semester" class="form-label">Semester</label></label>
              <input type="text" name="semester" id="semester" class="form-control" value="{{ $registration->schoolyear->semester }}" readonly>
            </div>

            <div class="mb-3" class="pl-5">
                <label for="generalsubject_name" class="form-label">MKU</label></label>
                <input type="text" name="generalsubject_name" id="generalsubject_name" class="form-control" value="{{ $registration->generalsubject->name }}" readonly>
            </div>

              <div class="mb-3" class="pl-5">
                <label for="generalsubject_code" class="form-label">Code MKU</label></label>
                <input type="text" name="generalsubject_code" id="generalsubject_code" class="form-control" value="{{ $registration->generalsubject->code }}" readonly>
              </div>

              <div class="mb-3" class="pl-5">
                <label for="documentregistration_krs" class="form-label">KRS</label></label>
                <input type="text" name="documentregistration_krs" id="documentregistration_krs" class="form-control" value="{{ $registration->documentregistration->krs}}" readonly>
              </div>

              <div class="mb-3" class="pl-5">
                <label for="documentregistration_khs" class="form-label">KHS</label></label>
                <input type="text" name="documentregistration_khs" id="documentregistration_khs" class="form-control" value="{{ $registration->documentregistration->khs}}" readonly>
              </div>

              <div class="mb-3" class="pl-5">
                <label for="documentregistration_suratrekomen" class="form-label">Surat Rekomendasi</label></label>
                <input type="text" name="documentregistration_suratrekomen" id="documentregistration_suratrekomen" class="form-control" value="{{ $registration->documentregistration->surat_rekomendasi}}" readonly>
              </div>
         
              

          <div class="mb-3" class="pl-5">
            <label for="status" class="form-label">Status</label>
            <select id="status" name="status" class="form-select">
              <option>{{ $registration->status }}</option>
              <option>diterima</option>
              <option>ditolak</option>
            </select>
          </div>

        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
      </form>
    </div> 
  </div> 
@endsection