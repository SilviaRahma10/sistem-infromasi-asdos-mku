@extends('layouts.mainKoordinator')
@section('title', 'data kelas')
@section('content')
<div class="container-fluid">
    <!-- Example single danger button -->

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Lapran Asisten Kelas</h1>
 
    <!-- DataTales Example -->
    {{-- value="{{ $prodi->id }}" --}}


      {{-- <div class="nav-item dropdown back bg-primary" style="width: max-content; border-radius:8px">
        <a style="color:white" class="nav-link dropdown-toggle" href="#" id="dropdown1" data-toggle="dropdown" arial-haspopup="true" arial-expanded="false">Program studi</a>
        <div class="dropdown-menu" arial-labelledby="dropdown1">
            @foreach($prodis as $prodi)
            <a class="dropdown-item"  href="{{ route('kelas.pilih', $prodi->id) }}">{{ $prodi->prodi_name }}</a>
            @endforeach
        </div>
      </div> --}}
      
      <br>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data asisten Kelas Mata Kuliah Umum</h6>
        </div>
        
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="">
                    <thead>
                        <tr>
                            <th>Id kelas</th>
                            <th>Kode MKU</th>
                            <th>Nama MKU</th>
                            <th>Kode Program Studi</th>
                            <th>Nama Program Studi</th>
                            <th>Tahun akademik</th>
                            <th>Semester</th>
                            <th>Nama Dosen Pengampu</th>
                            <th>Nama Assisten</th>
                            <th>NPM Assisten</th>
                            <th>Email Assisten</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($asisten as $assistent)
                         <tr>
                           {{-- <td>{{ $assistent->id }}</td> --}}
                           <td>{{ $assistent->kelas->id}}</td>
                           <td>{{ $assistent->kelas->generalsubject->code}}</td>
                           <td>{{ $assistent->kelas->generalsubject->name}}</td>
                           <td>{{ $assistent->kelas->prodi->code}}</td>
                           <td>{{ $assistent->kelas->prodi->prodi_name}}</td>
                           <td>{{ $assistent->schoolyear->school_year}}</td>
                           <td>{{ $assistent->schoolyear->semester}}</td>
                           <td>{{ $assistent->kelas->lecturer->user->name}}</td>
                           <td>{{ $assistent->student->user->name }}</td> 
                           <td>{{ $assistent->student->npm }}</td> 
                           <td>{{ $assistent->student->user->email }}</td> 
                           <td>
                             {{-- <a href="{{ route('kelas.lihat', $assistent->id) }}"><button type="submit" class="btn btn-primary"> lihat</button> </a> --}}
                             <br><br>
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