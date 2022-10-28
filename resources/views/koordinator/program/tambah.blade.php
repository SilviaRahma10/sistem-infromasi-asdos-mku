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
        <h6 class="m-0 font-weight-bold text-primary">Masukkan Mku DAN Assign Prodi</h6>
      </div>
      
      <form class="pl-5" action="{{ route('program.simpan') }}" method="POST">
        @csrf
          <br>
           <div class="container-fluid">
              <div class="mb-3" class="pl-5">
                <label for="id_generalsubject" class="form-label">MKU</label>
                <br>
                <select id="id_generalsubject" name="id_generalsubject" class="form-control" required>
                  <option>Pilih MKU</option>
                  @foreach ($generalsubjects as $generalsubject)
                    <option value="{{ $generalsubject->id }}">{{ $generalsubject->name }}</option>
                  @endforeach
                </select>
              </div>

              <div class="mb-3" class="pl-5">
                <label for="id_schoolyear" class="form-label">Tahun Akademik</label>
                <br>
                <select id="id_schoolyear" name="id_schoolyear" class="form-control" required>
                  <option>Pilih Tahun Akademik</option>
                  @foreach ($schoolyears as $schoolyear)
                    <option value="{{ $schoolyear->id }}">{{ $schoolyear->school_year }} - {{ $schoolyear->semester }} </option>
                  @endforeach
                </select>
              </div>


              <div class="mb-3" class="pl-5">
                <label for="start_period" class="form-label">Periode Awal pendafataran</label>
                <input type="date" name="start_period" id="start_period" class="form-control" >
              </div>

              <div class="mb-3" class="pl-5">
                <label for="finish_period" class="form-label">Periode Akhir pendafataran</label>
                <input type="date" name="finish_period" id="finish_period" class="form-control" >
              </div>

              <div class="mb-3" class="pl-5">
                <label for="quota" class="form-label">Kuota</label>
                <input type="number" name="quota" id="quota" class="form-control" >
              </div>

              <div class="mb-3" class="pl-5">
                <label for="qualification" class="form-label">Kualifikasi</label>
                <input type="text" name="qualification" id="qualification" class="form-control" >
              </div>

              <div class="mb-3" class="pl-5">
                <label for="terms_and_conditions" class="form-label">Syarat Dan Ketentuan</label>
                <input type="text" name="terms_and_conditions" id="terms_and_conditions" class="form-control" >
              </div>
                
              <div class="multiselect" >
                <label for="" class="form-label">Assing Prodi</label>
                    <div class="table-responsive">
                      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                                                                    <th><input type="checkbox" /></th>
                                <th>Id prodi kelas</th>
                                <th>Kode Program Studi</th>
                                <th>Nama Prodi</th>
                                <th>Jenjang</th>
                                <th>Nama Kelas</th>
                                <th>Dosen Pengampu</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                              @foreach ($prodikelas as $prodikls)
                                <div id="checkboxes">
                                  <tr>
                                    <label for="{{ $prodikls->id  }}">
                                      <td><input type="checkbox" id="{{ $prodikls->id }}" name="prodikelas[]" value="{{ $prodikls->id }}" /></td>
                                       <td id="{{ $prodikls->id }}">{{ $prodikls->id }}</td> 
                                       <td id="{{ $prodikls->id }}">{{ $prodikls->prodi->code}}</td>
                                      <td id="{{ $prodikls->id }}">{{ $prodikls->prodi->prodi_name }}</td>
                                      <td id="{{ $prodikls->id }}">{{ $prodikls->prodi->level}}</td>
                                      <td id="{{ $prodikls->id }}">{{ $prodikls->nama_kelas }}</td> 

                                      <td>
                                        <select name="dosen_pengampu[{{ $prodikls->id }}]" id="" class="form-control">
                                                <option>Pilih Dosen Pengampu</option>
                                          @foreach ($prodikls->prodi->lectures as $dosen)
                                              <option value="{{ $dosen->id }}">{{ $dosen->user->name }}</option>
                                          @endforeach
                                        </select>
                                      </td>
                                      
                                    </label>
                                  </tr>
                                </div>
                              @endforeach
                          </tbody>
                      </table>
                    </div>
              </div>
            <br>
          <button type="submit" class="btn btn-primary">Simpan Mku</button>
          <br><br>
        </form>
    </div>
  </div>
    <br>
  {{-- <a class="pl-5" href="{{ route('.index') }}"><button type="submit" class="btn btn-primary" >Cancle</button></a> --}}
  @endsection
          
