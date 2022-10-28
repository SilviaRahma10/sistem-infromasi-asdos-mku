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
            <div class="mb-3" class="pl-5">
              <label for="id" class="form-label">Id Program</label>
              <input type="number" name="id" id="id" class="form-control" value="{{ $program->id }}">
            </div>

            {{-- <div class="mb-3" class="pl-5">
              <label for="name" class="form-label">Nama MKU</label>
              <input type="text" name="name" id="name" class="form-control" value="{{ $program->generalsubject->name }}">
            </div>

            <div class="mb-3" class="pl-5">
              <label for="code" class="form-label">Kode MKU</label>
              <input type="text" name="code" id="code" class="form-control" value="{{ $program->generalsubject->code }}"">
            </div> --}}

            <div class="container-fluid">
                <div class="mb-3" class="pl-5">
                  <label for="id_generalsubject" class="form-label">MKU</label>
                  <br>
                  <select id="id_generalsubject" name="id_generalsubject" class="form-control" required>
                    <option value="{{ $program->generalsubject->id }}"> {{ $program->generalsubject->name }}</option>
                    @foreach ($generalsubjects as $generalsubject)
                      <option value="{{ $generalsubject->id }}">{{ $generalsubject->name }}</option>
                    @endforeach
                  </select>
                </div>
  

            <div class="mb-3" class="pl-5">
              <label for="start_period" class="form-label">Periode Awal pendafataran</label>
              <input type="date" name="start_period" id="start_period" class="form-control" value="{{ $program->start_period }}">
            </div>

            <div class="mb-3" class="pl-5">
              <label for="finish_period" class="form-label">Periode Akhir pendafataran</label>
              <input type="date" name="finish_period" id="finish_period" class="form-control" value="{{ $program->finish_period }}">
            </div>

            <div class="mb-3" class="pl-5">
              <label for="quota" class="form-label">Kuota</label>
              <input type="number" name="quota" id="quota" class="form-control" value="{{ $program->quota }}">
            </div>

            <div class="mb-3" class="pl-5">
              <label for="qualification" class="form-label">Kualifikasi</label>
              <input type="text" name="qualification" id="qualification" class="form-control" value="{{ $program->qualification }}">
            </div>

            <div class="mb-3" class="pl-5">
              <label for="terms_and_conditions" class="form-label">Syarat Dan Ketentuan</label>
              <input type="text" name="terms_and_conditions" id="terms_and_conditions" class="form-control" value="{{ $program->terms_and_conditions }}">
            </div>
            
             {{-- <div class="multiselect" >
              <label for="" class="form-label">Prodi</label>
                  <div class="table-responsive">
                      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" >
                        <thead>
                            <tr>
                                <th>Kode Program Studi</th>
                                <th>Nama Prodi</th>
                                <th>Jenjang</th>
                                <th>dosen</th>
                            </tr>
                        </thead>

                        <tbody>
                              {{-- @foreach ($generalsubject->kelas as $kelasmku )
                                  <div id="checkboxes">
                                    <tr>
                                      
                                      <td>{{ $kelasmku->prodi->code }}</td>
                                      <td>{{ $kelasmku->prodi->prodi_name }}</td>
                                      <td>{{ $kelasmku->prodi->level }}</td>
                                      <td>{{ $kelasmku->lecturer->user->name }}</td>
                        
                                    </tr>
                                  </div>
                              @endforeach 
                          </tbody>
                      </table>
                    </div>
                </div>  --}}
            <br>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
      </div>
    </div>
    <br>
  {{-- <a class="pl-5" href="{{ route('.index') }}"><button type="submit" class="btn btn-primary" >Cancle</button></a> --}}
  @endsection
          
