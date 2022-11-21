@extends('layouts.mainKoordinator')
@section('title', 'tambah lecturer')
@section('content')

    <div class="container-fluid">
        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Tambah Dosen</h1>
        <br>

        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <a href="{{ route('lecturer.data') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                    class="fas fa-arrow-left fa-sm text-white-50"></i> Kembali</a>
        </div>

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Masukkan Data Dosen</h6>
            </div>

            <form action="{{ route('lecturer.simpan') }}" method="POST">
                <div class="card-body">
                    @csrf
                    <div class="mb-3" class="pl-5">
                        <label for="id_prodi" class="form-label">Pogram Studi</label>
                        <br>
                        <select id="id_prodi" name="id_prodi" class="form-control @error('id_prodi') is-invalid @enderror" value="{{ old('id_prodi') }}">
                            <option selected disabled>Pilih Prodi</option>
                            @foreach ($prodis as $prodi)
                                <option value="{{ $prodi->id }}">{{ $prodi->nama }}</option>
                            @endforeach
                        </select>

                        @error('id_prodi')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="row">
                        <div class="col-6">

                            <div class="mb-3" class="pl-5">
                                <label for="nip" class="form-label">Nip Dosen</label>
                                <input type="number" name="nip" id="nip" class="form-control @error('nip') is-invalid @enderror" value="{{ old('nip') }}">
                            
                                @error('nip')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mb-3" class="pl-5">
                                <label for="nidn" class="form-label">Nidn Dosen</label>
                                <input type="number" name="nidn" id="nidn" class="form-control @error('nidn') is-invalid @enderror" value="{{ old('nidn') }}">
                            

                                @error('nidn')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                        </div>
                    </div>

                    <div class="row">
                        <div class="col-6">
                            <div class="mb-3" class="pl-5">
                                <label for="nama" class="form-label">Nama Dosen</label>
                                <input type="text" name="nama" id="nama" class="form-control @error('nama') is-invalid @enderror" value="{{ old('nama') }}">
                            

                                @error('nama')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mb-3" class="pl-5">
                                <label for="no_hp" class="form-label">NO HP</label>
                                <input type="number" name="no_hp" id="no_hp" class="form-control @error('no_hp') is-invalid @enderror" value="{{ old('no_hp') }}">
                            
                                @error('no_hp')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                        <br>
                        <select id="jenis_kelamin" name="jenis_kelamin" class="form-control @error('jenis_kelamin') is-invalid @enderror" value="{{ old('jenis_kelamin') }}">
                            <option>Pilih Jenis Kelamin</option>
                            <option value="L">laki-laki</option>
                            <option value="P">perempuan</option>
                        </select>

                        @error('jenis_kelamin')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>

            </form>
        </div>
    </div>
    {{-- <a class="pl-5" href="{{ route('.index') }}"><button type="submit" class="btn btn-primary" >Cancle</button></a> --}}
@endsection
