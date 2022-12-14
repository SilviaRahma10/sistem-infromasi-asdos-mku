@extends('layouts.mainKoordinator')
@section('title', 'Edit Profil Koordinator')

@section('content')
<div class="container-fluid">
  <!-- Page Heading -->
    

    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Profil {{ auth()->user()->name }} </h6>
      </div><br>

      <form class="pl-5"action="{{ route('koordinator.updatePassword') }}" method="POST">
        @csrf
        @method('PUT')


            <div class="mb-3" class="pl-5">
                    <label for="password" class="form-label">Password Baru</label> 
                    <input type="text" name="password" id="password" class="form-control"  >
            </div>

            <div style="text-align: center; padding-top:20px; padding:bottom :30px">
                <a href="{{route('koordinator.updatePassword')}}"><button type="submit" class="btn btn-danger" style="align-items: center"> 
                    Simpan
                </button> </a>
            </div><br><br>
    </form>
    </div>

        
 

    
    <br>

  @endsection