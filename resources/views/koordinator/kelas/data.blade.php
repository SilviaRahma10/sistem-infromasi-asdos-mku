@extends('layouts.mainKoordinator')
@section('title', 'data kelas')
@section('content')
<div class="container-fluid">
    <!-- Example single danger button -->

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Kelas MKU</h1>
 
    <!-- DataTales Example -->
    {{-- value="{{ $prodi->id }}" --}}


      <div class="nav-item dropdown back bg-primary" style="width: max-content; border-radius:8px">
        <a style="color:white" class="nav-link dropdown-toggle" href="#" id="dropdown1" data-toggle="dropdown" arial-haspopup="true" arial-expanded="false">Program Studi</a>
        <div class="dropdown-menu" arial-labelledby="dropdown1">
            @foreach($prodis as $prodi)
            <a class="dropdown-item"  href="{{ route('kelas.pilih', $prodi->id) }}">{{ $prodi->prodi_name }}</a>
            @endforeach
        </div>
      </div>
      
      <br>
        <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Kelas Mata Kuliah Umum</h6>
        </div>
        
        <div class="card-body">
            <div class="table-responsive">
                <table class="table" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Kode MKU</th>
                            <th>Nama MKU</th>
                            <th>Kode Program Studi</th>
                            <th>Nama Program Studi</th>
                            <th>Kelas</th>
                            <th>Nama Dosen Pengampu</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($kelas as $class)
                         <tr>
                           <td>{{ $class->id }}</td>
                           <td>{{ $class->program->generalsubject->code}}</td>
                           <td>{{ $class->program->generalsubject->name}}</td>
                           <td>{{ $class->prodikelas->prodi->code}}</td>
                           <td>{{ $class->prodikelas->prodi->prodi_name}}</td>
                           <td>{{ $class->prodikelas->nama_kelas}}</td>
                           <td>{{ $class->lecturer->user->name }}</td> 
                           <td>
                             <a href="{{ route('kelas.lihat', $class->id) }}"><button type="submit" class="btn btn-primary"> 
                              <i class="fas fa-sharp fa-eye"></i>  
                            </button> </a>
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