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
        <h6 class="m-0 font-weight-bold text-primary">Masukkan Data Prodi</h6>
      </div>

      <form class="pl-5" action="{{ route('prodi.simpan') }}" method="POST">
        @csrf
        <br>
        <div class="container-fluid">

            <div class="mb-3" class="pl-5">
              <label for="id_fakultas" class="form-label">Fakultas</label>
              <br>
              <select id="id_fakultas" name="id_fakultas" class="form-control @error('id_fakultas') is-invalid @enderror" value="{{ old('id_fakultas') }}">
                <option selected disabled>Pilih Fakultas</option>
                  @foreach ($fakultas as $faculty)
                    <option value="{{ $faculty->id }}">{{ $faculty->nama }}</option>
                  @endforeach
              </select>

              @error('id_fakultas')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror

            </div>

            <div class="row">
              <div class="col-md-6">
                <div class="mb-3" class="pl-5">
                  <label for="kode" class="form-label">Kode Program Studi</label>
                  <input type="text" name="kode" id="kode" class="form-control @error('kode') is-invalid @enderror" value="{{ old('kode') }}">

                  @error('kode')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
              </div>

              <div class="col-md-6">
                <div class="mb-3" class="pl-5">
                  <label for="nama" class="form-label">Nama Program Studi</label>
                  <input type="text" name="nama" id="nama" class="form-control @error('nama') is-invalid @enderror" value="{{ old('nama') }}">

                  
                  @error('nama')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
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
          
