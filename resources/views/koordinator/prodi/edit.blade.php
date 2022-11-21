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
              <label for="id_fakultas" class="form-label">Program Studi</label>
              <br>
              <select id="id_fakultas" name="id_fakultas" class="form-control">
                <option value="{{ $prodi->fakultas->id }}">{{ $prodi->fakultas->nama }}</option>
                    @foreach ($fakultas as $fak)
                      <option value="{{ $fak->id }}">{{ $fak->nama }}</option>
                    @endforeach
              </select>

            </div>

            <div class="row">
              <div class="col-md-6">
                <div class="mb-3" class="pl-5">
                  <label for="kode" class="form-label">Kode Program Studi</label>
                  <input type="text" name="kode" id="kode" class="form-control @error('kode') is-invalid @enderror"  
                  value="{{ $prodi->kode }}" >

                  @error('kode')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                 </div>
              </div>

              <div class="col-md-6">
                <div class="mb-3" class="pl-5">
                  <label for="nama" class="form-label">Nama Program Studi</label>
                  <input type="text" name="nama" id="nama" class="form-control @error('nama') is-invalid @enderror" value="{{ $prodi->nama }}" >

                  @error('nama')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
              </div>
              </div>
            </div><br>

           
        <button type="submit" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">Update</button>
      </div>
      </form>
  
  {{-- <a href="{{ route('prodi.data'), fak->id }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">Cancle</a> --}}
<br><br>
</div>
</div>
  @endsection 