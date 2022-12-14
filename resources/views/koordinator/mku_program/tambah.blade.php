@extends('layouts.mainKoordinator')
@section('title', 'tambah program mku')
@section('content')

    <div class="container-fluid">
        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Tambah Progam Mku yang dibuka</h1>
        <br>

        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <a href="{{ route('mkuprogram.data') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                    class="fas fa-arrow-left fa-sm text-white-50"></i> Kembali</a>
        </div>

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Masukkan Data MKU</h6>
            </div>

            <form action="{{ route('mkuprogram.simpan') }}" method="POST">
                @csrf
                <div class="card-body">                  
                    <div class="row">
                        <div class="col-6">
                            <div class="mb-3" class="pl-5">
                                <label for="tahun" class="form-label">Tahun</label>
                                <input type="text" name="tahun" id="tahun" class="form-control" value="{{ $program->tahun_ajaran->tahun}}" readonly>
                            </div>
                        </div>
                      
                        <div class="col-6">
                            <div class="mb-3" class="pl-5">
                                <label for="semester" class="form-label">Semester</label>
                                @if($program->tahun_ajaran->semester==1)
                                    <input type="text" name="semester" id="semester" class="form-control" value="ganjil" readonly>
                                @else($program->tahun_ajaran->semester==2)
                                    <input type="text" name="semester" id="semester" class="form-control" value="genap" readonly>
                                @endif
                            </div>
                        </div>  
                    </div>

                    <div class="row">
                        <div class="col-6">
                            <div class="mb-3" class="pl-5">
                                <label for="mku" class="form-label">Nama MKU</label>
                                <input type="text" name="mku" id="mku" class="form-control" value="{{ $idMku->mku->nama }}" readonly>
                            </div>
                        </div>
                      
                        <div class="col-6">
                            <div class="mb-3" class="pl-5">
                                <label for="kode_mku" class="form-label">Kode MKU</label>
                                <input type="text" name="kode_mku" id="kode_mku" class="form-control" value="{{ $idMku->mku->kode }}" readonly>
                            </div>
                        </div> 
                    </div>

                    <div class="mb-3" class="pl-5">
                        <label for="kuota" class="form-label">Kuota Penerimaan Asisten</label>
                        <input type="number" name="kuota" id="kuota" class="form-control @error('kuota') is-invalid @enderror" value="{{ old('kuota') }}">

                        @error('kuota')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3" class="pl-5">
                    <label for="syarat" class="form-label">Syarat & Ketentuan</label>
                        <div class="input-group">
                            <textarea name="syarat" id="syarat"  class="form-control @error('syarat') is-invalid @enderror" value="{{ old('syarat') }}" aria-label="With textarea"></textarea>
                            @error('syarat')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3" class="pl-5">
                      <label for="kualifikasi" class="form-label">Kualifikasi</label>
                      <div class="input-group">
                            <textarea name="kualifikasi" id="kualifikasi"  class="form-control @error('kualifikasi') is-invalid @enderror" value="{{ old('kualifikasi') }}" aria-label="With textarea"></textarea>
                            @error('kualifikasi')
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
