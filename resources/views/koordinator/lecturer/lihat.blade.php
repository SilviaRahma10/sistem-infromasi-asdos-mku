@extends('layouts.mainKoordinator')
@section('title', 'data lecturer')

@section('content')
<div class="container-fluid">
  <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <a href="{{ route('lecturer.data') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
      class="fas fa-arrow-left fa-sm text-white-50"></i> Kembali</a>
    </div>

    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Detail Data Dosen</h6>
      </div>

      <form class="pl-5">
        @csrf
        <br>

        <div class="container-fluid">
         
            <div class="mb-3" class="pl-5">
              <label for="name_dosen" class="form-label">Nama Dosen</label>
              <input type="text" name="name_dosen" id="name_dosen" class="form-control" value="{{ $lecturer->user->name }}" readonly>
            </div>

            <div class="mb-3" class="pl-5">
                <label for="prodi" class="form-label">Nama Program Studi</label> 
                <input type="text" name="prodi" id="prodi" class="form-control" value="{{ $lecturer->prodi->prodi_name }}" readonly>
            </div>



          <div class="mb-3" class="pl-5">
            <label for="nip_dosen" class="form-label">Nip Dosen</label>
            <input type="number" name="nip_dosen" id="nip_dosen" class="form-control" value="{{ $lecturer->nip }}" readonly>
          </div>

          <div class="mb-3" class="pl-5">
            <label for="nidn_dosen" class="form-label">Nidn Dosen</label>
            <input type="number" name="nidn_dosen" id="nidn_dosen" class="form-control" value="{{ $lecturer->nidn }}" readonly>
          </div>
          
          <div class="mb-3" class="pl-5">
            <label for="email_dosen" class="form-label">Email Dosen</label>
            <input type="text" name="email_dosen" id="email_dosen" class="form-control" value="{{ $lecturer->user->email }}" readonly>
          </div>

          <div class="mb-3" class="pl-5">
            <label for="no_hp" class="form-label">NO HP</label>
            <input type="number" name="no_hp" id="no_hp" class="form-control" value="{{ $lecturer->no_hp }}" readonly>
          </div>

          <div class="mb-3" class="pl-5">
            <label for="gender" class="form-label">Jenis Kelamin</label>
            <input type="text" name="gender" id="gender" class="form-control" value="{{ $lecturer->gender }}" readonly>
          </div>

          <div class="mb-3" class="pl-5">
            <label for="pendidikan" class="form-label">Pendidikan Terakhir</label>
            <input type="text" name="pendidikan" id="pendidikan" class="form-control" value="{{ $lecturer->highest_education }}" readonly>
          </div>

          <div class="mb-3" class="pl-5">
            <label for="password" class="form-label">password</label>
            <input type="text" name="password" id="password" class="form-control" value="{{ $lecturer->user->password }}" readonly>
          </div>
        
        </div>
        <br><br>
    </form>
  </div>
</div>
  {{-- <a class="pl-5" href="{{ route('.index') }}"><button type="submit" class="btn btn-primary" >Cancle</button></a> --}}
@endsection
          
