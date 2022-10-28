@extends('layouts.mainKoordinator')
@section('title', 'fakultas')
@section('content')


<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Fakultas</h1>
            <br>
            <a href="{{ route('fakultas.tambah') }}"><button type="submit" class="btn btn-primary">
                <i class="fas fa-plus"></i>
                Tambah</button></a>
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
                            <th>Id</th>
                            <th>Nama Fakultas</th>
                            <th>Code Fakultas</th>
                            <th></th>
                            <th>Aksi</th>
                            <th></th>
                            {{-- <th>Aksi</th> --}}
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($fakultas as $fak)
                         <tr>
                           <td>{{ $fak->id }}</td>
                           <td>{{ $fak->faculty_name  }}</td>
                           <td>{{ $fak->code }}</td>
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
            </div>
        </div>
    </div>
  
  </div>
  @endsection

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