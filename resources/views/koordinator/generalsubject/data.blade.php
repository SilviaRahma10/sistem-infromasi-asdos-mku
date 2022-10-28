@extends('layouts.mainKoordinator')
@section('title', 'data MKU')
@section('content')


<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Mata Kuliah Umum</h1>
    <br>
            <a href="{{ route('generalsubject.tambah') }}"><button type="submit" class="btn btn-primary">
              <i class="fas fa-plus"></i>
              Tambah</button></a>
            <br><br>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Mata Kuliah Umum</h6>
        </div>
        
        <div class="card-body">
            <div class="table-responsive">
                <table class="table" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Nama MKU</th>
                            <th>Kode MKU</th>
                            {{-- <th>Star Periode</th>
                            <th>finish Periode</th>
                            <th>Kuota</th>
                            <th>Kualifikasi</th>
                            <th>Syarat dan Ketentuan</th> --}}
                            <th></th>
                            <th>aksi</th>
                            <th></th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($generalsubjects as $generalsubject)
                         <tr>
                           <td>{{ $generalsubject->id }}</td>
                           <td>{{ $generalsubject->name }}</td>
                           <td>{{ $generalsubject->code }}</td>
                           {{-- <td>{{ $generalsubject->start_period }}</td>
                           <td>{{ $generalsubject->finish_period }}</td>
                           <td>{{ $generalsubject->quota }}</td>
                           <td>{{ $generalsubject->qualification}}</td>
                           <td>{{ $generalsubject->terms_and_conditions }}</td> --}}
             
                           <td>
                            <a href="{{ route('generalsubject.lihat', $generalsubject->id) }}"><button type="submit" class="btn btn-primary"> 
                              <i class="fas fa-sharp fa-eye"></i>  
                            </button> </a>
                            
                             <td>
                            <a href="{{ route('generalsubject.edit', $generalsubject->id) }}"><button type="submit" class="btn btn-warning"> 
                              <i class="fas fa-pencil-alt"></i>  
                            </button> </a>
                          </td>
                            
                          <td>
                            <a href="#" class="btn btn-danger remove-btn" data-id="{{ $generalsubject->id }}">
                              <i class="fas fa-trash-alt"></i>
                            </a>

                          </td>
                           </td>
                         </tr>
                         @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
  </div>
  @endsection

  @section('custom_html')
  @foreach ($generalsubjects as $generalsubject)
  <form action="{{ route('generalsubject.destroy', $generalsubject->id) }}" id="delete-form-{{ $generalsubject->id }}" method="post">
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