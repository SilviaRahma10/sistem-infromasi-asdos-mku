@extends('layouts.mainKoordinator')
@section('title', 'edit lecturer')

@section('content')
<div class="container-fluid">
  <!-- Page Heading -->
  <h1 class="h3 mb-2 text-gray-800">Edit data {{ $lecturer->user->name }}</h1>

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <a href="{{ route('lecturer.data') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
      class="fas fa-arrow-left fa-sm text-white-50"></i> Kembali</a>
    </div>

    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Masukkan Data Dosen</h6>
      </div>

      <form class="pl-5" action="{{ route('lecturer.update', $lecturer->id) }}" method="POST">
        @csrf
        @method('PUT')

        <br>
        <div class="container-fluid">
        
            <div class="container-fluid">
              <div class="mb-3" class="pl-5">
                <label for="prodi" class="form-label">Program Studi</label>
                <br>
                <select id="prodi" name="prodi" class="form-select">
                  <option value="{{ $lecturer->prodi->id }}">{{ $lecturer->prodi->prodi_name }}</option>
                  @foreach ($prodis as $prodi)
                    <option value="{{ $prodi->id }}">{{ $prodi->prodi_name }}</option>
                  @endforeach
                </select>
              </div>

          <div class="mb-3" class="pl-5">
            <label for="name_dosen" class="form-label">Nama Dosen</label>
            <input type="text" name="name_dosen" id="name_dosen" class="form-control" value="{{ $lecturer->user->name }}">
          </div>
            
          <div class="mb-3" class="pl-5">
            <label for="nip_dosen" class="form-label">Nip Dosen</label>
            <input type="number" name="nip_dosen" id="nip_dosen" class="form-control" value="{{ $lecturer->nip }}">
          </div>

          <div class="mb-3" class="pl-5">
            <label for="nidn_dosen" class="form-label">Nidn Dosen</label>
            <input type="number" name="nidn_dosen" id="nidn_dosen" class="form-control" value="{{ $lecturer->nidn }}">
          </div>

          <div class="mb-3" class="pl-5">
            <label for="email" class="form-label">Email Dosen</label>
            <input type="text" name="email" id="email" class="form-control" value="{{ $lecturer->user->email }}">
          </div>

          <div class="mb-3" class="pl-5">
            <label for="no_hp" class="form-label">NO HP</label>
            <input type="number" name="no_hp" id="no_hp" class="form-control" value="{{ $lecturer->no_hp }}">
          </div>

          <div class="mb-3" class="pl-5">
            <label for="gender" class="form-label">Jenis Kelamin</label>
                <br>
            <select id="gender" name="gender" class="form-select">
              <option>laki-laki</option>
              <option>perempuan</option>
            </select>
          </div>

          <div class="mb-3" class="pl-5">
            <label for="pendidikan" class="form-label">Pendidikan Terakhir</label>
                <br>
            <select id="pendidikan" name="pendidikan" class="form-select">
              <option>S2</option>
              <option>S3</option>
            </select>
          </div>

          



          <div class="mb-3" class="pl-5">
            <label for="password" class="form-label">password</label>
            <input type="text" name="password" id="password" class="form-control" value="{{ $lecturer->user->password }}">
          </div>
        

          <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
        <br><br>
    </form>
  </div>
</div>
  {{-- <a class="pl-5" href="{{ route('.index') }}"><button type="submit" class="btn btn-primary" >Cancle</button></a> --}}
@endsection
          
