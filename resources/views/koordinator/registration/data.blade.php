@extends('layouts.mainKoordinator')
@section('title', 'data pendaftar')
@section('content')

@section('custom_head')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.13.1/cr-1.6.1/r-2.4.0/sc-2.0.7/sb-1.4.0/datatables.min.css"/>
@endsection



<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Pendaftaran Asisten Dosen MKU </h1>
    <p class="mb-4"></a></p>

    <div class="card shadow mb-4">
        <div class="card-header py-3"> 
            <h6 class="m-0 font-weight-bold text-primary">Data Pendaftar</h6>
        </div>

        <div class="table-responsive">
            <div class="card-body">
                <div class="row">
                    <div style="margin-left: 20px">
                        <a class="active" href="{{route ('registration.databelum')}}"><button  type="submit" class="btn btn-warning">Belum Diverifikasi</button></a>
                    </div>
                    
                    <div style="margin-left: 20px">
                        <a class="active" href="{{route ('registration.dataterima')}}"><button  type="submit" class="btn btn-success">Diterima</button></a>
                    </div>
            
                    <div style="margin-left: 20px">
                        <a class="active" href="{{route ('registration.datatolak')}}"><button  type="submit" class="btn btn-danger">Ditolak</button></a>
                    </div>
                    
                </div><br>


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
                            @if ($registration->id_mata_kuliah  == $idMku)
                            <tr>
                                <th scope="row"> {{ $loop->iteration }}</th>
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

                                {{-- <td>
                                        <a href="{{ route('registration.lihat', $registration->id) }}"><button type="submit" class="btn btn-primary">
                                            <i class="fas fa-sharp fa-eye"></i> 
                                        </button> </a>
                                </td> --}}

                                <td>
                                    <a href="{{ route('registration.edit', $registration->id) }}"><button type="submit" class="btn btn-primary">
                                        <i class="fas fa-pencil-alt"></i>
                                    </button> </a>
                            </td>
                            </tr>
                            @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
    </div>
  
  </div>
  @endsection

  @push('custom_js')
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.13.1/cr-1.6.1/r-2.4.0/sc-2.0.7/sb-1.4.0/datatables.min.js"></script>

      <script>
        $(document).ready( function () {
    $('#dataTable').DataTable();
} );
      </script>
  @endpush