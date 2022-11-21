@extends('layouts.mainKoordinator')
@section('title', 'lihat detail')

@section('content')
<div class="container-fluid">
  <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <a href="{{ route('student.data') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
      class="fas fa-arrow-left fa-sm text-white-50"></i> Kembali</a>
    </div>

    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data</h6>
      </div>
      

      <form class="pl-5">
        @csrf
        <br>

        <div class="container-fluid">
          <fieldset disabled>

            <div class="mb-3" class="pl-5">
              <label for="id" class="form-label">Id</label> 
              <input type="number" name="id" id="id" class="form-control" value="{{ $student->id }}">
            </div> 

            <div class="row">
              <div class="col-md-6">
                <div class="mb-3" class="pl-5">
                  <label for="user_id" class="form-label">Nama</label>
                  <input type="text" name="user_id" id="user_id" class="form-control" value="{{ $student->user->name }}">
                </div>
              </div>

              <div class="col-md-6">
                <div class="mb-3" class="pl-5">
                  <label for="npm" class="form-label">NPM</label>
                  <input type="text" name="npm" id="npm" class="form-control" value="{{ $student->npm }}">
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-6">
                <div class="mb-3" class="pl-5">
                  <label for="prodi_id" class="form-label">Program Studi </label>
                  <input type="text" name="prodi_id" id="prodi_id" class="form-control" value="{{ $student->prodi->nama}}">
                </div>
              </div>

              <div class="col-md-6">
                <div class="mb-3" class="pl-5">
                  <label for="angkatan" class="form-label">Angkatan</label>
                  <input type="number" name="angkatan" id="angkatan" class="form-control" value="{{ $student->angkatan }}">
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-6">
                <div class="mb-3" class="pl-5">
                  <label for="email" class="form-label">Email</label>
                  <input type="text" name="email" id="email" class="form-control" value="{{ $student->user->email }}">
                </div>
              </div>

              <div class="col-md-6">
                <div class="mb-3" class="pl-5">
                  <label for="no_hp" class="form-label">NO HP</label>
                  <input type="number" name="no_hp" id="no_hp" class="form-control" value="{{ $student->no_hp }}">
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-6">
                <div class="mb-3" class="pl-5">
                  <label for="address" class="form-label">Alamat</label>
                  <input type="text" name="address" id="address" class="form-control" value="{{ $student->address }}">
                </div>
              </div>

              <div class="col-md-6">
                <div class="mb-3" class="pl-5">
                  <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                  <input type="text" name="jenis_kelamin" id="jenis_kelamin" class="form-control" value="{{ $student->gender }}">
                </div>
              </div>
            </div>

          
        </fieldset>
        </div>
        <br><br>
    </form>
  </div>
</div>
  {{-- <a class="pl-5" href="{{ route('.index') }}"><button type="submit" class="btn btn-primary" >Cancle</button></a> --}}
@endsection
          
