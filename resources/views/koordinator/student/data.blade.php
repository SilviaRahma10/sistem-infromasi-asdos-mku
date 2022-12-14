@extends('layouts.mainKoordinator')
@section('title', 'data mahasiswa')
@section('content')


@section('custom_head')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.13.1/cr-1.6.1/r-2.4.0/sc-2.0.7/sb-1.4.0/datatables.min.css"/>
@endsection


<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Mahasiswa</h1><br>

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <div>
        <div class="nav-item dropdown back bg-primary" style="width: max-content; border-radius:8px">
          <a style="color:white" class="nav-link dropdown-toggle" href="#" id="dropdown1" data-toggle="dropdown" arial-haspopup="true" arial-expanded="false">Program studi</a>
          <div class="dropdown-menu" arial-labelledby="dropdown1">
              @foreach($prodis as $prodi)
              <a class="dropdown-item"  href="{{ route('student.pilih', $prodi->id) }}">{{ $prodi->nama }}</a>
              @endforeach
          </div>
        </div>
      </div>
    </div>
   

      {{-- <div>
        <form action="{{ route('student.search') }}" method="GET" class="d-none d-sm-inline-block form-inline mr-auto ml-md-3  my-md-0 navbar-search" style="float: right;">
          <div class="input-group pull-right" style="color:white">
              <input type="search" class="form-control bg-white border-0 small" placeholder="Cari Data Mahasiswa"
                value="{{ request()->get('search') }}" name="search">
              <div class="input-group-append">
                  <button class="btn btn-primary" type="submit">
                      <i class="fas fa-search fa-sm"></i>
                  </button>
              </div>
          </div>
        </form>
      </div> 
    </div>--}}
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Mahasiswa</h6>
        </div>
        
        <div class="card-body">
          <div class="table-responsive">
            
                <table class="table " id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Mahasiswa</th>
                            <th>NPM</th>
                            <td>Fakultas</td>
                            <th>Program Studi</th>
                            <th>Angkatan</th>
                            <th>Email</th>
                            <th>No Hp</th>
                            <th>Alamat</th>
                            <th>Jenis Kelamin</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                      @php
                        $no=1;
                      @endphp
                        @foreach ($students as $index => $student)
                        <tr>
                          <th scope="row"> {{ $index + $students->firstItem() }}</th>
                            <td>{{ $student->user->name }}</td>
                            <td>{{ $student->npm }}</td>
                            <td>{{ $student->prodi->fakultas->nama}}</td>
                            <td>{{ $student->prodi->nama}}</td>
                            <td>{{ $student->angkatan }}</td>
                           <td>{{ $student->user->email }}</td>
                           <td>{{ $student->no_hp }}</td>
                           <td>{{ $student->address }}</td>
                           <td>{{ $student->gender }}</td>
                           <td>
                             <a href="{{ route('student.lihat', $student->id) }}"><button type="submit" class="btn btn-primary"> 
                              <i class="fas fa-sharp fa-eye"></i>  
                            </button> </a>
                             <br><br>

                           </td>
                           
                         </tr>

                         @endforeach
                    </tbody>
                </table>
                <div style="float: right">
                  {{ $students->links() }}
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

  
  {{-- @section('custom_html')
  @foreach ($students as $student)
  <form action="{{ route('student.destroy', $students->id) }}" id="delete-form-{{ $students->id }}" method="post">
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
  title: 'apakah anda yakin hapus data mahasiswa?',
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
  @endpush --}}