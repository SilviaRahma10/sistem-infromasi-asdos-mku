@extends('layouts.mainKoordinator')
@section('title', 'Lihat Mku')

@section('content')
<div class="container-fluid">
  <!-- Page Heading -->
  <h1 class="h3 mb-2 text-gray-800">Data MKU</h1>

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <a href="{{ route('generalsubject.data') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
      class="fas fa-arrow-left fa-sm text-white-50"></i> Kembali</a>
    </div>

    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data MKU dan Data Prodi</h6>
      </div>
      
      <form class="pl-5">
        @csrf
        <div class="container-fluid">
          <fieldset disabled>
            <br>
            <div class="mb-3" class="pl-5">
              <label for="id" class="form-label">Id MKU</label>
              <input type="number" name="id" id="id" class="form-control" value="{{ $generalsubject->id }}">
            </div>

            <div class="mb-3" class="pl-5">
              <label for="name" class="form-label">Nama MKU</label>
              <input type="text" name="name" id="name" class="form-control" value="{{ $generalsubject->name }}">
            </div>

            <div class="mb-3" class="pl-5">
              <label for="code" class="form-label">Kode MKU</label>
              <input type="text" name="code" id="code" class="form-control" value="{{ $generalsubject->code }}"">
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
            </fieldset>
        </form>
      </div>
    </div>
    <br>
  {{-- <a class="pl-5" href="{{ route('.index') }}"><button type="submit" class="btn btn-primary" >Cancle</button></a> --}}
  @endsection
          
