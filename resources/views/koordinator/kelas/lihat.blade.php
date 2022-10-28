@extends('layouts.mainKoordinator')
@section('title', 'Lihat Kelas')

@section('content')

  <div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Detail {{ $kelas->class_name}}</h1>
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <a href="{{ route('kelas.data') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
      class="fas fa-arrow-left fa-sm text-white-50"></i> Kembali</a>
    </div>
    <div class="card shadow mb-4">
      <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Data Kelas</h6>
      </div>

      <form class="p-5">
        @csrf
        <div class="container-fluid">
          <fieldset disabled>
            <div class="mb-3" class="pl-5">
                <label for="id_kelas" class="form-label">Id Kelas</label>
                <input type="number" name="id_kelas" id="id_kelas" class="form-control" value="{{ $kelas->id }}" >
            </div>

            <div class="mb-3" class="pl-5">
              <label for="kode_mku" class="form-label">Kode Mku</label>
              <input type="number" name="kode_mku" id="kode_mku" class="form-control" value="{{ $kelas->generalsubject->code }}" >
            </div>

            <div class="mb-3" class="pl-5">
              <label for="mku_name" class="form-label">Nama Mku</label>
              <input type="text" name="mku_name" id="mku_name" class="form-control" value="{{ $kelas->generalsubject->name}}">
            </div>
        
            <div class="mb-3" class="pl-5">
              <label for="kode_prodi" class="form-label">Kode Program Studi</label> 
              <input type="text" name="kode_prodi" id="kode_prodi" class="form-control" value="{{ $kelas->prodi->code }}" >
            </div>

            <div class="mb-3" class="pl-5">
                <label for="prodi_name" class="form-label">Nama Program Studi</label>
                <input type="text" name="prodi_name" id="prodi_name" class="form-control" value="{{ $kelas->prodi->prodi_name }}" >
            </div>

            <div class="mb-3" class="pl-5">
              <label for="dosen_name" class="form-label">Dosen Pengmapu</label>
              <input type="text" name="dosen_name" id="dosen_name" class="form-control" value="{{ $kelas->lecturer->user->name }}">
            </div>
            
          </fieldset>

        </div>
      </form>
    </div> 
  </div> 
@endsection