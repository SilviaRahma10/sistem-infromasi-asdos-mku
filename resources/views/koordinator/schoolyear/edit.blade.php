@extends('layouts.mainKoordinator')
@section('title', 'tambah tahun ajaran')

@section('content')
<div class="container-fluid">
  <h1 class="h3 mb-2 text-gray-800">Edit Tahun Akademik {{ $tahun->tahun }}</h1>

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <a href="{{ route('school_year.data') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
        class="fas fa-arrow-left fa-sm text-white-50"></i> Kembali</a>
    </div>
    
  <!-- Page Heading -->
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Edit Data Tahun Akadeik</h6>
      </div>
      
      <form class="pl-5" action="{{ route('school_year.update', $tahun->id ) }}" method="POST">
        @csrf
        @method('PUT')
          <br>
          <div class="container-fluid">

            <div class="row">
              <div class="col-md-6">

                <div class="mb-3" class="pl-5">
                  <label for="tahun" class="form-label">Tahun Akademik</label>
                  <input type="text" name="tahun" id="tahun" class="form-control @error('tahun') is-invalid @enderror" value="{{ $tahun->tahun }}">

                  @error('tahun')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
              </div>

              <div class="col-md-6">

                <div class="mb-3" class="pl-5">
                    <label for="semester" class="form-label">Semester</label>
                    <br>
                    <select id="semester" name="semester" class="form-control @error('semester') is-invalid @enderror">
                      <option value="{{ $tahun->semester }}">
                        @if($tahun->semester==1)
                          Ganjil
                        @else($tahun->semester==2)
                          Genap
                        @endif
                      
                      </option>
                      <option value="{{ 1 }}">Ganjil</option>
                      <option value="{{ 2 }}">Genap</option>
                    </select>

                    @error('semester')
                      <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                  </div>
                </div>
              </div>

  
          <button type="submit" class="btn btn-primary">Simpan</button>
      <br><br>
      </div>
    </form>
    <br>
  {{-- <a class="pl-5" href="{{ route('.index') }}"><button type="submit" class="btn btn-primary" >Cancle</button></a> --}}
  @endsection
          
