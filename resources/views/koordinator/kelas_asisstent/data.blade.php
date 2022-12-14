@extends('layouts.mainKoordinator')
@section('title', 'data kelas')
@section('content')
<div class="container-fluid">

    <h1 class="h3 mb-2 text-gray-800">Asisten Kelas</h1>
    {{-- <div class="d-sm-flex align-items-center justify-content-between mb-4"> --}}
      <div class="nav-item dropdown back bg-primary" style="width: max-content; border-radius:8px">
        <a style="color:white" class="nav-link dropdown-toggle" href="#" id="dropdown1" data-toggle="dropdown"
            arial-haspopup="true" arial-expanded="false">Mata Kuliah Umum</a>
        <div class="dropdown-menu" arial-labelledby="dropdown1">
            @foreach ($generalsubjects as $generalsubject)
                <a class="dropdown-item" href="{{ route('asisten.pilih', $generalsubject->id) }}">{{ $generalsubject->nama }}</a>
            @endforeach
        </div>
      </div>

      <div class="nav-item dropdown back bg-primary" style="width: max-content; border-radius:8px">
        <a style="color:white" class="nav-link dropdown-toggle" href="#" id="dropdown1" data-toggle="dropdown"
            arial-haspopup="true" arial-expanded="false">
            <i class="fas fa-download fa-sm text-white-50"></i>
            Export Laporan Asisten Dosen</a>
        <div class="dropdown-menu" arial-labelledby="dropdown1">
            @foreach ($tahun_ajarans as $tahun_ajaran)
                <a class="dropdown-item" href="{{ route('asisten.export', ['id_tahun' => $tahun_ajaran->id]) }}">{{ $tahun_ajaran->tahun }} - 
                  {{ $tahun_ajaran->semester }}</a>
            @endforeach
        </div>
      </div>
  

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data asisten Kelas Mata Kuliah Umum</h6>
        </div>
        
        <div class="card-body">
            <div class="table-responsive">
                <table class="table" id="dataTable" width="100%" cellspacing="">
                    <thead>
                        <tr>
                            <th>Id Asisten kelas</th>
                            <th>Nama kelas</th>
                            <th>Nama Program Studi</th>
                            <th>Nama MKU</th>
                            <th>Dosen Pengampu</th>
                            <th>tahun ajaran</th>
                            <th>Semester</th>
                            <th>Nama Assisten</th>
                            <th>NPM Assisten</th>
                            <th>NO HP Assisten</th>
                            <th>Aksi</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($asisten as $assistant)
                         <tr>
                           <td>{{ $assistant->id}}</td>
                           {{-- <td>{{ $assistant->pendaftaran->program->tahun_ajaran->id }}</td> --}}
                           <td>{{ $assistant->kelas->nama}}</td>
                           <td>{{ $assistant->kelas->mku_prodi->prodi->nama }}</td>
                           <td>{{ $assistant->kelas->mku_prodi->mku->nama }}</td>
                           <td>
                            @foreach ($assistant->kelas->dosen as $dosen)
                                {{ $dosen->nama }} <br>
                            @endforeach
                           </td>

                           <td>{{ $assistant->pendaftaran->program->tahun_ajaran->tahun}}</td>
                           <td>
                            @if($assistant->pendaftaran->program->tahun_ajaran->semester==1)
                               Ganjil
                            @else
                              Genap
                            @endif
                          </td>

                          <td>{{ $assistant->pendaftaran->mahasiswa->user->name}}</td>
                          <td>{{ $assistant->pendaftaran->mahasiswa->npm}}</td>
                          <td>{{ $assistant->pendaftaran->mahasiswa->no_hp}}</td>
                          
                           <td>
                            <a href="{{ route('asisten.lihat', $assistant->id) }}"><button type="submit" class="btn btn-primary"> 
                              <i class="fas fa-sharp fa-eye"></i>   
                            </button> </a>
                             <br><br>
                           </td>

                           <td>
                            <a href="{{ route('asisten.edit', $assistant->id) }}"><button type="submit" class="btn btn-warning"> 
                              <i class="fas fa-pencil-alt"></i>    
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