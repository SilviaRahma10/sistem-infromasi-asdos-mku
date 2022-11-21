@extends('layouts.main')
@section('content')

<div class="breadcrumbs" data-aos="fade-in">
    <div class="container">
      <h2>Password</h2>
    </div>
  </div>
    <div class="box-0-0-2 contentContainer-0-0-1473">

        <form class="pl-5">
            @csrf
            <br>
            <div class="container-fluid">
                <fieldset disabled>

                <div class="mb-3" class="pl-5">
                    <label for="name" class="form-label">Name </label>
                    <input type="text" name="name" id="name" class="form-control" value="{{ auth()->user()->name }}" readonly>
                </div>

                <div class="mb-3" class="pl-5">
                    <label for="password" class="form-label">Password</label>
                    <input type="text" name="password" id="password" class="form-control" value="{{ auth()->user()->password }}" readonly>
                </div>
            </fieldset>
            </div>

            <button type="submit" class="btn btn-danger" ><a href="{{route('mahasiswa.editPassword') }}" style="color:white">Ubah Password</a></button>


                
    </form>
    </div>
               

    <script src="{{ url('themes/form/form.js') }}"></script>


@endsection
