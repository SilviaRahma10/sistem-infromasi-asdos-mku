@extends('layouts.mainKoordinator')
@section('title', 'prodi')
@section('content')

<div class="container-fluid">

    <h1 class="h3 mb-2 text-gray-800">Program Studi</h1>
    <br>
            
             <a href="{{ route('prodi.tambah') }}"><button type="submit" class="btn btn-primary">
                <i class="fas fa-plus"></i>
                Tambah Prodi</button></a>
            <br><br>

            <div class="nav-item dropdown back bg-primary" style="width: max-content; border-radius:8px">
                <a style="color:white" class="nav-link dropdown-toggle" href="#" id="dropdown1" data-toggle="dropdown" arial-haspopup="true" arial-expanded="false">Fakultas</a>
                <div class="dropdown-menu" arial-labelledby="dropdown1">
                    @foreach($fakultas as $fakulty)
                    <a class="dropdown-item"  href="{{ route('prodi.pilih', $fakulty->id) }}">{{ $fakulty->faculty_name}}</a>
                    @endforeach
                </div>
            </div>
            <br><br>
    {{-- DataTales Example --}}

    <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Data Program Studi</h6>
        </div>
        
        <div class="card-body">
            <div class="table-responsive">
                <table class="table " id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Id Program Studi</th>
                            <th>Faultas</th>
                            <th>Kode Program Studi</th>
                            <th>Nama Prodi</th>
                            <th>Akreditasi</th>
                            <th>Jenjang</th>
                            <th>kelas</th>
                            <th></th>
                            <th>Aksi</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($prodis as $prodi)
                         
                           <td>{{ $prodi->id }}</td>
                           <td>{{ $prodi->fakultas->faculty_name }}</td>
                            <td>{{ $prodi->code }}</td>
                           <td>{{ $prodi->prodi_name }}</td>
                           <td>{{ $prodi->accreditation }}</td>
                           <td>{{ $prodi->level }}</td> 
                          
                            <td>
                                <select name="prodikelas[{{ $prodi->id }}]" id="" class="form-control">
                                    @foreach ($prodi->prodikelas as $prodikls)
                                        <option value="{{ $prodikls->id }}">{{ $prodikls->nama_kelas }}</option>
                                    @endforeach
                                </select>
                             </td> 
                           
                            <td>
                                <a href="{{ route('prodikelas.tambah',$prodi->id) }}"><button type="submit" class="btn btn-primary">
                                <i class="fas fa-plus"></i></button> </a>
                            </td>
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

  {{-- @section('custom_html')
  @foreach @foreach ($prodis as $prodi)
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
 --}}
