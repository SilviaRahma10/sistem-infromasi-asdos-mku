@extends('layouts.mainKoordinator')
@section('title', 'data mahasiswa')
@section('content')
{{-- <div class="container">
    <div class="row">
        <div class="col-12"> --}}
        <div class="container-fluid">
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <a href="{{ route('student.data') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-arrow-left fa-sm text-white-50"></i> Kembali</a>
              </div> 

            <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Data mahasiswa</h6>
                </div>

                
            
                <div class="card-body">

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3" class="pl-5">
                                <label for="kode_prodi" class="form-label">kode Prodi</label>
                                <input type="text" name="kode_prodi" id="kode_prodi" class="form-control" value="{{ $prodi->kode}}" readonly>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3" class="pl-5">
                                <label for="nama_prodi" class="form-label">Nama prodi</label>
                                <input type="text" name="nama_prodi" id="nama_prodi" class="form-control" value="{{ $prodi->nama}}" readonly>
                            </div>
                        </div>
                    </div>
                <br>
            
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Data Mahasiswa Pogram studi {{ $prodi->nama}} </h6>
                </div>
                
                 <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Id mahasiswa</th>
                                    <th>Nama</th>
                                    <th>NPM</th>
                                    <th>Angkatan</th>
                                    <th>No hp</th>
                                    <th>Email</th>
                                    <th>Alamat</th>
                                    <th>jenis kelamin</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            
                            <tbody>
                                @foreach ($student as $mahasiswa)
                                 <tr>
                                   <td>{{ $mahasiswa->id }}</td>
                                 <td>{{ $mahasiswa->user->name }}</td>
                                   <td>{{ $mahasiswa->npm }}</td>
                                   <td>{{ $mahasiswa->angkatan }}</td>
                                   <td>{{ $mahasiswa->no_hp }}</td>
                                   <td>{{ $mahasiswa->user->email }}</td> 
                                  <td>{{ $mahasiswa->address }}</td>
                                    <td>{{ $mahasiswa->gender }}</td>
                                   <td>
                                    <a href="{{ route('student.lihat', $mahasiswa->id) }}"><button type="submit" class="btn btn-primary"> lihat</button> </a>
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
    </div>
</div>
@endsection