@extends('layouts.mainKoordinator')
@section('title', 'data dosen')
@section('content')


<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Dosen</h1>

    <br>
    <a href="{{ route('lecturer.tambah') }}"><button type="submit" class="btn btn-primary">
        <i class="fas fa-user-plus"></i>
        Tambah</button></a>
    <br>
    <form action="{{ route('lecturer.search') }}" method="GET" class="d-none d-sm-inline-block form-inline mr-auto ml-md-3  my-md-0 navbar-search" style="float: right;">
        <div class="input-group pull-right" style="color:white">
            <input type="search" class="form-control bg-white border-0 small" placeholder="Cari Data Dosen" name="search">
            <div class="input-group-append">
                <button class="btn btn-primary" type="submit">
                    <i class="fas fa-search fa-sm"></i>
                </button>
            </div>
        </div>
    </form>
    <br>

    <div class="nav-item dropdown back bg-primary" style="width: max-content; border-radius:8px">
        <a style="color:white" class="nav-link dropdown-toggle" href="#" id="dropdown1" data-toggle="dropdown" arial-haspopup="true" arial-expanded="false">Program studi</a>
        <div class="dropdown-menu" arial-labelledby="dropdown1">
            @foreach($prodis as $prodi)
            <a class="dropdown-item"  href="{{ route('lecturer.pilih', $prodi->id) }}">{{ $prodi->nama }}</a>
            @endforeach
        </div>
      </div>
      <br>


    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Dosen</h6>
        </div>
        
        <div class="card-body">
            <div class="table-responsive">
                <table class="table" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>NIP</th>
                            <th>NIDN</th>
                            <th>Program Studi</th>
                            <th>No Hp</th>
                            <th>Jenis Kelamin</th>
                            <th></th>
                            <th>Aksi</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                            @php
                                $no=1;
                            @endphp
                        @foreach ($lecturers as $index => $lecture)
                         <tr>
                            <th scope="row"> {{ $index + $lecturers->firstItem() }}</th>
                            <td>{{ $lecture->nama }}</td>
                            <td>{{ $lecture->nip }}</td>
                            <td>{{ $lecture->nidn }}</td>
                           <td>{{ $lecture->prodi->nama }}</td>
                           <td>{{ $lecture->no_hp }}</td> 
                           <td>{{ $lecture->jenis_kelamin }}</td> 
                           <td>
                                <a href="{{ route('lecturer.lihat', $lecture->id) }}"><button type="submit" class="btn btn-primary">
                                    <i class="fas fa-sharp fa-eye"></i>
                                </button> </a>
                            </td>
                            <td>
                                <a href="{{ route('lecturer.edit', $lecture->id) }}"><button type="submit" class="btn btn-warning">
                                    <i class="fas fa-pencil-alt"></i>
                                </button> </a>
                            </td>
                            <td>
                                <a href="#" class="btn btn-danger remove-btn" data-id="{{ $lecture->id }}">
                                    <i class="fas fa-trash-alt"></i>
                                </a>
                            </td>
                           
                         </tr>
                         @endforeach
                    </tbody>
                </table>
                <div style="float: right">
                    {{ $lecturers->links() }}
                </div>
            </div>
        </div>
    </div>
  </div>
@endsection

@section('custom_html')
  @foreach ($lecturers as $lecture)
  <form action="{{ route('lecturer.destroy', $lecture->id) }}" id="delete-form-{{ $lecture->id }}" method="post">
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
  title: 'apakah anda yakin hapus dosen?',
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