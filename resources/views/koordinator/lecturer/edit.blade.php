@extends('layouts.mainKoordinator')
@section('title', 'edit lecturer')

@section('content')
    <div class="container-fluid">
        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Edit data {{ $lecturer->nama }}</h1>

        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <a href="{{ route('lecturer.data') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                    class="fas fa-arrow-left fa-sm text-white-50"></i> Kembali</a>
        </div>

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Masukkan Data Dosen</h6>
            </div>

            <form action="{{ route('lecturer.update', $lecturer->id) }}" method="POST">
                @csrf
                @method('PUT')

              <div class="card-body">

                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="id_prodi" class="form-label">Program Studi</label>
                            <br>
                            <select id="id_prodi" name="id_prodi" class="form-control">
                                <option value="{{ $lecturer->prodi->id }}">{{ $lecturer->prodi->nama }}</option>
                                @foreach ($prodis as $prodi)
                                    <option value="{{ $prodi->id }}" @if ($lecturer->id_prodi == $prodi->id) selected @endif>{{ $prodi->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama Dosen</label>
                            <input type="text" name="nama" id="nama" class="form-control @error('nama') is-invalid @enderror"  
                                value="{{ $lecturer->nama }}">

                            @error('nama')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="nip" class="form-label">Nip Dosen</label>
                            <input type="number" name="nip" id="nip" class="form-control @error('nip') is-invalid @enderror"  
                                value="{{ $lecturer->nip }}">

                                @error('nip')
                                <div class="invalid-feedback">{{ $message }}</div>
                              @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="nidn" class="form-label">Nidn Dosen</label>
                            <input type="number" name="nidn" id="nidn" class="form-control @error('nidn') is-invalid @enderror"  
                                value="{{ $lecturer->nidn }}">

                                @error('nidn')
                                <div class="invalid-feedback">{{ $message }}</div>
                              @enderror
                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="no_hp" class="form-label">NO HP</label>
                            <input type="number" name="no_hp" id="no_hp" class="form-control @error('no_hp') is-invalid @enderror"  
                                value="{{ $lecturer->no_hp }}">

                                @error('no_hp')
                                <div class="invalid-feedback">{{ $message }}</div>
                              @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                            <br>
                            <select id="jenis_kelamin" name="jenis_kelamin" class="form-control">
                                <option value="L" @if ($lecturer->jenis_kelamin == 'L') selected @endif>laki-laki</option>
                                <option value="P" @if ($lecturer->jenis_kelamin == 'P') selected @endif>perempuan</option>
                            </select>
                        </div>
                    </div>
                </div>


                </div>
                <div class="card-footer">
                  
                  <button type="submit" class="btn btn-primary">Simpan</button>
              </div>
            </form>
        </div>
    </div>
    {{-- <a href="{{ route('.index') }}"><button type="submit" class="btn btn-primary" >Cancle</button></a> --}}
@endsection
