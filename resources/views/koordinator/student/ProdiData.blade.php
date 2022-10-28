{{-- @extends('layouts.mainKoordinator')
@section('title', 'data mahasiswa ')
@section('content')

<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Tables</h1>
    <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
        For more information about DataTables, please visit the <a target="_blank"
            href="https://datatables.net">official DataTables documentation</a>.</p>
           
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header  py-3">
            <h6 class="m-0 font-weight-bold text-primary">Categori Prodi mahasiswa</h6>
        </div>
        
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Kode</th>
                            <th>Program Studi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($prodis as $prodi)
                         <tr>
                            <td>{{ $prodi->code }}</td>
                            <td>{{ $prodi->prodi_name }}</td>
                           <td>
                             <a href="{{ route('student.data', $prodi->id) }}"><button type="submit" class="btn btn-primary">Data Mahasiswa</button> </a>
                             <br><br>
                           </td>
                         </tr>
                         @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
  
  </div>
  @endsection --}}