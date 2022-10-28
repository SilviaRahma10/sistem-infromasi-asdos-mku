@extends('layouts.mainKoordinator')  
@section('title', 'tambah Prodi')

@section('content')
<div class="container-fluid">
  <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <a href="{{ route('prodi.data') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
      class="fas fa-arrow-left fa-sm text-white-50"></i> Kembali</a>
    </div>

    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Masukkan kelas Prodi</h6>
      </div>

      <form class="pl-5" action="{{ route('prodikelas.simpan', $prodi->id) }}" method="POST">
        @csrf
        <br>
        <div class="container-fluid">

          <div class="mb-3" class="pl-5">
            <label for="prodi_id" class="form-label">Prodi</label>
            <input type="text" name="prodi_id" id="prodi_id" class="form-control" value="{{ $prodi->name }}" placeholder="{{ $prodi->name }}"readonly>
          </div>

          <div class="mb-3" class="pl-5">
            <label for="nama_kelas" class="form-label">Nama Kelas</label>
            <input type="text" name="nama_kelas" id="nama_kelas" class="form-control" >
          </div>

          <div class="mb-3" class="pl-5">
            <label for="jumlah_mahasiswa " class="form-label">Jumlah Mahasiswa</label>
            <input type="number" name="jumlah_mahasiswa" id="jumlah_mahasiswa" class="form-control" >
          </div>

          <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
        <br><br>
    </form>
  </div>
</div>
  {{-- <a class="pl-5" href="{{ route('.index') }}"><button type="submit" class="btn btn-primary" >Cancle</button></a> --}}
@endsection
          
