@extends('layouts.mainKoordinator')
@section('title', 'edit prodi')
@section('content')

<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Edit data {{ $prodi->prodi_name }}</h1>
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <a href="{{ route('prodi.data') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
      class="fas fa-arrow-left fa-sm text-white-50"></i> Kembali</a>
    </div>
  
    <div class="card shadow mb-4">
  
      <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Edit Data Prodi</h6>
      </div>

    <form class="pl-5" action="{{ route('prodi.update', $prodi->id) }}" method="POST">
        @csrf
        @method('PUT')
        <br>
        <div class="container-fluid">

          <div class="container-fluid">
            <div class="mb-3" class="pl-5">
              <label for="fakultas" class="form-label">Program Studi</label>
              <br>
              <select id="fakultas" name="fakultas" class="form-select">
                <option value="{{ $prodi->fakultas->id }}">{{ $prodi->fakultas->faculty_name }}</option>
                @foreach ($fakultas as $fak)
                  <option value="{{ $fak->id }}">{{ $fak->faculty_name }}</option>
                @endforeach
              </select>
            </div>
            
          <div class="mb-3" class="pl-5">
            <label for="kode_prodi" class="form-label">Kode Program Studi</label>
            <input type="text" name="kode_prodi" id="kode_prodi" class="form-control" value="{{ $prodi->code }}" >
           </div>

            <div class="mb-3" class="pl-5">
                <label for="nama_prodi" class="form-label">Nama Program Studi</label>
                <input type="text" name="nama_prodi" id="nama_prodi" class="form-control" value="{{ $prodi->prodi_name }}" >
            </div>

            <div class="mb-3" class="pl-5">
                <label for="akreditasi" class="form-label">Akreditasi</label>
                <br>
                <select id="akreditasi" name="akreditasi" class="form-select">
                <option>{{ $prodi->accreditation }}</option>
                <option>A</option>
                <option>B</option>
                <option>C</option>
                <option>Unggul</option>
                <option>Baik Sekali</option>
                <option>Baik</option>
                </select>
            </div>

            <div class="mb-3" class="pl-5">
                <label for="jenjang" class="form-label">Jenjang</label>
                <br>
                <select id="jenjang" name="jenjang" class="form-select">
                <option>{{ $prodi->level }}</option>
                <option>S1</option>
                <option>D3</option>
                </select>
            </div>
        <button type="submit" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">Update</button>
      </div>
      </form>
  <br>
  <br>
  {{-- <a href="{{ route('prodi.data'), fak->id }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">Cancle</a> --}}
<br><br>
</div>
</div>
  @endsection 