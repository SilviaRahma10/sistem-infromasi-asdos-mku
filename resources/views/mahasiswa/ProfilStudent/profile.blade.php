@extends('layouts.main')
@section('content')

<div class="breadcrumbs" data-aos="fade-in">
    <div class="container">
      <h2>Profile</h2>
    </div>
  </div>
    <div class="box-0-0-2 contentContainer-0-0-1473">

        <form class="pl-5">
            @csrf
            <br>
            <div class="container-fluid">

                <fieldset disabled>

                <div class="mb-3" class="pl-5">
                    <label for="nama" class="form-label">Nama Lengkap</label>
                    <input type="text" name="nama" id="nama" class="form-control" value="{{ auth()->user()->name }}" readonly>
                </div>

                <div class="mb-3" class="pl-5">
                    <label for="npm" class="form-label">NPM</label>
                    <input type="text" name="npm" id="npm" class="form-control" value="{{ auth()->user()->mahasiswa->npm }}" readonly>
                </div>

                <div class="mb-3" class="pl-5">
                    <label for="prodi" class="form-label">Program Studi</label>
                    <input type="text" name="prodi" id="prodi" class="form-control" value="{{ auth()->user()->mahasiswa->prodi->nama }}" readonly>
                </div>

                <div class="mb-3" class="pl-5">
                    <label for="angkatan" class="form-label">Angkatan</label>
                    <input type="year" name="angkatan" id="angkatan" class="form-control" value="{{ auth()->user()->mahasiswa->angkatan }}" readonly>
                </div>

                <div class="mb-3" class="pl-5">
                    <label for="no_hp" class="form-label">NO HP</label>
                    <input type="text" name="no_hp" id="no_hp" class="form-control" value="{{ auth()->user()->mahasiswa->no_hp }}" readonly>
                </div>

                <div class="mb-3" class="pl-5">
                    <label for="email" class="form-label">Email</label>
                    <input type="text" name="email" id="email" class="form-control" value="{{ auth()->user()->email }}" readonly>
                </div>

                <div class="mb-3" class="pl-5">
                    <label for="address" class="form-label">Alamat</label>
                    <input type="text" name="address" id="address" class="form-control" value="{{ auth()->user()->mahasiswa->address }}" readonly>
                </div>

                
                <div class="mb-3" class="pl-5">
                    <label for="gender" class="form-label">Jenis Kelamin</label>
                    <input type="text" name="gender" id="gender" class="form-control" value="{{ auth()->user()->mahasiswa->gender }}" readonly>
                </div>

            </fieldset>
            </div>
 
    </form>
    </div>
               

    <script src="{{ url('themes/form/form.js') }}"></script>


@endsection
