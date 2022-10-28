@extends('layouts.mainKoordinator')
@section('title', 'konfrimasi tahun ajaran')

@section('content')
<div class="container-fluid">
  <!-- Page Heading -->
  <h1 class="h3 mb-2 text-gray-800">Konfirmasi Tahun Akademik {{ $schoolyear->school_year }}</h1>
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
            <div class="mb-3" class="pl-5">
              <label for="school_year" class="form-label">Tahun Ajaran</label>
              <input type="text" name="school_year" id="school_year" class="form-control" value="{{ $schoolyear->school_year }}" >
            </div>

            <div class="mb-3" class="pl-5">
                <label for="semester" class="form-label">Semester</label>
                <input type="text" name="semester" id="semester" class="form-control" value="{{ $schoolyear->semester }}" >
              </div>

              <div class="mb-3" class="pl-5">
                <label for="is_active" class="form-label">Status</label>
                @if($schoolyear->is_active==0)
                <input type="text" name="is_active" id="is_active" class="form-control" value="non-aktif">
                @else($schoolyear->is_active==1)
                <input type="text" name="is_active" id="is_active" class="form-control" value="aktif" >
                @endif
              </div>
            </fieldset>
      <br><br>
      </div>
    </form>
    <br>
  {{-- <a class="pl-5" href="{{ route('.index') }}"><button type="submit" class="btn btn-primary" >Cancle</button></a> --}}
  @endsection
          
