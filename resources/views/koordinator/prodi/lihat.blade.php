@extends('layouts.mainKoordinator')
@section('title', 'Detail Prodi')

@section('content')

  <div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Detail {{ $prodi->prodi_name}}</h1>
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <a href="{{ route('prodi.data') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
      class="fas fa-arrow-left fa-sm text-white-50"></i> Kembali</a>
    </div>

    {{-- <a href="{{ route('prodi.tambah', $fakultas->id) }}"><button type="submit" class="btn btn-primary">Tambah Prodi</button></a>
    <br><br> --}}

    <div class="card shadow mb-4">
      <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Data Program Studi</h6>
      </div>
      <form class="p-5">
        @csrf
        
        <div class="container-fluid">
          <fieldset disabled>
            <div class="mb-3" class="pl-5">
              <label for="nama_prodi" class="form-label">Nama Program Studi</label>
              <input type="text" name="nama_prodi" id="nama_prodi" class="form-control" value="{{ $prodi->prodi_name }}">
            </div>

            <div class="mb-3" class="pl-5">
              <label for="fakultas_id" class="form-label">Fakultas</label>
              <input type="text" name="fakultas_id" id="fakultas_id" class="form-control" value="{{ $prodi->fakultas->faculty_name }}" >
            </div>

            <div class="mb-3" class="pl-5">
              <label for="kode_prodi" class="form-label">Kode Program Studi</label>
              <input type="text" name="kode_prodi" id="kode_prodi" class="form-control" value="{{ $prodi->code }}">
            </div>

            <div class="mb-3" class="pl-5">
              <label for="akreditasi" class="form-label">Akreditasi</label>
              <input type="text" name="akreditasi" id="akreditasi" class="form-control" value="{{ $prodi->accreditation }}">
            </div>

            <div class="mb-3" class="pl-5">
              <label for="jenjang" class="form-label">Jenjang</label></label>
              <input type="text" name="jenjang" id="jenjang" class="form-control" value="{{ $prodi->level }}" >
            </div>
          </fieldset>
        </div>

      <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered " id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Id Kelas</th>
                        <th>Nama Kelas</th>
                    </tr>
                </thead>
                <tbody>
                  @foreach ($prodi->prodikelas as $prodikls)
                     <tr>
                       <td>{{ $prodikls->id }}</td>
                       <td>{{ $prodikls->nama_kelas }}</td>
                    </tr>
                   @endforeach
                </tbody>
            </table>
          </div> 
        </div> 
      </form>
    </div> 
  </div>
@endsection