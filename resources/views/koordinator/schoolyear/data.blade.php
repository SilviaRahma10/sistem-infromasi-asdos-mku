@extends('layouts.mainKoordinator')
@section('title', 'Data tahun akademik')
@section('content')


<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Tahun Akademik</h1>

        
            <a href="{{ route('school_year.tambah') }}"><button type="submit" class="btn btn-primary">  
                <i class="fas fa-calendar-plus"></i>
                Tambah</button></a>

                <form action="{{ route('school_year.search') }}" method="GET" class="d-none d-sm-inline-block form-inline mr-auto ml-md-3  my-md-0 navbar-search" style="float: right;">
                    <div class="input-group pull-right" style="color:white">
                        <input type="search" class="form-control bg-white border-0 small" placeholder="Cari Data Tahun Akademik" name="search">
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="submit">
                                <i class="fas fa-search fa-sm"></i>
                            </button>
                        </div>
                    </div>
                </form>
            <br><br>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Tahun Akademik</h6>
        </div>
        
        <div class="card-body">
            <div class="table-responsive">
                <table class="table" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Tahun Ajaran</th>
                            <th>Semester</th>
                           <th></th>
                            <th>Aksi</th>
                            <th></th>
                           
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $no=1;
                        @endphp
                        @foreach ($tahuns as $index => $schoolyear)
                         <tr>
                            <th scope="row"> {{ $index + $tahuns->firstItem() }}</th>
                           <td>{{ $schoolyear->tahun}}</td>
                           <td>
                            @if($schoolyear->semester==1)
                                Ganjil
                            @else
                                Genap
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

                           <td>
                                <a href="#" class="btn btn-danger remove-btn" data-id="{{ $schoolyear->id }}">
                                    <i class="fas fa-trash-alt"></i>
                                </a>
                            </td>

                         </tr>
                         @endforeach
                    </tbody>
                </table>
                <div style="float: right">
                    {{ $tahuns->links() }}
                </div>
            </div>
        </div>
    </div>
  
  </div>
  @endsection

  
@section('custom_html')
@foreach ($tahuns as $schoolyear)
    <form action="{{ route('school_year.destroy', $schoolyear->id) }}" id="delete-form-{{ $schoolyear->id }}" method="post">
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
                title: 'apakah anda yakin hapus Tahun Ajaran?',
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
