

@extends('layouts.mainKoordinator')
@section('title', 'detail data pemetaan asdos')

@section('content')
<div class="container-fluid">
  <!-- Page Heading -->

  <h1 class="h3 mb-2 text-gray-800">Konfirmasi Data Pemetaan Asisten MKU</h1>
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <a href="{{ route('registration.data') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
    class="fas fa-arrow-left fa-sm text-white-50"></i> Kembali</a>
  </div>


    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Calon asisten kelas</h6>
      </div>

      <form class="pl-5">
        @csrf
        <br>

        <div class="container-fluid">


          <div class="row">
            <div class="col-md-6">
                <div class="mb-3" class="pl-5">
                  <label for="id_asisten" class="form-label">Id Asisten</label>
                  <input type="number" name="id_asisten" id="id_asisten" class="form-control" value="{{ $asisten->id }}" readonly>
                </div>
            </div>

            <div class="col-md-6">
                <div class="mb-3" class="pl-5">
                  <label for="kelas" class="form-label">Nama Kelas</label>
                  <input type="text" name="kelas" id="kelas" class="form-control" value="{{ $asisten->kelas->nama }}" readonly>
                </div>
            </div>
          </div>
  
          <div class="row">
            <div class="col-md-6">
                <div class="mb-3" class="pl-5">
                  <label for="prodi" class="form-label">Nama Program Studi</label>
                  <input type="text" name="prodi" id="prodi" class="form-control" value="{{ $asisten->kelas->mku_prodi->prodi->nama }}" readonly>
                </div>
              </div>
              
              <div class="col-md-6">  
                <div class="mb-3" class="pl-5">
                  <label for="mku" class="form-label">Nama MKU</label>
                  <input type="text" name="mku" id="mku" class="form-control" value="{{ $asisten->kelas->mku_prodi->mku->nama }}" readonly>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-6">
                <div class="mb-3" class="pl-5">
                  <label for="tahun" class="form-label">Tahun ajaran</label>
                  <input type="text" name="tahun" id="tahun" class="form-control" value="{{ $asisten->pendaftaran->program->tahun_ajaran->tahun }}" readonly>
                </div>
              </div>

              <div class="col-md-6">
                <div class="mb-3" class="pl-5">
                    <label for="semester" class="form-label">Semester</label>
                        @if($asisten->pendaftaran->program->tahun_ajaran->semester==1)
                    <input type="text" name="semester" id="semester" class="form-control" value="ganjil" readonly>
                        @else($asisten->pendaftaran->program->tahun_ajaran->semester==2)
                    <input type="text" name="semester" id="semester" class="form-control" value="genap" readonly>
                        @endif
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-6">
                <div class="mb-3" class="pl-5">
                  <label for="nama asisten" class="form-label">Nama Asisten</label>
                  <input type="text" name="nama asisten" id="nama asisten" class="form-control" value="{{ $asisten->pendaftaran->mahasiswa->user->name }}" readonly>
                </div>
              </div>

              <div class="col-md-6">
                <div class="mb-3" class="pl-5">
                  <label for="npm asisten" class="form-label">NPM Asisten</label>
                  <input type="text" name="npm asisten" id="npm asisten" class="form-control" value="{{ $asisten->pendaftaran->mahasiswa->npm }}" readonly>
                </div>
              </div>
            </div>


            <div class="row">
              <div class="col-md-6">
                <div class="mb-3" class="pl-5">
                  <label for="dosen" class="form-label">Nama Dosen Pengampu</label>

                  @foreach ($asisten->kelas->dosen as $dosen)
                  <input type="text" name="dosen" id="dosen" class="form-control" 
                   value="{{ $dosen->nama }}"
                   readonly>  <br>
                   @endforeach          
                </div>
              </div>
              

              <div class="col-md-6">
                <div class="mb-3" class="pl-5">
                  <label for="no hp" class="form-label">No Hp</label>
                  <input type="text" name="no hp" id="no hp" class="form-control" value="{{ $asisten->pendaftaran->mahasiswa->no_hp }}" readonly >
                </div>
              </div>
            </div>


        </div>
        
        <br><br>
      </form>
      
    </div> 
  </div> 
@endsection 

  