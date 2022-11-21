@extends('layouts.main')
@section('content')

<div class="breadcrumbs" data-aos="fade-in">
    <div class="container">
      <h2>PENDAFTARAN ASISTEN DOSEN</h2>
      <p>Lengkapi Data Dan Unggah Dokumen Pendaftaran</p>
    </div>
  </div>
    <div class="box-0-0-2 contentContainer-0-0-1473">

        <form class="pl-5" action="{{ route('mahasiswa.simpan', $mku_program->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <br>
            <div class="container-fluid">
                <div class="mb-3" class="pl-5">
                    <label for="nilai_matkul" class="form-label">Nilai MKU yang Didaftari</label>
                    <br>
                    <select id="nilai_matkul" name="nilai_matkul" class="form-control @error('nilai_matkul') is-invalid @enderror" value="{{ old('nilai_matkul') }}">
                        <option selected disabled>Pilih</option>
                        <option>A</option>
                        <option>A-</option>
                        <option>B+</option>
                        <option>B</option>
                    </select>

                    @error('nilai_matkul')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

               
                    {{-- <div class="form-group"> --}}
                    <div class="mb-3">
                        <label for="KRS">KRS Terbaru</label><br>
                        <input type="file" name="KRS" class="form-control @error('KRS') is-invalid @enderror" value="{{ old('KRS') }}" id="KRS">

                        @error('KRS')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
               

                
                    {{-- <div class="form-group"> --}}
                    <div class="mb-3">
                        <label for="KHS">KHS Terbaru</label><br>
                        <input type="file" name="KHS" class="form-control @error('KHS') is-invalid @enderror" value="{{ old('KHS') }}" id="KHS">

                        @error('KHS')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
               
  
                
                    {{-- <div class="form-group"> --}}
                    <div class="mb-3">
                        <label for="surat_rekomendasi">Surat Rekomendasi</label><br>
                        <input type="file" name="surat_rekomendasi" class="form-control @error('surat_rekomendasi') is-invalid @enderror" value="{{ old('surat_rekomendasi') }}" id="KHS" id="surat_rekomendasi">

                        @error('surat_rekomendasi')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div style="text-align: center; padding-top:20px; padding:bottom :30px">
                        <button type="submit" class="btn" style="background: #15246a; color:white">Daftar</button> 
                    </div>
            </div>
            
    </form>
    </div>
               

    <script src="{{ url('themes/form/form.js') }}"></script>


@endsection
