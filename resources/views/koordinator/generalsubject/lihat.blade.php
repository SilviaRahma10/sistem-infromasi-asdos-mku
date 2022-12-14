@extends('layouts.mainKoordinator')
@section('title', 'Lihat Mku')

@section('content')
<div class="container-fluid">
  <!-- Page Heading -->
  <h1 class="h3 mb-2 text-gray-800">Data MKU - {{ $generalsubject->nama }}</h1>

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <a href="{{ route('generalsubject.data') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
      class="fas fa-arrow-left fa-sm text-white-50"></i> Kembali</a>
    </div>

    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Mata Kuliah Umum</h6>
      </div>
      
      <form class="pl-5">
        @csrf
        <div class="container-fluid">
          <fieldset disabled>
            <br>

            <div class="row">
              <div class="col-md-6">
                <div class="mb-3" class="pl-5">
                  <label for="name" class="form-label">Nama MKU</label>
                  <input type="text" name="name" id="name" class="form-control" value="{{ $generalsubject->nama }}">
                </div>
              </div>
              <div class="col-md-6">
                <div class="mb-3" class="pl-5">
                  <label for="code" class="form-label">Kode MKU</label>
                  <input type="text" name="code" id="code" class="form-control" value="{{ $generalsubject->kode }}"">
                </div>
              </div>
            </div><br><br>

            
             
              {{-- <label for="" class="form-label">Program Studi</label>
                  <div class="table-responsive">
                      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" >
                        <thead>
                            <tr>
                                <th>Kode Program Studi</th>
                                <th>Nama Prodi</th>
                            </tr>
                        </thead>

                        <tbody>
                              @foreach ($mata_kuliah_prodis as  $mku_prodi )
                                    <tr>
                                      <td>{{ $mku_prodi->prodi->nama }}</td>
                                      <td>{{ $mku_prodi->prodi->kode }}</td>
                        
                                    </tr>
                              @endforeach 
                    
                              
                          </tbody>
                      </table>
                    </div><br> --}}
            </fieldset>
          </div>
        </form>
      </div>
    </div>
    <br>
  {{-- <a class="pl-5" href="{{ route('.index') }}"><button type="submit" class="btn btn-primary" >Cancle</button></a> --}}
  @endsection
          
