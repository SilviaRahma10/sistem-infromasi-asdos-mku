@extends('layouts.mainKoordinator')
@section('title', 'pendaftaran')
@section('content')

<div class="container-fluid">

    <h1 class="h3 mb-2 text-gray-800">Data Pendaftaran</h1>
    <br>
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <a href="{{ route('registration.data') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-arrow-left fa-sm text-white-50"></i> Kembali</a>
            </div>
           
    {{-- DataTales Example --}}

    <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Data Pendafatar Asdos</h6>
        </div>
  
        <form class="p-5">
            @csrf
            <div class="container-fluid">
            <fieldset disabled>

                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3" class="pl-5">
                            <label for="nama_mku" class="form-label">Nama Mata Kuliah Umum</label>
                            <input type="text" name="nama_mku" id="nama_mku" class="form-control" value="{{ $generalsubject->nama }}" readonly>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="mb-3" class="pl-5">
                            <label for="kode_mku" class="form-label">Code Fakultas</label>
                            <input type="text" name="kode_mku" id="kode_mku" class="form-control" value="{{ $generalsubject->kode }}" readonly>
                        </div>
                    </div>
                </div>
               
            </fieldset>
            </div>
        </form>
    </div>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Pendafatarn Asdos MKU {{ $generalsubject->nama }}</h6>
        </div>
        
        <div class="card-body">
            <div class="row">
                <div style="margin-left: 20px">
                    <a class="active" href="{{route ('registration.pilih', $generalsubject->id) }}"><button  type="submit" class="btn btn-warning">Belum Diverifikasi</button></a>
                </div>
                
                <div style="margin-left: 20px">
                    <a class="active" href="{{route ('registration.pilihterima', $generalsubject->id) }}"><button  type="submit" class="btn btn-primary">Diterima</button></a>
                </div>
        
                <div style="margin-left: 20px">
                    <a class="active" href="{{route ('registration.pilihtolak', $generalsubject->id) }}"><button  type="submit" class="btn btn-danger">Ditolak</button></a>
                </div>
                
            </div><br>

            <div class="table-responsive">
                <table class="table " id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Nama mahasiswa</th>
                            <th>NPM mahasiswa</th>
                            <th>Email</th>
                            <th>Prodi mahasiswa</th>
                            <th>Angkatan</th>
                            <th>Tahun ajaran</th>
                            <th>semester</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($registrations as $registration)
                        <tr>
                        <td>{{ $registration->id }}</td>
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
