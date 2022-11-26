@extends('layouts.main')
@section('content')

    <div class="breadcrumbs" data-aos="fade-in">
        <div class="container">
            <h2>Password</h2>
        </div>
    </div>

    <div class="box-0-0-2 contentContainer-0-0-1473">
        <form class="pl-5"action="{{ route('mahasiswa.updatePassword') }}" method="POST">
            @csrf
            @method('PUT')
            

            <div class="container-fluid">
                <div class="mb-3" class="pl-5">
                    <label for="name" class="form-label">Name </label>
                    <input type="text" name="name" id="name" class="form-control" value="{{ auth()->user()->name }}"readonly>
                </div>

                <div class="mb-3" class="pl-5">
                    <label for="password" class="form-label">Password</label>
                    <input type="text" name="password" id="password" class="form-control" value="{{ auth()->user()->password }}">
                </div>
            </div>

            <div style="text-align: center; padding-top:20px; padding:bottom :30px">
                <a href="{{route('mahasiswa.updatePassword')}}"><button type="submit" class="btn btn-danger" style="align-items: center"> 
                    Simpan
                </button> </a>
            </div>       
        </form>
    </div>
    <script src="{{ url('themes/form/form.js') }}"></script>
@endsection
