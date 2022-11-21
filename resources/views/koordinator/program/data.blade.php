@extends('layouts.mainKoordinator')
@section('title', 'data MKU')
@section('content')


<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Progam MKU</h1>
    <br>
            <a href="{{ route('program.tambah') }}"><button type="submit" class="btn btn-primary">
              <i class="fas fa-plus"></i>Tambah Program</button></a><br><br>


              <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <div class="row justify-content-between">
                      <div class="col-4">
                        <h6 class="m-0 font-weight-bold text-primary">Data Progamram MKU</h6>
                    </div>
                        <div class="col-4">
                            <div class="row justify-content-end">
                                <form action="" method="GET">
                                    <div class="input-group">
                                        <input type="date" class="form-control" name="tanggal" id="tanggal"
                                            aria-describedby="basic-addon2"
                                            @if (!empty($_GET['tanggal'])) value ={{ $_GET['tanggal'] }} 
                                                
                                            @else @endif>
                                        <button class="input-group-text text-dark" id="basic-addon2"
                                            type="submit">Cari</button>
    
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
    
                </div>

              {{-- <form action="{{ route('program.search') }}" method="GET" class="d-none d-sm-inline-block form-inline mr-auto ml-md-3  my-md-0 navbar-search" style="float: right;">
                <div class="input-group pull-right" style="color:white">
                    <input type="search" class="form-control bg-white border-0 small" placeholder="Cari Data Program" name="search">
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="submit">
                            <i class="fas fa-search fa-sm"></i>
                        </button>
                    </div>
                </div>
            </form> --}}

            <br><br>
    <!-- DataTales Example -->
   

        
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
                            <th>Tambah MKU</th>
                            <th></th>
                            <th>aksi</th>
                            <th></th>  
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
                            <i class="fa-solid fas-layer-plus"></i>
                            <td>
                              <a href="{{ route('mkuprogram.tambah', $program->id) }}"><button type="submit" class="btn btn-primary"> 
                                <i class="fas fa-folder-plus"></i>
                                </button> </a>
                            </td>

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
  title: 'apakah anda yakin hapus MKU?',
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