@extends('layouts.mainKoordinator')
@section('title', 'Tambah Fakultas')

@section('content')
<div class="container-fluid">
  <!-- Page Heading -->
  <h1 class="h3 mb-2 text-gray-800"> Tambah Fakultas</h1>
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
          <div class="container-fluid">
          <div class="mb-3" class="pl-5">
            <label for="nama_fakultas" class="form-label">Nama Fakultas</label>
            <input type="text" name="nama_fakultas" id="nama_fakultas" class="form-control" >
          </div>

          <div class="mb-3" class="pl-5">
            <label for="code" class="form-label">Code</label>
            <input type="text" name="code" id="code" class="form-control" >
          </div>

          <button type="submit" class="btn btn-primary">Simpan</button>
      <br><br>
      </div>
    </form>
    <br>
  {{-- <a class="pl-5" href="{{ route('.index') }}"><button type="submit" class="btn btn-primary" >Cancle</button></a> --}}
  @endsection
          
