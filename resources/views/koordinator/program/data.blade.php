@extends('layouts.mainKoordinator')
@section('title', 'data MKU')
@section('content')

@section('custom_head')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.13.1/cr-1.6.1/r-2.4.0/sc-2.0.7/sb-1.4.0/datatables.min.css"/>
@endsection


<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Progam MKU</h1>
    <br>
    <div class="row justify-content-between">
        @if(auth()->user()->role == 'admin')
          <div class="col-4">
            <a href="{{ route('program.tambah') }}"><button type="submit" class="btn btn-primary">
              <i class="fas fa-plus"></i>Tambah Program</button></a><br><br>
          </div> 
        @endif
 
        <form action="" method="GET">
          <div class="input-group">
            <input type="date" class="form-control" name="tanggal" id="tanggal"
               aria-describedby="basic-addon2"
                 @if (!empty($_GET['tanggal'])) value ={{ $_GET['tanggal'] }} 
                                
                 @else @endif>
                 <button class="input-group-text text-white bg-primary " id="basic-addon2"
                 type="submit"><i class="fas fa-search fa-sm"></i></button>

          </div>
        </form>
    </div>
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Data Progamram MKU</h6>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Tahun Ajaran</th>
                                    <th>semester</th>
                                    <th>Tanggal Buka</th>
                                    <th>Tanggal Tutup</th>
                                    <th>Status</th>

                                    @if(auth()->user()->role == 'koordinator')
                                      
                                      <th>Tambah MKU</th>
                                    @else
                                      <th></th>
                                      <th>aksi</th>
                                      <th></th> 
                                    @endif 
                                </tr>
                            </thead>
                            <tbody>
                              @php
                                $no=1;
                              @endphp
                                @foreach ($programs as $index => $program)
                                <tr>
                                  <th scope="row"> {{ $index + $programs->firstItem() }}</th>
                                  <td>{{ $program->tahun_ajaran->tahun }}</td>
                                  <td>
                                      @if($program->tahun_ajaran->semester==1)
                                          Ganjil
                                      @else
                                          Genap
                                      @endif
                
                                  <td>{{ $program->tanggal_buka }}</td>
                                  <td>{{ $program->tanggal_tutup }}</td>
                                  <td>
                                        @if($program->is_active ==1)
                                          Aktif
                                        @else
                                          Non-Aktif
                                        @endif
                                    </td>
                                    
                                    @if( auth()->user()->role == 'koordinator')
                                    <td>
                                      <a href="{{ route('mkuprogram.tambah', $program->id) }}"><button type="submit" class="btn btn-primary"> 
                                        <i class="fas fa-folder-plus"></i>
                                        </button> </a>
                                    </td>

                                    @else

                                    <td>
                                      <a href="{{ route('program.lihat', $program->id) }}"><button type="submit" class="btn btn-primary"> 
                                      <i class="fas fa-sharp fa-eye"></i>  
                                      </button> </a>
                                    </td>
                                    
                                    <td>
                                      <a href="{{ route('program.edit', $program->id) }}"><button type="submit" class="btn btn-warning"> 
                                        <i class="fas fa-pencil-alt"></i>  
                                      </button> </a>
                                    </td>
                                    
                                    <td>
                                      <a href="#" class="btn btn-danger remove-btn" data-id="{{ $program->id }}">
                                        <i class="fas fa-trash-alt"></i>
                                      </a>
                                    </td>
                                    @endif
                                  
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div style="float: right">
                          {{ $programs->links() }}
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
  @foreach ($programs as $program)
  <form action="{{ route('program.destroy', $program->id) }}" id="delete-form-{{ $program->id }}" method="post">
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
  title: 'apakah anda yakin hapus program?',
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