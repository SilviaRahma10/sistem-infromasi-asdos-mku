@extends('layouts.mainKoordinator')
@section('title', 'tambah tahun ajaran')

@section('content')
<div class="container-fluid">
  <h1 class="h3 mb-2 text-gray-800">Edit Tahun Akademik {{ $schoolyear->school_year }}</h1>

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <a href="{{ route('school_year.data') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
        class="fas fa-arrow-left fa-sm text-white-50"></i> Kembali</a>
    </div>
    
  <!-- Page Heading -->
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Masukkan Data Tahun Akademik</h6>
      </div>
      
      <form class="pl-5" action="{{ route('school_year.update', $schoolyear->id ) }}" method="POST">
        @csrf
        @method('PUT')
          <br>
          <div class="container-fluid">

            <div class="mb-3" class="pl-5">
              <label for="school_year" class="form-label">Tahun Ajaran</label>
              <input type="text" name="school_year" id="school_year" class="form-control" value="{{ $schoolyear->school_year }}">
            </div>

            <div class="mb-3" class="pl-5">
                <label for="semester" class="form-label">Semester</label>
                <br>
                <select id="semester" name="semester" class="form-select">
                  <option >{{  $schoolyear->semester }}</option>
                  <option >Ganjil</option>
                  <option >Genap</option>
                </select>
              </div>

  
          <button type="submit" class="btn btn-primary">Simpan</button>
      <br><br>
      </div>
    </form>
    <br>
  {{-- <a class="pl-5" href="{{ route('.index') }}"><button type="submit" class="btn btn-primary" >Cancle</button></a> --}}
  @endsection
          
