@extends('layouts.mainKoordinator')
@section('title', 'Edit Koordinator')

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
        <fieldset disabled>
          <br>
          {{-- {{ auth()->user()->name }} --}}

          <div class="mb-3" class="pl-5">
            <label for="name" class="form-label">Nama </label> 
            <input type="text" name="name" id="name" class="form-control" value="{{ auth()->user()->name }}">
          </div>

          <div class="mb-3" class="pl-5">
            <label for="nip" class="form-label">Nip</label>
            <input type="number" name="nip" id="nip" class="form-control" value="">
          </div>
        
          <div class="mb-3" class="pl-5">
            <label for="nidn" class="form-label">Nidn</label>
            <input type="number" name="nidn" id="nidn" class="form-control" value="">
          </div>


          <div class="mb-3" class="pl-5">
            <label for="address" class="form-label">Alamat</label>
            <input type="text" name="address" id="address" class="form-control" value="">
          </div>

            <div class="mb-3" class="pl-5">
              <label for="No_Hp" class="form-label">No HP</label>
              <input type="number" name="No_Hp" id="No_Hp" class="form-control" value="">
            </div> 

            <div class="mb-3" class="pl-5">
              <label for="email" class="form-label">Email </label> 
              <input type="text" name="email" id="email" class="form-control" value="{{ auth()->user()->email }}">
            </div>

            <div class="mb-3" class="pl-5">
              <label for="password" class="form-label">Password </label> 
              <input type="text" name="password" id="password" class="form-control" value="{{ auth()->user()->password }}">
            </div>

    
        </fieldset>
      <br><br>
      </div>
    </form>
    <br>
  {{-- <a class="pl-5" href="{{ route('.index') }}"><button type="submit" class="btn btn-primary" >Cancle</button></a> --}}
  @endsection
          
