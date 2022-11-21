@extends('layouts.mainKoordinator')
@section('title', 'Lihat Kelas')

@section('content')

  <div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Detail {{ $kelas->nama}}</h1>
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <a href="{{ route('kelas.data') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
      class="fas fa-arrow-left fa-sm text-white-50"></i> Kembali</a>
    </div>
    <div class="card shadow mb-4">
      <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Data Kelas</h6>
      </div>

      <form class="p-5">
        @csrf
        <div class="container-fluid">
          <fieldset disabled>
            {{-- <div class="mb-3" class="pl-5">
                <label for="id_kelas" class="form-label">Id Kelas</label>
                <input type="number" name="id_kelas" id="id_kelas" class="form-control" value="{{ $kelas->id }}" >
            </div> --}}

            <div class="mb-3" class="pl-5">
              <label for="nama_kelas" class="form-label">Nama kelas</label>
              <input type="text" name="nama_kelas" id="nama_kelas" class="form-control" value="{{ $kelas->nama }}" >
           </div>

          <div class="row">
            <div class="col-md-6">
              <div class="mb-3" class="pl-5">
                <label for="kode_mku" class="form-label">Kode Mku</label>
                <input type="text" name="kode_mku" id="kode_mku" class="form-control" value="{{ $kelas->mku_prodi->mku->kode}}" >
              </div>
            </div>

            <div class="col-md-6">
              <div class="mb-3" class="pl-5">
                <label for="mku_name" class="form-label">Nama Mku</label>
                <input type="text" name="mku_name" id="mku_name" class="form-control" value="{{ $kelas->mku_prodi->mku->nama }}">
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-6">
              <div class="mb-3" class="pl-5">
                <label for="kode_prodi" class="form-label">Kode Program Studi</label> 
                <input type="text" name="kode_prodi" id="kode_prodi" class="form-control" value="{{ $kelas->mku_prodi->prodi->kode }}" >
              </div>
            </div>

            <div class="col-md-6">
              <div class="mb-3" class="pl-5">
                <label for="prodi_name" class="form-label">Nama Program Studi</label>
                <input type="text" name="prodi_name" id="prodi_name" class="form-control" value="{{ $kelas->mku_prodi->prodi->nama }}" >
            </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-6">
              <div class="mb-3" class="pl-5">
                <label for="hari" class="form-label">Hari</label>
                <input type="text" name="hari" id="hari" class="form-control" value="{{ $kelas->hari}}">
              </div>
            </div>

            <div class="col-md-6">
              <div class="mb-3" class="pl-5">
                <label for="waktu" class="form-label">Waktu</label>
                <input type="text" name="waktu" id="waktu" class="form-control" value="{{ $kelas->waktu}}">
              </div>
            </div>
          </div>



            <div class="mb-3" class="pl-5">
              <label for="ruang" class="form-label">Ruang</label>
              <input type="text" name="ruang" id="ruang" class="form-control" value="{{ $kelas->ruang}}">
            </div>

            <label for="" class="form-label">Dosen Pengampu</label>
                  <div class="table-responsive">
                      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" >
                        <thead>
                            <tr>
                                <th>Nama Dosen</th>
                                <th>NIP</th>
                                
                            </tr>
                        </thead>

                        <tbody>
                              @foreach ($dosenpengampu as $dospem )
                                    <tr>
                                      <td>{{ $dospem->dosen->nama }}</td>
                                      <td>{{ $dospem->dosen->nip }}</td>
                        
                                    </tr>
                                  </div>
                              @endforeach 
                          </tbody>
                      </table>
          </fieldset>
        </div>
      </form>
    </div> 
  </div> 
@endsection