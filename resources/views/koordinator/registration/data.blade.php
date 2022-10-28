@extends('layouts.mainKoordinator')
@section('title', 'data pendaftar')
@section('content')


<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Pendaftaran Asisten Dosen MKU </h1>
    <p class="mb-4"></a>.</p>
            {{-- <a href="{{ route('registration.tambah') }}"><button type="submit" class="btn btn-primary">Tambah</button></a>
            <br><br> --}}
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Pendaftar</h6>
        </div>
        
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Nama mahasiswa</th>
                            <th>NPM mahasiswa</th>
                            <th>Prodi mahasiswa</th>
                            <th>Tahun ajaran akademik</th>
                            <th>semester</th>
                            <th>nama mku</th>
                            <th>kode mku</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($registrations as $registration)
                         <tr>
                           <td>{{ $registration->id }}</td>
                           <td>{{ $registration->student->user->name }}</td>
                           <td>{{ $registration->student->npm }}</td>
                           <td>{{ $registration->student->prodi->prodi_name }}</td>
                           <td>{{ $registration->schoolyear->school_year }}</td>
                           <td>{{ $registration->schoolyear->semester }}</td>
                           <td>{{ $registration->generalsubject->name }}</td>
                           <td>{{ $registration->generalsubject->code }}</td>
                           <td>{{ $registration->status }}</td>
                           {{-- <td>{{ $registration->id }}</td>
                           <td>{{ $registration->id_student }}</td>
                           <td>{{ $registration->id_schoolyear}}</td>
                           <td>{{ $registration->id_generalsubject }}</td> --}}

                            <td>
                                    <a href="{{ route('registration.edit', $registration->id) }}"><button type="submit" class="btn btn-primary">
                                        <i class="fas fa-pencil-alt"></i>
                                    </button> </a>
                            </td>
                         </tr>
                         @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
  
  </div>
  @endsection
