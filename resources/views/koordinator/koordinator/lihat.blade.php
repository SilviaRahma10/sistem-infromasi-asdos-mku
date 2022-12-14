@extends('layouts.mainKoordinator')  
@section('title', 'tambah Koordinator')

@section('content')
<div class="container-fluid">
  <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <a href="{{ route('koordinator.data') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
      class="fas fa-arrow-left fa-sm text-white-50"></i> Kembali</a>
    </div>

    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Koordinator</h6>
      </div>

      <form class="pl-5">
        @csrf
        <br>
        <div class="container-fluid">


            <div class="row">
              <div class="col-md-6">
                <div class="mb-3" class="pl-5">
                  <label for="name" class="form-label">Nama Koordinator</label>
                  <input type="text" name="name" id="name" class="form-control" value="{{ $koordinator->user->name }}">
                </div>
              </div>

              <div class="col-md-6">
                <div class="mb-3" class="pl-5">
                  <label for="nip" class="form-label">Nip Koordinator</label>
                  <input type="text" name="nip" id="nip" class="form-control" value="{{ $koordinator->nip}}">
                </div>
              </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3" class="pl-5">
                      <label for="email" class="form-label">email Koordinator</label>
                      <input type="text" name="email" id="email" class="form-control" value="{{ $koordinator->user->email }}">
                    </div>
                </div>

              <div class="col-md-6">
                <div class="mb-3" class="pl-5">
                  <label for="no_hp" class="form-label">no hp Koordinator</label>
                  <input type="text" name="no_hp" id="no_hp" class="form-control" value="{{ $koordinator->no_hp }}">
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-6">
                <div class="mb-3" class="pl-5">
                  <label for="id_mku" class="form-label">Koordinator Bidang </label>
                  <input type="text" name="id_mku" id="id_mku" class="form-control" value="{{ $koordinator->mku->nama }}">
                </div>
              </div>

              <div class="col-md-6">
                <div class="mb-3" class="pl-5">
                  <label for="kode_mku" class="form-label">Kode Mata Kuliah</label>
                  <input type="text" name="kode_mku" id="kode_mku" class="form-control" value="{{ $koordinator->mku->kode }}">
                </div>
              </div>
            </div>

            {{-- <div class="row">
              <div class="col-md-6">
                <div class="mb-3" class="pl-5">
                  <label for="password" class="form-label">Password Koordinator</label>
                  <input type="text" name="password" id="password" class="form-control" value="{{ $koordinator->user->password }}">
                </div>
              </div>
            </div> --}}
        </div>
        <br><br>
    </form>
  </div>
</div>
  {{-- <a class="pl-5" href="{{ route('.index') }}"><button type="submit" class="btn btn-primary" >Cancle</button></a> --}}
@endsection
          
