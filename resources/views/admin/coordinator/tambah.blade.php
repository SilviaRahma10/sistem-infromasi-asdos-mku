@extends('layouts.mainKoordinator')
@section('title', 'Input data diri Koordinator')

@section('content')
<div class="container-fluid">
  <!-- Page Heading -->

    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Masukkan Data Fakultas</h6>
      </div>
      
      <form class="pl-5" action="{{ route('coordinator.simpan') }}" method="POST">
        @csrf
          <br>
          <div class="container-fluid">

            <div class="container-fluid">
              <div class="mb-3" class="pl-5">
                <label for="name" class="form-label">Nama Koordinator</label>
                <input type="text" name="name" id="name" class="form-control" >
              </div>
  
              <div class="mb-3" class="pl-5">
                <label for="email" class="form-label">Email Koordinator</label>
                <input type="text" name="email" id="email" class="form-control" >
              </div>
  
              <div class="mb-3" class="pl-5">
                <label for="password" class="form-label">Password </label>
                <input type="text" name="password" id="password" class="form-control" >
              </div>

            <div class="mb-3" class="pl-5">
              <label for="nip" class="form-label">Nip</label>
              <input type="number" name="nip" id="nip" class="form-control" >
            </div>

            <div class="mb-3" class="pl-5">
              <label for="nidn" class="form-label">Nidn</label>
              <input type="number" name="nidn" id="nidn" class="form-control" >
            </div>

            <div class="mb-3" class="pl-5">
              <label for="address" class="form-label">Alamat</label>
              <input type="text" name="address" id="address" class="form-control" >
            </div>

              <div class="mb-3" class="pl-5">
                <label for="no_hp" class="form-label">No HP</label>
                <input type="number" name="no_hp" id="no_hp" class="form-control" >
              </div>

              <div class="mb-3" class="pl-5">
                  <label for="status" class="form-label">Status</label>
                  <br>
                  <select id="status" name="status" class="form-select">
                    <option value="{{ 1 }}">Pilih Status</option>
                    <option value="{{ 1 }}">Active</option>
                      <option value="{{ 0 }}">Non-Active</option>
                  </select>
                </div>

          <button type="submit" class="btn btn-primary">Simpan</button>
      <br><br>
      </div>
    </form>
    <br>
  {{-- <a class="pl-5" href="{{ route('.index') }}"><button type="submit" class="btn btn-primary" >Cancle</button></a> --}}
  @endsection
          
