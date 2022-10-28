@extends('layouts.mainKoordinator')
@section('title', 'Edit Koordinator')

@section('content')
<div class="container-fluid">
  <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <a href="{{ route('coordinator.data') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
      class="fas fa-arrow-left fa-sm text-white-50"></i> Kembali</a>
    </div>

    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Masukkan Data Fakultas</h6>
      </div>
      
      <form class="pl-5" action="{{ route('coordinator.update', $coordinator->id) }}" method="POST">
        @csrf
        @method('PUT')
          <br>
          <div class="mb-3" class="pl-5">
            <label for="nip" class="form-label">Nip</label>
            <input type="number" name="nip" id="nip" class="form-control" value="{{ $coordinator->nip }}">
          </div>

          <div class="mb-3" class="pl-5">
            <label for="nidn" class="form-label">Nidn</label>
            <input type="number" name="nidn" id="nidn" class="form-control" value="{{ $coordinator->nidn }}" >
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
              <label for="no_hp" class="form-label">No HP</label>
              <input type="number" name="no_hp" id="No_Hp" class="form-control" value="{{ $coordinator->no_hp }}">
            </div>

            <div class="mb-3" class="pl-5">
                <label for="status" class="form-label">Status</label>
                <br>
                <select id="status" name="status" class="form-select">
                    <option>{{  $coordinator->status  }}</option>
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
          
