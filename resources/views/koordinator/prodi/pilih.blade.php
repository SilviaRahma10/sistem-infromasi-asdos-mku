@extends('layouts.mainKoordinator')
@section('title', 'fakultas')
@section('content')

<div class="container-fluid">

    <h1 class="h3 mb-2 text-gray-800">Program Studi</h1>
    <br>
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <a href="{{ route('prodi.data') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-arrow-left fa-sm text-white-50"></i> Kembali</a>
            </div>
           
    {{-- DataTales Example --}}

    <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Data Fakultas</h6>
        </div>
  
        <form class="p-5">
            @csrf
            <div class="container-fluid">
            <fieldset disabled>

                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3" class="pl-5">
                            <label for="nama_fakultas" class="form-label">Nama Fakultas</label>
                            <input type="text" name="nama_fakultas" id="nama_fakultas" class="form-control" value="{{ $fakultas->nama }}">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="mb-3" class="pl-5">
                            <label for="code" class="form-label">Code Fakultas</label>
                            <input type="text" name="code" id="code" class="form-control" value="{{ $fakultas->kode }}">
                        </div>
                    </div>
                </div>
               
            </fieldset>
            </div>
        </form>
    </div>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Program Studi {{ $fakultas->nama }}</h6>
        </div>
        
        <div class="card-body">
            <div class="table-responsive">
                <table class="table " id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Id Program Studi</th>
                            <th>Kode Program Studi</th>
                            <th>Nama Prodi</th>
                           
                            <th></th>
                            <th>Aksi</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($prodis as $prodi)
                         <tr>
                           <td>{{ $prodi->id }}</td>
                           <td>{{ $prodi->kode }}</td>
                           <td>{{ $prodi->nama }}</td>
                          
                                <td>
                                    <a href="{{ route('prodi.lihat',$prodi->id) }}"><button type="submit" class="btn btn-primary">
                                        <i class="fas fa-sharp fa-eye"></i>
                                    </button> </a>
                                </td>
                                <td>
                                    <a href="{{ route('prodi.edit', $prodi->id) }}"><button type="submit" class="btn btn-warning">
                                        <i class="fas fa-pencil-alt"></i>
                                    </button> </a>
                                </td>
                                <td>
                                    <a href="#" class="btn btn-danger remove-btn" data-id="{{ $prodi->id }}">
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
  @foreach ($prodis as $prodi)
  <form action="{{ route('prodi.destroy', $prodi->id) }}" id="delete-form-{{ $prodi->id }}" method="post">
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
  title: 'apakah anda yakin hapus Program Studi?',
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

