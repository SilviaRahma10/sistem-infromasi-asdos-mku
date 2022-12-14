@extends('layouts.mainKoordinator')
@section('title', 'Tambah Fakultas')

@section('content')
<div class="container-fluid">
  <!-- Page Heading -->
  
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <a href="{{ route('fakultas.data') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
      class="fas fa-arrow-left fa-sm text-white-50"></i> Kembali</a>
    </div>

    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Masukkan Data Fakultas</h6>
      </div>
      
      <form class="pl-5" action="{{ route('fakultas.simpan') }}" method="POST">
        @csrf
          <br>
          <div class="card-body">

            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="nama" class="form-label">Nama Fakultas</label>
                  <input type="text" name="nama" id="nama" class="form-control @error('nama') is-invalid @enderror" value="{{ old('nama') }}">
                      @error('nama')
                        <div class="invalid-feedback">{{ $message }}</div>
                      @enderror
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group">
                  <label for="kode" class="form-label">Kode</label>
                  <input type="text" name="kode" id="kode" class="form-control @error('kode') is-invalid @enderror" value="{{ old('kode') }}">

                  @error('kode')
                  <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
              </div>
            </div>
            <br><br>
            
            <input type="submit" value="Tambah Fakultas" class="btn btn-primary btn-sm">
          </div>
      <br>
    </form>
 </div>

</div>
  
  {{-- <a class="pl-5" href="{{ route('.index') }}"><button type="submit" class="btn btn-primary" >Cancle</button></a> --}}
  @endsection
          
