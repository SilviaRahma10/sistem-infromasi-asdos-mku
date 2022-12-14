@extends('layouts.mainKoordinator')
@section('title', 'Konfirmasi Fakultas')

@section('content')
    <div class="container-fluid">
      <h1 class="h3 mb-2 text-gray-800">konfimasi - {{ $fakultas->nama }} </h1>
      <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <a href="{{ route('fakultas.data') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
          class="fas fa-arrow-left fa-sm text-white-50"></i> Kembali</a>
      </div>

      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Masukkan Data Fakultas</h6>
        </div>
  
        <form class="p-5">
            @csrf
            <div class="container-fluid">
            <fieldset disabled>
                <div class="mb-3" class="pl-5">
                    <label for="nama_fakultas" class="form-label">Nama Fakultas</label>
                    <input type="text" name="nama_fakultas" id="nama_fakultas" class="form-control" value="{{ $fakultas->nama }}">
                </div>

                <div class="mb-3" class="pl-5">
                    <label for="code" class="form-label">Code Fakultas</label>
                    <input type="text" name="code" id="code" class="form-control" value="{{ $fakultas->kode }}">
                </div>
            </fieldset>
            </div>
        </form>
    </div>
    </div>    
      
  @endsection