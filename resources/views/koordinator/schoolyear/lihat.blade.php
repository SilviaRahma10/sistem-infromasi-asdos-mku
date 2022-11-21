@extends('layouts.mainKoordinator')
@section('title', 'lihat tahun ajaran')

@section('content')
<div class="container-fluid">
  <!-- Page Heading -->
  <h1 class="h3 mb-2 text-gray-800">Lihat Tahun Akademik {{ $tahun->tahun }}</h1>

  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <a href="{{ route('school_year.data') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
    class="fas fa-arrow-left fa-sm text-white-50"></i> Kembali</a>
    </div>

    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Tahun Akademik</h6>
      </div>
      
      <form class="pl-5">
        @csrf
          <br>
          <div class="container-fluid">
            <fieldset disabled>

              <div class="row">
                <div class="col-md-6">
            
                  <div class="mb-3" class="pl-5">
                    <label for="school_year" class="form-label">Tahun Ajaran</label>
                    <input type="text" name="school_year" id="school_year" class="form-control" value="{{ $tahun->tahun }}" >
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="mb-3" class="pl-5">
                    <label for="semester" class="form-label">Semester</label>
                      @if($tahun->semester==1)
                        <input type="text" name="semester" id="semester" class="form-control" value="ganjil" >
                      @else($tahun->semester==2)
                        <input type="text" name="semester" id="semester" class="form-control" value="genap" >
                      @endif
                      
                  </div>
                </div>
            </div>
             
            </fieldset>
      <br><br>
      </div>
    </form>
    <br>
  {{-- <a class="pl-5" href="{{ route('.index') }}"><button type="submit" class="btn btn-primary" >Cancle</button></a> --}}
  @endsection
          
