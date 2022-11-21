@extends('layouts.mainKoordinator')
@section('title', 'tambah program mku')
@section('content')

    <div class="container-fluid">
        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Tambah Progam Mku yang dibuka</h1>
        <br>

        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <a href="{{ route('program.data') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
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
        
                                <div class="mb-3" class="pl-5">
                                    <label for="id_program" class="form-label">id program </label>
                                    <input type="number" name="id_program" id="id_program" class="form-control" value="{{ $mku_program->program->tahun_ajaran->id }}" readonly>
                                </div>
                                
                            
                            
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
                           

                                <div class="mb-3" class="pl-5">
                                    <label for="id_mata_kuliah" class="form-label">Nama Mku</label>
                                    <br>
                                    <select id="id_mata_kuliah" name="id_mata_kuliah" class="form-control" required>
                                        <option value="{{ $mku_program->mku->id }}">{{ $mku_program->mku->nama }}</option>
                                        @foreach ($generalsubjects as $generalsubject)
                                            <option value="{{ $generalsubject->id }}">{{ $generalsubject->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="mb-3" class="pl-5">
                                    <label for="kuota" class="form-label">Kuota Penerimaan Asisten</label>
                                    <input type="number" name="kuota" id="kuota" class="form-control @error('kuota') is-invalid @enderror" value="{{ $mku_program->kuota }}">

                                    @error('kuota')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
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
