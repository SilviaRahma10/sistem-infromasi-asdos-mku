@extends('layouts.mainKoordinator')
@section('title', 'Tambah Progam')

@section('content')
<div class="container-fluid">
  <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <a href="{{ route('program.data') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
      class="fas fa-arrow-left fa-sm text-white-50"></i> Kembali</a>
    </div>

    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Masukkan Data Program </h6>
      </div>
      
      <form class="pl-5" action="{{ route('program.simpan') }}" method="POST">
        @csrf
          <br>
           <div class="container-fluid">
              

              <div class="mb-3" class="pl-5">
                <label for="id_tahun_ajaran" class="form-label">Tahun Akademik</label>
                <br>
                <select id="id_tahun_ajaran" name="id_tahun_ajaran" class="form-control @error('id_tahun_ajaran') is-invalid @enderror" value="{{ old('id_tahun_ajaran') }}">
                  <option selected disabled>Pilih Tahun Akademik</option>
                  @foreach ($tahun_ajaran as $tahun)
                    <option value="{{ $tahun->id }}">{{ $tahun->tahun }} -  
                      @if($tahun->semester==1)
                        ganjil
                      @else
                        genap
                      @endif
                      
                    </option>
                  @endforeach
                </select>

                @error('id_tahun_ajaran')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>

              <div class="row">
                <div class="col-6">
                  <div class="mb-3" class="pl-5">
                    <label for="tanggal_buka" class="form-label">Periode Awal pendafataran</label>
                    <input type="date" name="tanggal_buka" id="tanggal_buka" class="form-control @error('tanggal_buka') is-invalid @enderror" value="{{ old('tanggal_buka') }}">

                    
                    @error('tanggal_buka')
                      <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                  </div>
                </div>

                <div class="col-6">
                  <div class="mb-3" class="pl-5">
                    <label for="tanggal_tutup" class="form-label">Periode Akhir pendafataran</label>
                    <input type="date" name="tanggal_tutup" id="tanggal_tutup" class="form-control @error('tanggal_tutup') is-invalid @enderror" value="{{ old('tanggal_tutup') }}">

                    @error('tanggal_tutup')
                      <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                  </div>
                </div>
              </div>

            <br>
          <button type="submit" class="btn btn-primary">Simpan Program</button>
          <br><br>
          </div>
        </form>
    </div>
  </div>
    <br>
  {{-- <a class="pl-5" href="{{ route('.index') }}"><button type="submit" class="btn btn-primary" >Cancle</button></a> --}}
  @endsection
          
