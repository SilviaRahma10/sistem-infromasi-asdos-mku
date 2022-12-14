@extends('layouts.mainKoordinator')
@section('title', 'Profil Koordinator')

@section('content')
<div class="container-fluid">
  <!-- Page Heading -->
    

    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Profil {{ auth()->user()->name }} </h6>
      </div>
      
      <form class="pl-5" >
        @csrf
        <div class="container-fluid">
        
          <br>
          {{-- {{ auth()->user()->name }} --}}

          <div class="mb-3" class="pl-5">
            <label for="name" class="form-label">Nama </label> 
            <input type="text" name="name" id="name" class="form-control" value="{{ auth()->user()->name }}" readonly>
          </div>

          <div class="mb-3" class="pl-5">
            <label for="nip" class="form-label">nip </label> 
            <input type="text" name="nip" id="nip" class="form-control" value="{{ auth()->user()->koordinator->nip }}" readonly>
          </div>

            <div class="mb-3" class="pl-5">
              <label for="email" class="form-label">Email </label> 
              <input type="text" name="email" id="email" class="form-control" value="{{ auth()->user()->email }}" readonly>
            </div>

            <div class="mb-3" class="pl-5">
              <label for="no_hp" class="form-label">no_hp </label> 
              <input type="text" name="no_hp" id="no_hp" class="form-control" value="{{ auth()->user()->koordinator->no_hp }}" readonly>
            </div>

          <div class="mb-3" class="pl-5">
            <label for="role" class="form-label">Jabatan</label>
            <input type="text" name="role" id="role" class="form-control" value="{{ auth()->user()->role }} {{ auth()->user()->koordinator->mku->nama }}" readonly>
          </div>

      <br><br>
      </div>

      <div style="text-align: center; padding-top:20px; padding:bottom :30px">
        <button type="submit" class="btn btn-danger" ><a href="{{route('koordinator.editProfil') }}" style="color:white">Ubah Profil</a></button>   
      </div>

      <div style="text-align: center; padding-top:20px; padding:bottom :30px">
        <button type="submit" class="btn btn-danger" ><a href="{{route('koordinator.ubahPassword') }}" style="color:white">Ubah Password</a></button>  
      </div>  <br>                 
    </form>
    <br>
  {{-- <a class="pl-5" href="{{ route('.index') }}"><button type="submit" class="btn btn-primary" >Cancle</button></a> --}}
  @endsection
          
