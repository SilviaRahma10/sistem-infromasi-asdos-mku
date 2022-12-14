@extends('layouts.mainKoordinator')
@section('title', 'MKU program')
@section('content')

@section('custom_head')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.13.1/cr-1.6.1/r-2.4.0/sc-2.0.7/sb-1.4.0/datatables.min.css"/>
@endsection

<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">MKU Program</h1>
    <br>

    {{-- <form action="{{ route('mkuprogram.search') }}" method="GET" class="d-none d-sm-inline-block form-inline mr-auto ml-md-3  my-md-0 navbar-search" style="float: right;">
        <div class="input-group pull-right" style="color:white">
                <input type="search" class="form-control bg-white border-0 small" placeholder="Cari Data MKU Program" name="search">
                <div class="input-group-append">
                    <button class="btn btn-primary" type="submit">
                        <i class="fas fa-search fa-sm"></i>
                    </button>
                </div>
            </div>
    </form> --}}
   

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <div>
            <a href="{{ route('mkuprogram.tambah') }}"><button type="submit" class="btn btn-primary">
                <i class="fas fa-folder-plus"></i>
                Tambah mku program</button></a>
        </div>
    </div>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Program Studi</h6>
        </div>


        <div class="card-body">
            <div class="table-responsive">
                <table class="table" id="dataTable" width="100%" cellspacing="0" >
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tahun Akademik</th>
                        <th>Semester</th>
                        <th>Tanggl Buka</th>
                        <th>Tanggal Tutup</th>
                        <th>Status</th>
                        <th>Kode MKU</th>
                        <th>Nama MKU</th>
                        <th>Kuota Penerimaan Asiten</th>
                        <th>syarat & ketentuan</th>
                        <th>kualifikasi</th>   
                        <th></th>                    
                        <th>Aksi</th>
                        <th></th>
                    </tr>
                </thead>

                <tbody>
                    @php
                        $no=1;
                    @endphp
                        @foreach ($mku_program as $index => $mkuprogram )
                            <tr>
                                <th scope="row"> {{ $index + $mku_program->firstItem() }}</th>
                                <td>{{ $mkuprogram->program->tahun_ajaran->tahun }}</td>
                                <td>
                                    @if($mkuprogram->program->tahun_ajaran->semester==1)
                                        Ganjil
                                    @else
                                        Genap
                                    @endif
                                
                                </td>
                                <td>{{ $mkuprogram->program->tanggal_buka}}</td>
                                <td>{{ $mkuprogram->program->tanggal_tutup }}</td>
                                <td>
                                    @if($mkuprogram->program->is_active==0)
                                        non-aktif
                                    @else
                                        aktif
                                    @endif
                                
                                </td>
                                <td>{{ $mkuprogram->mku->kode }}</td>
                                <td>{{ $mkuprogram->mku->nama }}</td>
                                <td>{{ $mkuprogram->kuota }}</td>
                                <td>{{ $mkuprogram->syarat }}</td>
                                <td>{{ $mkuprogram->kualifikasi }}</td>
                                <td>
                                <a href="{{ route('mkuprogram.lihat', $mkuprogram->id) }}"><button type="button" class="btn btn-primary"> 
                                    <i class="fas fa-sharp fa-eye"></i>  
                                    </button> </a>
                                </td>

                               <td>
                                <a href="{{ route('mkuprogram.edit',$mkuprogram->id) }}"><button type="button" class="btn btn-warning"> 
                                    <i class="fas fa-pencil-alt"></i>  
                                </button> </a>
                                </td>

                                <td>
                                <a href="#" class="btn btn-danger remove-btn" data-id="{{ $mkuprogram->id }}">
                                    <i class="fas fa-trash-alt"></i>
                                </a>
                                </td>


                                
                            </tr>
                        @endforeach  
                    </tbody>
                </table>
                <div style="float: right">
                    {{ $mku_program->links() }}
                </div>
            </div><br>
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
    @foreach ($mku_program as $mkuprogram)
        <form action="{{ route('mkuprogram.destroy', $mkuprogram->id) }}" id="delete-form-{{ $mkuprogram->id }}" method="post">
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
                    title: 'apakah anda yakin hapus mku program?',
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
