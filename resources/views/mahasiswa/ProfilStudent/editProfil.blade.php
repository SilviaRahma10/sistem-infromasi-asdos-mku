@extends('layouts.main')
@section('title', 'edit data diri')
@section('content')

  <div class="breadcrumbs" data-aos="fade-in">
      <div class="container">
        <h2> Edit Profile</h2>
      </div>
  </div>

  <div class="box-0-0-2 contentContainer-0-0-1473">
        <form class="pl-5" action="{{ route('mahasiswa.update') }}" method="POST">
            @csrf
            @method('PUT')
            <br>
            <div class="container-fluid">

                <div class="mb-3" class="pl-5">
                    <label for="name" class="form-label">Nama Lengkap</label>
                    <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ auth()->user()->name }}">
                
                    
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3" class="pl-5">
                    <label for="npm" class="form-label">NPM</label>
                    <input type="text" name="npm" id="npm" class="form-control @error('npm') is-invalid @enderror" value="{{ auth()->user()->mahasiswa->npm }}">
                
                                        
                    @error('npm')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                 </div>

                {{-- <div class="mb-3" class="pl-5">
                    <label for="prodi" class="form-label">Program Studi</label>
                    <input type="text" name="prodi" id="prodi" class="form-control" value="{{ auth()->user()->mahasiswa->prodi->nama }}">
                </div> --}}

                <div class="mb-3" class="pl-5">
                    <label for="prodi_id" class="form-label">Program Studi</label>
                    <br>
                    <select id="prodi_id" name="prodi_id" class="form-control @error('prodi_id') is-invalid @enderror">
                      <option value="{{ auth()->user()->mahasiswa->prodi_id }}">{{ auth()->user()->mahasiswa->prodi->nama }}</option>
                      @foreach ($prodis as $prodi)
                        <option value="{{ $prodi->id }}">{{ $prodi->nama }}</option>
                      @endforeach
                    </select>

                                        
                    @error('prodi_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3" class="pl-5">
                    <label for="angkatan" class="form-label">Angkatan</label>
                    <input type="year" name="angkatan" id="angkatan" class="form-control @error('angkatan') is-invalid @enderror" value="{{ auth()->user()->mahasiswa->angkatan }}">
                
                                    
                    @error('angkatan')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3" class="pl-5">
                    <label for="no_hp" class="form-label">NO HP</label>
                    <input type="text" name="no_hp" id="no_hp" class="form-control @error('no_hp') is-invalid @enderror" value="{{ auth()->user()->mahasiswa->no_hp }}">
                
                                        
                    @error('no_hp')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3" class="pl-5">
                    <label for="email" class="form-label">Email</label>
                    <input type="text" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{ auth()->user()->email }}">
                
                                        
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                 </div>

                <div class="mb-3" class="pl-5">
                    <label for="address" class="form-label">Alamat</label>
                    <input type="text" name="address" id="address" class="form-control @error('address') is-invalid @enderror" value="{{ auth()->user()->mahasiswa->address }}">

                    @error('address')
                      <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>


                <div class="mb-3" class="pl-5">
                    <label for="gender" class="form-label">Jenis Kelamin</label>
                    <br>
                    <select id="gender" name="gender" class="form-control @error('gender') is-invalid @enderror">
                      <option value="{{ auth()->user()->mahasiswa->gender }}"> {{ auth()->user()->mahasiswa->gender}}</option>
                      <option >laki-laki</option>
                      <option >perempuan</option>
                    </select>

                    @error('gender')
                      <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div style="text-align: center; padding-top:20px; padding:bottom :30px">
              <a href="{{route('mahasiswa.update')}}"><button type="submit" class="btn btn-danger" style="align-items: center"> 
                  Update
              </button> </a>
            </div>    
        </form>
  </div>
  <script src="{{ url('themes/form/form.js') }}"></script>


@endsection
