@extends('layouts.mainKoordinator')
@section('title', 'fakultas')
@section('content')

@section('custom_head')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.13.1/cr-1.6.1/r-2.4.0/sc-2.0.7/sb-1.4.0/datatables.min.css"/>
@endsection


<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Fakultas</h1>
            <br>
            <a href="{{ route('fakultas.tambah') }}"><button type="submit" class="btn btn-primary">
                <i class="fas fa-plus"></i>
                Tambah</button></a>
                
                {{-- <form action="{{ route('fakultas.search') }}" method="GET" class="d-none d-sm-inline-block form-inline mr-auto ml-md-3  my-md-0 navbar-search" style="float: right;">
                    <div class="input-group pull-right" style="color:white">
                        <input type="search" class="form-control bg-white border-0 small" placeholder="Cari Data Fakultas" name="search">
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="submit">
                                <i class="fas fa-search fa-sm"></i>
                            </button>
                        </div>
                    </div>
                </form> --}}
            <br><br>


    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Fakultas</h6>
        </div>
        
        <div class="card-body">
            <div class="table-responsive">
                <table class="table" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Fakultas</th>
                            <th>kode Fakultas</th>
                            <th></th>
                            <th>Aksi</th>
                            <th></th>
                            {{-- <th>Aksi</th> --}}
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $no=1;
                        @endphp
    
                        @foreach ($fakultas as $index => $fak)
                         <tr>
                            <th scope="row"> {{ $index + $fakultas->firstItem() }}</th>
                           <td>{{ $fak->nama  }}</td>
                           <td>{{ $fak->kode }}</td>
                            {{-- <td>
                                <a href="{{ route('prodi.tambah', $fakultas->id) }}"><button type="submit" class="btn btn-primary">Tambah prodi</button> </a>
                            </td> --}}   
                            <td>
                                    <a href="{{ route('fakultas.lihat', $fak->id) }}"><button type="submit" class="btn btn-primary">
                                        <i class="fas fa-sharp fa-eye"></i>
                                    </button> </a>
                                </td>
                                <td>
                                    <a href="{{ route('fakultas.edit', $fak->id) }}"><button type="submit" class="btn btn-warning">
                                        <i class="fas fa-pencil-alt"></i>
                                    </button> </a>
                                </td>
                                <td>
                                    <a href="#" class="btn btn-danger remove-btn" data-id="{{ $fak->id }}">
                                        <i class="fas fa-trash-alt"></i>
                                    </a>
                                </td>
                          
                         </tr>
                         @endforeach
                    </tbody>
                </table>
                <div style="float: right">
                    {{ $fakultas->links() }}
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
  @foreach ($fakultas as $fak)
  <form action="{{ route('fakultas.destroy', $fak->id) }}" id="delete-form-{{ $fak->id }}" method="post">
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
                let deleteForm = document.querySelector('#delete-form-'+ id);

                Swal.fire({
  title: 'apakah anda yakin hapus fakultas?',
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