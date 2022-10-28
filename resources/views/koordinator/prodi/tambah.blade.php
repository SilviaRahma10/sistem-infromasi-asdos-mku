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
            <label for="fakultas_id" class="form-label">Fakultas</label>
            <br>
            <select id="fakultas_id" name="fakultas_id" class="form-control" required>
              <option>Pilih Fakultas</option>
              @foreach ($fakultas as $fakulty)
                <option value="{{ $fakulty->id }}">{{ $fakulty->faculty_name }}</option>
              @endforeach
            </select>
          </div>

          <div class="mb-3" class="pl-5">
            <label for="kode_prodi" class="form-label">Kode Program Studi</label>
            <input type="text" name="kode_prodi" id="kode_prodi" class="form-control" >
          </div>

          <div class="mb-3" class="pl-5">
            <label for="nama_prodi" class="form-label">Nama Program Studi</label>
            <input type="text" name="nama_prodi" id="nama_prodi" class="form-control" >
          </div>


          <div class="mb-3" class="pl-5">
            <label for="akreditasi" class="form-label">Akreditasi</label>
            <br>
            <select id="akreditasi" name="akreditasi" class="form-select">
              <option>Pilih Akreditasi</option>
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
              <option>Pilih Jenjang</option>
              <option>S1</option>
              <option>D3</option>
            </select>
          </div>


          <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
        <br><br>
    </form>
  </div>
</div>
  {{-- <a class="pl-5" href="{{ route('.index') }}"><button type="submit" class="btn btn-primary" >Cancle</button></a> --}}
@endsection
          
