@extends('layouts.mainKoordinator')
@section('title', 'tambah program mku')
@section('content')

    <div class="container-fluid">
        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Edit Progam Mku yang dibuka</h1>
        <br>

        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <a href="{{ route('mkuprogram.data') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                    class="fas fa-arrow-left fa-sm text-white-50"></i> Kembali</a>
        </div>

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Masukkan Data MKU</h6>
            </div>

            <form action="{{ route('mkuprogram.update',$mku_program->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <div class="mb-3" class="pl-5">
                                <label for="tahun" class="form-label">Tahun</label>
                                <input type="text" name="tahun" id="tahun" class="form-control" value="{{ $mku_program->program->tahun_ajaran->tahun }}" readonly>
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="mb-3" class="pl-5">
                                <label for="semester" class="form-label">Semester</label>
                                    @if($mku_program->program->tahun_ajaran->semester==1)
                                        <input type="text" name="semester" id="semester" class="form-control" value="ganjil" readonly>
                                    @else($mku_program->program->tahun_ajaran->semester==2)
                                        <input type="text" name="semester" id="semester" class="form-control" value="genap" readonly>
                                    @endif
                            </div>
                        </div>  
                    </div>

                    <div class="row">
                        <div class="col-6">
                            <div class="mb-3" class="pl-5">
                                <label for="tanggal_buka" class="form-label">Tanggal Buka</label>
                                <input type="text" name="tanggal_buka" id="tanggal_buka" class="form-control" value="{{ $mku_program->program->tanggal_buka }}" readonly>
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="mb-3" class="pl-5">
                                <label for="tanggal_tutup" class="form-label">Tanggal Tutup</label>
                                <input type="text" name="tanggal_tutup" id="tanggal_tutup" class="form-control" value="{{ $mku_program->program->tanggal_tutup }}" readonly>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                       <div class="col-6">
                            <div class="mb-3" class="pl-5">
                                <label for="nama_mata_kuliah" class="form-label">Nama MKU</label>
                                <input type="test" name="nama_mata_kuliah" id="nama_mata_kuliah" class="form-control" value="{{ $mku_program->mku->nama }}" readonly>
                            </div>
                       </div>

                        <div class="col-6">
                            <div class="mb-3" class="pl-5">
                                <label for="kode_mata_kuliah" class="form-label">Kode MKU</label>
                                <input type="test" name="kode_mata_kuliah" id="kode_mata_kuliah" class="form-control" value="{{ $mku_program->mku->kode }}" readonly>
                            </div>
                        </div>
                    </div> 

                    <div class="row">
                        <div class="col-6">
                            <div class="mb-3" class="pl-5">
                                <label for="is_active" class="form-label">Semester</label>
                                    @if($mku_program->program->is_active==1)
                                        <input type="text" name="is_active" id="is_active" class="form-control" value="aktif" readonly>
                                    @else($mku_program->program->is_active==0)
                                        <input type="text" name="is_active" id="is_active" class="form-control" value="non-aktif" readonly>
                                    @endif
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="mb-3" class="pl-5">
                                <label for="kuota" class="form-label">Kuota Penerimaan Asisten</label>
                                <input type="number" name="kuota" id="kuota" class="form-control @error('kuota') is-invalid @enderror" value="{{ $mku_program->kuota }}">

                                @error('kuota')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div> 
        
                    <label for="syarat" class="form-label">Syarat & Ketentuan</label>
                        <div class="input-group">
                            <textarea name="syarat" id="syarat"  class="form-control @error('syarat') is-invalid @enderror" aria-label="With textarea" >{{ $mku_program->syarat }}</textarea>

                            @error('syarat')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
            
                    <label for="kualifikasi" class="form-label">Kualifikasi</label>
                        <div class="input-group">
                            <textarea name="kualifikasi" id="kualifikasi"  class="form-control @error('kualifikasi') is-invalid @enderror" aria-label="With textarea" >{{ $mku_program->kualifikasi }}</textarea>
                                @error('kualifikasi')
                                   <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                        </div>


                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
            
            </form>
        </div>
    </div>
    {{-- <a class="pl-5" href="{{ route('.index') }}"><button type="submit" class="btn btn-primary" >Cancle</button></a> --}}
@endsection
