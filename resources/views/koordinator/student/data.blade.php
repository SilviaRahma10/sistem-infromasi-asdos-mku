@extends('layouts.mainKoordinator')
@section('title', 'data mahasiswa')
@section('content')

<div class="container-fluid">
    {{-- <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <a href="{{ route('student.DataProdi') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
        class="fas fa-arrow-left fa-sm text-white-50"></i> Kembali</a>
      </div> --}}

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Mahasiswa</h1>
    
    <div class="nav-item dropdown back bg-primary" style="width: max-content; border-radius:8px">
      <a style="color:white" class="nav-link dropdown-toggle" href="#" id="dropdown1" data-toggle="dropdown" arial-haspopup="true" arial-expanded="false">Program studi</a>
      <div class="dropdown-menu" arial-labelledby="dropdown1">
          @foreach($prodis as $prodi)
          <a class="dropdown-item"  href="{{ route('student.pilih', $prodi->id) }}">{{ $prodi->prodi_name }}</a>
          @endforeach
      </div>
    </div>
    <br>


    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Mahasiswa</h6>
        </div>
        
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Nama Mahasiswa</th>
                            <th>NPM</th>
                            <th>Program Studi</th>
                            <th>Angkatan</th>
                            <th>Email</th>
                            <th>No Hp</th>
                            <th>Alamat</th>
                            <th>Jenis Kelamin</th>
                            <th>Aksi</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($students as $student)
                        <tr>
                            <td>{{ $student->id }}</td>
                            <td>{{ $student->user->name }}</td>
                            <td>{{ $student->npm }}</td>
                            <td>{{ $student->prodi->prodi_name}}</td>
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
                           <td>
                                {{-- <a href="#" class="btn btn-danger remove-btn" data-id="{{ $students->id }}">hapus</a> --}}
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