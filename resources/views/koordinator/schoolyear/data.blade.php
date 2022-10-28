@extends('layouts.mainKoordinator')
@section('title', 'Data tahun akademik')
@section('content')


<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Tahun Akademik</h1>

        
            <a href="{{ route('school_year.tambah') }}"><button type="submit" class="btn btn-primary">  
                <i class="fas fa-calendar-plus"></i>
                Tambah</button></a>
            <br><br>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Tahun Akademik</h6>
        </div>
        
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Tahun Ajaran</th>
                            <th>Semester</th>
                            <th>status</th>
                            <th>Aksi</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($schoolyears as $schoolyear)
                         <tr>
                           <td>{{ $schoolyear->id }}</td>
                           <td>{{ $schoolyear->school_year}}</td>
                           <td>{{ $schoolyear->semester }}</td>
                           <td>
                                 @if($schoolyear->is_active  == 1)
                                    aktif
                                @else
                                     nonaktif
                                 @endif
                        
                            </td>
                           <td>
                             <a href="{{ route('school_year.lihat', $schoolyear->id) }}"><button type="submit" class="btn btn-primary">
                                <i class="fas fa-sharp fa-eye"></i>    
                            </button> </a>
                            </td>
                            <td>
                             <a href="{{ route('school_year.edit', $schoolyear->id) }}"><button type="submit" class="btn btn-warning">
                                <i class="fas fa-pencil-alt"></i>    
                            </button> </a>
                           </td>
                         </tr>
                         @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
  
  </div>
  @endsection