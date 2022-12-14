@extends('layouts.mainKoordinator')
@section('title', 'data koordinator')
@section('content')

@section('custom_head')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.13.1/cr-1.6.1/r-2.4.0/sc-2.0.7/sb-1.4.0/datatables.min.css"/>
@endsection


<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Koordinator Mata Kuliah Umum</h1><br>

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <div>
        <a href="{{ route('koordinator.tambah') }}"><button type="submit" class="btn btn-primary">
            <i class="fas fa-user-plus"></i>
            Tambah</button></a>
        </div>
        
        {{-- <div>
            <form action="{{ route('koordinator.search') }}" method="GET" class="d-none d-sm-inline-block form-inline mr-auto ml-md-3  my-md-0 navbar-search" style="float: right;">
                <div class="input-group pull-right" style="color:white">
                    <input type="search" class="form-control bg-white border-0 small" placeholder="Cari Data Koordinator" name="search">
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="submit">
                            <i class="fas fa-search fa-sm"></i>
                        </button>
                    </div>
                </div>
            </form>
        </div> --}}
    </div>
    <br>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Koordinator MKU</h6>
        </div>
        
        <div class="card-body">
            <div class="table-responsive">
                <table class="table" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>NIP</th>
                            <th>Email</th>
                            <th>No Hp</th>
                            <th>Nama MKU</th>
                            <th>Kode MKU</th>
                            <th></th>
                            <th>Aksi</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                            @php
                                $no=1;
                            @endphp
                        @foreach ($koordinators as $index => $koordinator)
                         <tr>
                            <th scope="row"> {{ $index + $koordinators->firstItem() }}</th>
                            <td>{{ $koordinator->user->name }}</td>
                            <td>{{ $koordinator->nip }}</td>
                            <td>{{ $koordinator->user->email }}</td>
                            <td>{{ $koordinator->no_hp }}</td>
                            <td>{{ $koordinator->mku->nama}}</td>
                            <td>{{ $koordinator->mku->kode }}</td> 
                            <td>
                                <a href="{{ route('koordinator.lihat', $koordinator->id) }}"><button type="submit" class="btn btn-primary">
                                    <i class="fas fa-sharp fa-eye"></i>
                                </button> </a>
                            </td>
                            <td>
                                <a href="{{ route('koordinator.edit', $koordinator->id) }}"><button type="submit" class="btn btn-warning">
                                    <i class="fas fa-pencil-alt"></i>
                                </button> </a>
                            </td>
                            <td>
                                <a href="#" class="btn btn-danger remove-btn" data-id="{{ $koordinator->id }}">
                                    <i class="fas fa-trash-alt"></i>
                                </a>
                            </td>
                           
                         </tr>
                         @endforeach
                    </tbody>
                </table>
                <div style="float: right">
                    {{ $koordinators->links() }}
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
  @foreach ($koordinators as $koordinator)
  <form action="{{ route('koordinator.destroy', $koordinator->id) }}" id="delete-form-{{ $koordinator->id }}" method="post">
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
  title: 'apakah anda yakin hapus koordinator?',
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