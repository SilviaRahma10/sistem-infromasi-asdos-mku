@extends('layouts.mainKoordinator')
@section('title', 'data kelas')
@section('content')
{{-- <div class="container">
    <div class="row">
        <div class="col-12"> --}}
        <div class="container-fluid">
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <a href="{{ route('kelas.data') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-arrow-left fa-sm text-white-50"></i> Kembali</a>
              </div> 

            <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Data Kelas Program Studi</h6>
                </div>
            
                <div class="card-body">
                    <div class="mb-3" class="pl-5">
                        <label for="kode_prodi" class="form-label">kode Prodi</label>
                        <input type="text" name="kode_prodi" id="kode_prodi" class="form-control" value="{{ $prodi->kode}}" readonly>
                    </div>
        
                    <div class="mb-3" class="pl-5">
                        <label for="nama_prodi" class="form-label">Id prodi</label>
                        <input type="text" name="nama_prodi" id="nama_prodi" class="form-control" value="{{ $prodi->nama}}" readonly>
                    </div>
                </div>
            </div>
            
             <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Data kelas Pogram studi {{ $prodi->nama}} </h6>
                </div>
                
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Id kelas</th>
                                    <th>Nama kelas</th>
                                    <th>Kode Mku</th>
                                    <th>Nama MKU</th>
                                    <th>Nama Dosen Pengampu</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($kelas as $class)
                                 <tr>{{-- 
                                   <td>{{ $class->id }}</td>
                                   <td>{{ $class->nama}}</td>
                                   {{-- <td>{{ $class->mku_prodi->nama}}</td>
                                   <td>{{ $class->mku_prodi->kode}}</td> --}}
                                   {{-- <td>{{ $class->nama}}</td>
                                   <td>{{ $class->nama}}</td>  --}}
                                   {{-- <td>
                                     <a href="{{ route('kelas.lihat', $class->id) }}"><button type="submit" class="btn btn-primary"> lihat</button> </a>
                                     <br><br>
                                   </td>
                                 </tr> --}}
                                 @endforeach
                            </tbody>
                        </table>
                    </div>
                </div> 
            </div>
        </div>
    </div>
</div>
@endsection