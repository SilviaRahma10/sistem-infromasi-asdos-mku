@extends('layouts.mainKoordinator')
@section('title', 'Edit Fakultas')

@section('content')
<div class="container-fluid">
  <!-- Page Heading -->
  <h1 class="h3 mb-2 text-gray-800">Edit data - {{ $fakultas->nama}}</h1>
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <a href="{{ route('fakultas.data') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
      class="fas fa-arrow-left fa-sm text-white-50"></i> Kembali</a>
    </div>

    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Edit Data Fakultas</h6>
      </div>

      <form class="pl-5" action="{{ route('fakultas.update', $fakultas->id) }}" method="POST">
        @csrf
        @method('PUT')
        <br>
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-6">
            
                <div class="mb-3" class="pl-5">
                  <label for="nama" class="form-label">Nama Fakultas</label>
                  <input type="text" name="nama" id="nama" class="form-control @error('nama') is-invalid @enderror" value="{{ $fakultas->nama }}" >
                    @error('nama')
                      <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-md-6">
              <div class="mb-3" class="pl-5">
                <label for="kode" class="form-label">Kode Fakultas</label>
                <input type="text" name="kode" id="kode" class="form-control @error('kode') is-invalid @enderror" value="{{ $fakultas->kode }}">
                  @error('kode')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
              </div>
            </div>
          </div><br><br>
          <button type="submit" class="btn btn-primary">Update</button>
      <br><br>
      </div>
    </form>
    <br>
  {{-- <a class="pl-5" href="{{ route('.index') }}"><button type="submit" class="btn btn-primary" >Cancle</button></a> --}}
  @endsection
          
