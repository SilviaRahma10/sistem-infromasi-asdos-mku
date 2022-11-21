@extends('layouts.mainKoordinator')
@section('title', 'Edit Program')

@section('content')
<div class="container-fluid">
  <!-- Page Heading -->
  <h1 class="h3 mb-2 text-gray-800">Data program</h1>

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <a href="{{ route('program.data') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
      class="fas fa-arrow-left fa-sm text-white-50"></i> Kembali</a>
    </div>

    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Program</h6>
      </div>
      
      <form class="pl-5" action="{{ route('program.update', $program->id) }}" method="POST">
        @csrf
        @method('PUT')


        <div class="container-fluid">
          
            <br>
            {{-- <div class="row">
              <div class="col-6">
                <div class="mb-3" class="pl-5">
                  <label for="id_schoolyear" class="form-label">Tahun Ajaran</label>
                  <input type="text" name="id_schoolyear" id="id_schoolyear" class="form-control" value="{{ $program->tahun_ajaran->tahun }}" readonly>
                </div>
              </div>

              <div class="col-6">
                <div class="mb-3" class="pl-5">
                  <label for="semester" class="form-label">Semester</label>
                    @if ($program->tahun_ajaran->semester == 1)
                      <input type="text" name="id_scsemesterhoolyear" id="semester" class="form-control" value="Ganjil" readonly>
                    @else ($program->tahun_ajaran->semester == 2)
                      <input type="text" name="id_schoolyear" id="id_schoolyear" class="form-control" value="Genap" readonly>
                    @endif
                </div>
              </div>
            </div> --}}

            <div class="mb-3" class="pl-5">
              <label for="id_tahun_ajaran" class="form-label">Tahun Ajaran</label>
              <br>
              <select id="id_tahun_ajaran" name="id_tahun_ajaran" class="form-control @error('id_fakultas') is-invalid @enderror" value="{{ old('id_fakultas') }}">
                <option value="{{ $program->tahun_ajaran->id }}">{{ $program->tahun_ajaran->tahun }} -
                  @if($program->tahun_ajaran->semester==1)
                      ganjil
                  @else
                    genap
                  @endif
                </option>
                    @foreach ($tahun_ajarans as $tahun_ajaran)
                      <option value="{{ $tahun_ajaran->id }}">{{ $tahun_ajaran->tahun }} - 
                        @if($tahun_ajaran->semester==1)
                          ganjil
                        @else
                          genap
                        @endif
                      </option>
                    @endforeach
              </select>

            </div>


            <div class="row">
              <div class="col-6">
                <div class="mb-3" class="pl-5">
                  <label for="tanggal_buka" class="form-label">Periode Awal pendafataran</label>
                  <input type="date" name="tanggal_buka" id="tanggal_buka" class="form-control @error('tanggal_buka') is-invalid @enderror" value="{{ $program->tanggal_buka }}">

                  
                  @error('tanggal_buka')
                      <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
              </div>

              <div class="col-6">
                <div class="mb-3" class="pl-5">
                  <label for="tanggal_tutup" class="form-label">Periode Akhir pendafataran</label>
                  <input type="date" name="tanggal_tutup" id="tanggal_tutup" class="form-control @error('tanggal_tutup') is-invalid @enderror" value="{{  $program->tanggal_tutup }}">

                  @error('tanggal_tutup')
                      <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
              </div>
            </div>
                
  

            <div class="mb-3" class="pl-5">
              <label for="status" class="form-label">Status</label>
              <select name="status" id="status" class="form-control">
                <option value="{{ $program->is_active }}">
                  @if($program->is_active==0)
                      Non-aktif
                  @else($program->is_active==1)
                     Aktif
                   @endif
                </option>
                
                <option value="{{ $program->is_active=0}}">Non-aktif</option>
                <option value="{{ $program->is_active=1}}">aktif</option>
              </select>
            </div>
          </div>

            <div class="card-footer">
              <button type="submit" class="btn btn-primary">Simpan</button>
          </div>

            
             
            
        </form>
      </div>
    </div>
    <br>
  {{-- <a class="pl-5" href="{{ route('.index') }}"><button type="submit" class="btn btn-primary" >Cancle</button></a> --}}
  @endsection
          
