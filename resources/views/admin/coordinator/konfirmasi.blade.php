@extends('layouts.mainKoordinator')
@section('title', 'Edit Koordinator')

@section('content')
<div class="container-fluid">
  <!-- Page Heading -->
  <h1 class="h3 mb-2 text-gray-800">konfimasi {{ $coordinator->name }} </h1>

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <a href="{{ route('coordinator.data') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
      class="fas fa-arrow-left fa-sm text-white-50"></i> Kembali</a>
    </div>

    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Konfirmasi data {{ $coordinator->name }} </h6>
      </div>
      
      <form class="pl-5" >
        @csrf
        <div class="container-fluid">
        <fieldset disabled>
          <br>
          <div class="mb-3" class="pl-5">
            <label for="nip" class="form-label">Nip</label>
            <input type="number" name="nip" id="nip" class="form-control" value="{{ $coordinator->nip }}">
          </div>

          <div class="mb-3" class="pl-5">
            <label for="nidn" class="form-label">Nidn</label>
            <input type="number" name="nidn" id="nidn" class="form-control" value="{{ $coordinator->nidn }}">
          </div>

          <div class="mb-3" class="pl-5">
            <label for="name" class="form-label">Nama </label> 
            <input type="text" name="name" id="name" class="form-control" value="{{ $coordinator->name }}">
          </div>


          <div class="mb-3" class="pl-5">
            <label for="address" class="form-label">Alamat</label>
            <input type="text" name="address" id="address" class="form-control" value="{{ $coordinator->address }}">
          </div>

            <div class="mb-3" class="pl-5">
              <label for="No_Hp" class="form-label">No HP</label>
              <input type="number" name="No_Hp" id="No_Hp" class="form-control" value="{{ $coordinator->no_hp }}">
            </div>

            <div class="mb-3" class="pl-5">
                <label for="status" class="form-label">No HP</label>
                <input type="text" name="status" id="status" class="form-control" value="{{  $coordinator->status  }}">
            </div>
        </fieldset>
      <br><br>
      </div>
    </form>
    <br>
  {{-- <a class="pl-5" href="{{ route('.index') }}"><button type="submit" class="btn btn-primary" >Cancle</button></a> --}}
  @endsection
          
