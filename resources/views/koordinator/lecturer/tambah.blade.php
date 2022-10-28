@extends('layouts.mainKoordinator')
@section('title', 'tambah lecturer')
@section('content')

<div class="container-fluid">
  <!-- Page Heading -->
  <h1 class="h3 mb-2 text-gray-800">Tambah Dosen</h1>
  <br>

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <a href="{{ route('lecturer.data') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
      class="fas fa-arrow-left fa-sm text-white-50"></i> Kembali</a>
    </div>

    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Masukkan Data Dosen</h6>
      </div>

      <form class="pl-5" action="{{ route('lecturer.simpan') }}" method="POST">
        @csrf
        <br>
        <div class="container-fluid">

          <div class="mb-3" class="pl-5">
            <label for="prodi" class="form-label">Pogram Studi</label>
            <br>
            <select id="prodi" name="prodi" class="form-select" required>
              <option>Pilih Prodi</option>
              @foreach ($prodis as $prodi)
                <option value="{{ $prodi->id }}">{{ $prodi->prodi_name }}</option>
              @endforeach
            </select>
          </div>
      
          <div class="mb-3" class="pl-5">
            <label for="nip_dosen" class="form-label">Nip Dosen</label>
            <input type="number" name="nip_dosen" id="nip_dosen" class="form-control" >
          </div>

          <div class="mb-3" class="pl-5">
            <label for="nidn_dosen" class="form-label">Nidn Dosen</label>
            <input type="number" name="nidn_dosen" id="nidn_dosen" class="form-control" >
          </div>

          <div class="mb-3" class="pl-5">
            <label for="name_dosen" class="form-label">Nama Dosen</label>
            <input type="text" name="name_dosen" id="name_dosen" class="form-control" value="">
          </div>

          <div class="mb-3" class="pl-5">
            <label for="no_hp" class="form-label">NO HP</label>
            <input type="number" name="no_hp" id="no_hp" class="form-control" >
          </div>

          <div class="row">
            <div class="col-12 col-md-6">
              <div class="mb-3 pl-5">
                <label for="email">Email:</label>
                <input type="email" name="email" id="email" class="form-control">
              </div>
            </div>

            <div class="mb-3" class="pl-5">
              <label for="gender" class="form-label">Jenis Kelamin</label>
                  <br>
              <select id="gender" name="gender" class="form-select">
                <option>Pilih Jenis Kelamin</option>
                <option>laki-laki</option>
                <option>perempuan</option>
              </select>
            </div>
  
            <div class="mb-3" class="pl-5">
              <label for="pendidikan" class="form-label">Pendidikan Terakhir</label>
                  <br>
              <select id="pendidikan" name="pendidikan" class="form-select">
                <option>Pilih Jenjang Pendidikan Terakhir</option>
                <option>S2</option>
                <option>S3</option>
              </select>
            </div>

            <div class="col-12 col-md-6">
              <div class="mb-3 pl-5">
                <label for="password">Password:</label>
                <input type="password" name="password" id="password" class="form-control">
              </div>
            </div>
          </div>
          <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
        <br><br>
    </form>
  </div>
</div>
  {{-- <a class="pl-5" href="{{ route('.index') }}"><button type="submit" class="btn btn-primary" >Cancle</button></a> --}}
@endsection
          
