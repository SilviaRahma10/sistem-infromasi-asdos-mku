@extends('layouts.mainKoordinator')
@section('title', 'prodi')
@section('content')

@section('custom_head')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.13.1/cr-1.6.1/r-2.4.0/sc-2.0.7/sb-1.4.0/datatables.min.css"/>
@endsection

    <div class="container-fluid">

        <h1 class="h3 mb-2 text-gray-800">Program Studi</h1>
        <br>

            {{-- <form action="{{ route('prodi.search') }}" method="GET" class="d-none d-sm-inline-block form-inline mr-auto ml-md-3  my-md-0 navbar-search" style="float: right;">
                <div class="input-group pull-right" style="color:white">
                        <input type="search" class="form-control bg-white border-0 small" placeholder="Cari Data Program Studi" name="search">
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="submit">
                                <i class="fas fa-search fa-sm"></i>
                            </button>
                        </div>
                    </div>
            </form> --}}
            <br><br>
        
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <div>
                <a href="{{ route('prodi.tambah') }}"><button type="submit" class="btn btn-primary">
                    <i class="fas fa-plus"></i>
                    Tambah Prodi</button></a>
            </div>
             
            <div class="nav-item dropdown back bg-primary" style="width: max-content; border-radius:8px">
                <a style="color:white" class="nav-link dropdown-toggle" href="#" id="dropdown1" data-toggle="dropdown"
                    arial-haspopup="true" arial-expanded="false">Fakultas</a>
                <div class="dropdown-menu" arial-labelledby="dropdown1">
                    @foreach ($fakultas as $faculty)
                        <a class="dropdown-item" href="{{ route('prodi.pilih', $faculty->id) }}">{{ $faculty->nama }}</a>
                    @endforeach
                </div>
            </div>
        </div>
     
        {{-- DataTales Example --}}

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Data Program Studi</h6>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kode Program Studi</th>
                                <th>Nama Prodi</th>
                                <th>Fakultas</th>

                                {{-- <th>Akreditasi</th>
                            <th>Jenjang</th>
                            <th>kelas</th> --}}
                                <th></th>
                                <th>Aksi</th>
                                <th></th>
                             
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $no=1;
                            @endphp

                            @foreach ($prodis as $index =>$prodi)
                            <tr>
                                <th scope="row"> {{ $index + $prodis->firstItem() }}</th>
                                <td>{{ $prodi->kode }}</td>
                                <td>{{ $prodi->nama }}</td>
                                <td>{{ $prodi->fakultas->nama }}</td>

                                
                                <td>
                                    <a href="{{ route('prodi.lihat', $prodi->id) }}"><button type="submit"
                                            class="btn btn-primary">
                                            <i class="fas fa-sharp fa-eye"></i>
                                        </button> </a>
                                </td>
                                <td>
                                    <a href="{{ route('prodi.edit', $prodi->id) }}"><button type="submit"
                                            class="btn btn-warning">
                                            <i class="fas fa-pencil-alt"></i>
                                        </button> </a>
                                </td>
                                <td>
                                    <a href="#" class="btn btn-danger remove-btn" data-id="{{ $prodi->id }}">
                                        <i class="fas fa-trash-alt"></i>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div style="float: right">
                        {{ $prodis->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('custom_js')
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.13.1/cr-1.6.1/r-2.4.0/sc-2.0.7/sb-1.4.0/datatables.min.js"></script>

      <script>
        $(document).ready( function () {
    $('#dataTable').DataTable();
} );
      </script>
  @endpush

@section('custom_html')
    @foreach ($prodis as $prodi)
        <form action="{{ route('prodi.destroy', $prodi->id) }}" id="delete-form-{{ $prodi->id }}" method="post">
            @csrf
            @method('DELETE')
        </form>
    @endforeach
@endsection

@push('custom_js')
    <script>
        let removeBtns = document.querySelectorAll('.remove-btn');
        removeBtns.forEach(btn => {
            btn.addEventListener('click', (e) => {
                e.preventDefault();

                let id = btn.getAttribute('data-id');
                let deleteForm = document.querySelector('#delete-form-' + id);

                Swal.fire({
                    title: 'apakah anda yakin hapus Program Studi?',
                    text: "Anda tidak dapat mengembalikan data yang sudah dihapus!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes'
                }).then((result) => {
                    if (result.isConfirmed) {
                        deleteForm.submit();
                    }
                })
            })
        })
    </script>
@endpush
