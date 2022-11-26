@extends('layouts.mainKoordinator')
@section('title', 'data pendaftar')
@section('content')

<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Data Asisten Dosen MKU </h1>
    <p class="mb-4"></a></p>

    <div class="nav-item dropdown back bg-primary" style="width: max-content; border-radius:8px">
        <a style="color:white" class="nav-link dropdown-toggle" href="#" id="dropdown1" data-toggle="dropdown"
            arial-haspopup="true" arial-expanded="false">Mata Kuliah Umum</a>
        <div class="dropdown-menu" arial-labelledby="dropdown1">
            @foreach ($generalsubjects as $generalsubject)
                <a class="dropdown-item" href="{{ route('asisten.pilih', $generalsubject->id) }}">{{ $generalsubject->nama }}</a>
            @endforeach
        </div>
    </div><br>

    <form action="{{ route('asisten.search') }}" method="GET" class="d-none d-sm-inline-block form-inline mr-auto ml-md-3  my-md-0 navbar-search" style="float: right;">
        <div class="input-group pull-right" style="color:white">
                <input type="search" class="form-control bg-white border-0 small" placeholder="Cari Data Asisten" name="search">
                <div class="input-group-append">
                    <button class="btn btn-primary" type="submit">
                        <i class="fas fa-search fa-sm"></i>
                    </button>
                </div>
            </div>
    </form>
    <br><br>


    <div class="card shadow mb-4">
        <div class="card-header py-3"> 
            <h6 class="m-0 font-weight-bold text-primary">Data Pendaftar</h6>
        </div>

        <div class="table-responsive">
            <div class="card-body">
                    <table class="table" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama mahasiswa</th>
                                <th>NPM mahasiswa</th>
                                <th>Email</th>
                                <th>Prodi mahasiswa</th>
                                <th>Angkatan</th>
                                <th>Tahun ajaran</th>
                                <th>semester</th>
                                <th>nama mku</th>
                                <th>kode mku</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>

                            @php
                            $no=1;
                            @endphp

                            @foreach ($registrations as $index => $registration)
                            <tr>
                                <th scope="row"> {{ $index + $registrations->firstItem() }}</th>
                            <td>{{ $registration->mahasiswa->user->name }}</td>
                            <td>{{ $registration->mahasiswa->npm }}</td>
                            <td>{{ $registration->mahasiswa->user->email }}</td>
                            <td>{{ $registration->mahasiswa->prodi->nama }}</td>
                            <td>{{ $registration->mahasiswa->angkatan }}</td>
                            <td>{{ $registration->program->tahun_ajaran->tahun }}</td>
                            <td>
                                    @if($registration->program->tahun_ajaran->semester==1)
                                        Ganjil
                                    @else
                                        Genap
                                    @endif
                            </td>

                                <td>{{ $registration->mku->nama }}</td>
                                <td>{{ $registration->mku->kode }}</td>
                                <td>
                                
                                    @if($registration->status==0)
                                        Belum Diverifikasi

                                    @elseif($registration->status==1)
                                            Terima
                                    @else
                                            Tolak
                                    @endif
                                </td>

                                <td>
                                    <a href="{{ route('asisten.lihat', $registration->id) }}"><button type="submit" class="btn btn-primary">
                                        <i class="fas fa-sharp fa-eye"></i> 
                                    </button> </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div style="float: right">
                        {{ $registrations->links() }}
                    </div>
                </div>
            </div>
    </div>
  
  </div>
  @endsection
