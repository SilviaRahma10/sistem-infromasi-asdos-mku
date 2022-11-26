@extends('layouts.mainKoordinator')  
@section('title', 'tambah Koordinator')

@section('content')
<div class="container-fluid">
  <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <a href="{{ route('koordinator.data') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
      class="fas fa-arrow-left fa-sm text-white-50"></i> Kembali</a>
    </div>

    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Koordinator</h6>
      </div>

      <form class="pl-5" action="{{ route('koordinator.simpan') }}" method="POST">
        @csrf
        <br>
        <div class="container-fluid">


            <div class="row">
              <div class="col-md-6">
                <div class="mb-3" class="pl-5">
                  <label for="name" class="form-label">Nama Koordinator</label>
                  <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}">

                  @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
              </div>

              <div class="col-md-6">
                <div class="mb-3" class="pl-5">
                  <label for="email" class="form-label">email Koordinator</label>
                  <input type="text" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}">

                  @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-6">
                <div class="mb-3" class="pl-5">
                  <label for="id_mku" class="form-label">Mata Kuliah</label>
                  <br>
                  <select id="id_mku" name="id_mku" class="form-control @error('id_mku') is-invalid @enderror" value="{{ old('id_mku') }}">
                    <option selected disabled>Pilih Mata Kuliah </option>
                      @foreach ($generalsubjects as $generalsubject)
                        <option value="{{ $generalsubject->id }}">{{ $generalsubject->nama }}</option>
                      @endforeach
                  </select>
                  @error('id_mku')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
              </div>

              
              <div class="col-md-6">
                <div class="mb-3" class="pl-5">
                  <label for="password" class="form-label">Password Koordinator</label>
                  <input type="text" name="password" id="password" class="form-control @error('password') is-invalid @enderror" value="{{ old('password') }}">

                  @error('password')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-6">
                <div class="mb-3" class="pl-5">
                  <label for="nip" class="form-label">Nip Koordinator</label>
                  <input type="text" name="nip" id="nip" class="form-control @error('nip') is-invalid @enderror" value="{{ old('nip') }}">

                  @error('nip')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
              </div>

              <div class="col-md-6">
                <div class="mb-3" class="pl-5">
                  <label for="no_hp" class="form-label">no hp Koordinator</label>
                  <input type="text" name="no_hp" id="no_hp" class="form-control @error('no_hp') is-invalid @enderror" value="{{ old('no_hp') }}">

                  @error('no_hp')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
              </div>
            </div>


           <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
        <br><br>
    </form>
  </div>
</div>
  {{-- <a class="pl-5" href="{{ route('.index') }}"><button type="submit" class="btn btn-primary" >Cancle</button></a> --}}
@endsection
          
