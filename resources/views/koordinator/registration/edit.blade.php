@extends('layouts.mainKoordinator')
@section('title', 'data pendaftar')

@section('content')

  <div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Detail {{ $registration->mahasiswa->user->name }}</h1>
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <a href="{{ route('registration.data') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
      class="fas fa-arrow-left fa-sm text-white-50"></i> Kembali</a>
    </div>
    <div class="card shadow mb-4">
      <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Data pendaftar mku {{  $registration->mku->nama }}</h6>
      </div>
      
        <form class="pl-5" action="{{ route('registration.update', $registration->id) }}" method="POST">
          @csrf
          @method('PUT')
          <br>
        
        <div class="container-fluid">
          
            <div class="mb-3" class="pl-5">
              <label for="id_registration" class="form-label">Id Pendaftaran</label>
              <input type="id" name="id_registration" id="id_registration" class="form-control" value="{{ $registration->id }}" readonly>
            </div>

            <div class="row">
              <div class="col-md-6">
                <div class="mb-3" class="pl-5">
                  <label for="student_name" class="form-label">Nama Mahasiswa</label>
                  <input type="text" name="student_name" id="student_name" class="form-control" value="{{ $registration->mahasiswa->user->name }}" readonly>
                </div>
              </div>

              <div class="col-md-6">
                <div class="mb-3" class="pl-5">
                  <label for="student_npm" class="form-label">NPM Mahasiswa</label>
                  <input type="text" name="student_npm" id="student_npm" class="form-control" value="{{ $registration->mahasiswa->npm }}" readonly>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-6">
                <div class="mb-3" class="pl-5">
                  <label for="student_email" class="form-label">Email Mahasiswa</label>
                  <input type="text" name="student_email" id="student_email" class="form-control" value="{{ $registration->mahasiswa->user->email }}" readonly>
                </div>
              </div>

              <div class="col-md-6">
                <div class="mb-3" class="pl-5">
                  <label for="angkatan" class="form-label">Angkatan</label>
                  <input type="text" name="angkatan" id="angkatan" class="form-control" value="{{ $registration->mahasiswa->angkatan }}" readonly>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-6">
                <div class="mb-3" class="pl-5">
                  <label for="prodi" class="form-label">Prodi Asal</label>
                  <input type="text" name="prodi" id="prodi" class="form-control" value="{{ $registration->mahasiswa->prodi->nama }}" readonly>
                </div>
              </div>

              <div class="col-md-6">
                <div class="mb-3" class="pl-5">
                  <label for="kode_prodi" class="form-label">Kode Prodi Asal</label>
                  <input type="text" name="kode_prodi" id="kode_prodi" class="form-control" value="{{ $registration->mahasiswa->prodi->kode }}" readonly>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-6">
                 <div class="mb-3" class="pl-5">
                  <label for="school_year" class="form-label">Tahun Ajaran</label>
                  <input type="text" name="school_year" id="school_year" class="form-control" value="{{ $registration->program->tahun_ajaran->tahun }}" readonly>
                </div>
              </div>

              <div class="col-md-6">
                <div class="mb-3" class="pl-5">
                  <label for="semester" class="form-label">Semester</label>
                      @if($registration->program->tahun_ajaran->semester==1)
                        <input type="text" name="semester" id="semester" class="form-control" value="ganjil" readonly >
                      @else($registration->program->tahun_ajaran->semester==1)
                        <input type="text" name="semester" id="semester" class="form-control" value="genap" readonly>
                      @endif
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-6">
                <div class="mb-3" class="pl-5">
                    <label for="generalsubject_name" class="form-label">MKU Yang di Daftar</label></label>
                    <input type="text" name="generalsubject_name" id="generalsubject_name" class="form-control" value="{{ $registration->mku->nama }}" readonly>
                </div>
              </div>

              <div class="col-md-6">
                <div class="mb-3" class="pl-5">
                  <label for="generalsubject_code" class="form-label">Code MKU</label>
                  <input type="text" name="generalsubject_code" id="generalsubject_code" class="form-control" value="{{ $registration->mku->kode }}" readonly>
                </div>
              </div>
            </div>


              <div class="row">
                <div class="col-md-6">
                  <div class="mb-3" class="pl-5">
                    <label for="krs" class="form-label">KRS</label>
                 
                    <img src="{{ asset('storage/'. $registration->KRS) }}" alt="" class="img-fluid">
                   
                    {{-- <input type="text" name="krs" id="krs" class="form-control" value="{{ $registration->KRS}}" readonly> --}}
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="mb-3" class="pl-5">
                    <label for="khs" class="form-label">KHS</label>
                  
                    <img src="{{ asset('storage/'. $registration->KHS) }}" alt="" class="img-fluid">
                  
                    {{-- <input type="text" name="khs" id="khs" class="form-control" value="{{ $registration->KHS}}" readonly> --}}
                    {{-- <input type="text" name="khs" id="khs" class="form-control" value="{{ $registration->KHS}}" readonly> --}}
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-6">
                  <div class="mb-3" class="pl-5">
                    <label for="nilai" class="form-label">Nilai MKU yang di Daftar</label>
                    <input type="text" name="nilai" id="nilai" class="form-control" value="{{ $registration->nilai_matkul}}" readonly>
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="mb-3" class="pl-5">
                    <label for="surat_rekomendasi" class="form-label">Surat Rekomendasi</label>

                    <img src="{{ asset('storage/'. $registration->surat_rekomendasi) }}" alt="" class="img-fluid">

                    {{-- <input type="text" name="surat_rekomendasi" id="surat_rekomendasi" class="form-control" value="{{ $registration->surat_rekomendasi}}" readonly> --}}
                    {{-- <input type="text" name="surat_rekomendasi" id="surat_rekomendasi" class="form-control" value="{{ $registration->surat_rekomendasi}}" readonly> --}}
                  </div>
                </div>
              </div>
         
              <div class="mb-3" class="pl-5">
                <label for="status" class="form-label">Status</label>
                <select id="status" name="status" class="form-control">
                  <option value="{{ $registration->status }}"> 
                    @if($registration->status==0)
                      Belum Verifikasi
                    @elseif($registration->status==1)
                      Terima
                    @else
                      Tolak
                    @endif
                      
                  </option>
                  {{-- <option value="{{ 0 }}">Belum Diverifikasi</option> --}}
                  <option value="{{ 1 }}">Terima</option> 
                  <option value="{{ 2 }}">Tolak</option>
                </select>
              </div>

        </div>

        <button type="submit" class="btn btn-primary">Simpan</button><br><br>
      
      </form>
     
    </div> 
    
  </div> 
@endsection