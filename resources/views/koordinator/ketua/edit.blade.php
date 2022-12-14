@extends('layouts.mainKoordinator')
@section('title', 'data ketua pusat mku')
@section('content')

@section('custom_head')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.13.1/cr-1.6.1/r-2.4.0/sc-2.0.7/sb-1.4.0/datatables.min.css"/>
@endsection

<div class="container-fluid">
  <h1 class="h3 mb-2 text-gray-800">Data ketua Pusat MKU (Mata Kuliah Umum) </h1>

  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <a href="{{ route('Ketuapusat.lihat') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
    class="fas fa-arrow-left fa-sm text-white-50"></i> Kembali</a>
  </div>

<div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Data ketua pusat</h6>
    </div>

    <form class="pl-5" action="{{ route('Ketuapusat.update', $ketuapusat->id) }}" method="POST">
      @csrf
      @method('PUT')
      <br>
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-6">
            <div class="mb-3" class="pl-5">
              <label for="ketua" class="form-label">Nama Ketua</label>
              <input type="text" name="ketua" id="ketua" class="form-control @error('ketua') is-invalid @enderror" value="{{ $ketuapusat->ketua }}" >

              @error('ketua')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
          </div>

          <div class="col-md-6">
            <div class="mb-3" class="pl-5">
              <label for="nip" class="form-label">Nip Ketua Pusat</label>
              <input type="text" name="nip" id="nip" class="form-control @error('nip') is-invalid @enderror" value="{{ $ketuapusat->nip }}">

              @error('nip')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
          </div>
        </div>
    
         <div style="text-align: center; padding-top:20px; padding:bottom :30px">
          <a href="{{route('Ketuapusat.update', $ketuapusat->id )}}"><button type="submit" class="btn btn-danger" style="align-items: center"> 
              Simpan
          </button> </a>
        </div> 
      </div><br><br>
    </form>
  </div><br><br>
  </div>

{{-- <a class="pl-5" href="{{ route('.index') }}"><button type="submit" class="btn btn-primary" >Cancle</button></a> --}}
@endsection
        
