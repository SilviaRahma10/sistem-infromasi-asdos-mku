@extends('layouts.mainKoordinator')
@section('title', 'pemetaan')

@section('content')

  <div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Pemetaan {{ $registration->student->name }}</h1>
   
    <div class="card shadow mb-4">
      <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Data Calon asisten kelas</h6>
      </div>
        <form class="pl-5" action="{{ route('asisten.tambah', $registration->id) }}" method="POST">
          @csrf
          @METHOD('POST')
        
        <div class="container-fluid">
          
            <div class="mb-3" class="pl-5">
              <label for="student_name" class="form-label">Nama Mahasiswa</label>
              <input type="text" name="student_name" id="student_name" class="form-control" value="{{ $registration->student->user->name }}" readonly>
            </div>

            <div class="mb-3" class="pl-5">
              <label for="student_npm" class="form-label">NPM Mahasiswa</label>
              <input type="text" name="student_npm" id="student_npm" class="form-control" value="{{ $registration->student->npm }}" readonly>
            </div>

            <div class="mb-3" class="pl-5">
              <label for="school_year" class="form-label">Tahun Ajaran</label>
              <input type="text" name="school_year" id="school_year" class="form-control" value="{{ $registration->schoolyear->school_year }}" readonly>
            </div>

            <div class="mb-3" class="pl-5">
              <label for="semester" class="form-label">Semester</label></label>
              <input type="text" name="semester" id="semester" class="form-control" value="{{ $registration->schoolyear->semester }}" readonly>
            </div>

            <div class="mb-3" class="pl-5">
                <label for="generalsubject_name" class="form-label">MKU</label></label>
                <input type="text" name="generalsubject_name" id="generalsubject_name" class="form-control" value="{{ $registration->generalsubject->name }}" readonly>
              </div>

              <div class="mb-3" class="pl-5">
                <label for="generalsubject_code" class="form-label">Code MKU</label></label>
                <input type="text" name="generalsubject_code" id="generalsubject_code" class="form-control" value="{{ $registration->generalsubject->code }}" readonly>
              </div>

              <div class="form-check" >
                <label for="" class="form-label">Pilih Penempatan Asisten Dosen</label>
                    <div class="table-responsive">
                      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                                                                    <th><input type="radio" /></th>
                                <th>Id</th>
                                <th>Nama Prodi</th>
                                <th>Kode Program Studi</th>
                                <th>Jenjang</th>
                                <th>Matakuliah Umum</th>
                                <th>Dosen Pengampu</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                          @foreach ($kelas as $class)
                                <div id="checkboxes">
                                  <tr>
                                    <label for="{{ $class->id }}">
                                      <td><input type="radio" id="{{ $class->id }}" name="kelas" value="{{ $class->id }}" /></td>
                                      <td id="{{ $class->id }}">{{ $class->id }}</td>
                                      <td id="{{ $class->id }}">{{ $class->prodi->prodi_name }}</td>
                                      <td id="{{ $class->id }}">{{ $class->prodi->code }}</td>
                                      <td id="{{ $class->id }}">{{ $class->prodi->level }}</td>
                                      <td id="{{ $class->id }}">{{ $class->generalsubject->name }}</td>
                                      <td id="{{ $class->id }}">{{ $class->lecturer->user->name }}</td>                                
                                    </label>
                                  </tr>
                                </div>
                              @endforeach
                          </tbody>
                      </table>
                    </div>
              </div>
                 {{-- <label>Pilih Penempatan Asisten Dosen</label>
              @foreach ($kelas as $class)
              <div class="form-check" >
                <input class="form-check-input" type="radio" name="kelas" id="kelas" value="{{ $class->id }}">
                <label class="form-check-label" for="kelas" class="pb-3">
                    {{ $class->prodi->prodi_name }} - {{ $class->generalsubject->name }}
                </label>
              </div>
              @endforeach --}}

           

        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
      <br><br>
      </form>
    </div> 
  </div> 
@endsection