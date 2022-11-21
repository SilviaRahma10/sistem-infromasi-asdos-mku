@extends('layouts.mainKoordinator')
@section('title', 'data kelas')
@section('content')
<div class="container-fluid">
    <!-- Example single danger button -->

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Kelas MKU</h1>
 
    <!-- DataTales Example -->
    {{-- value="{{ $prodi->id }}" --}}

    <a href="{{ route('kelas.create') }}" class="btn btn-primary">
      <i class="fas fa-plus"></i>
      Tambah Kelas</a>

    <form action="{{ route('kelas.search') }}" method="GET" class="d-none d-sm-inline-block form-inline mr-auto ml-md-3  my-md-0 navbar-search" style="float: right;">
      <div class="input-group pull-right" style="color:white">
          <input type="search" class="form-control bg-white border-0 small" placeholder="Cari Data Kelas" name="search">
          <div class="input-group-append">
              <button class="btn btn-primary" type="submit">
                  <i class="fas fa-search fa-sm"></i>
              </button>
          </div>
      </div>
    </form>
      
    <br><br> 
    {{-- pilih berdasarkan prodi --}}

    <div class="row">
      <div style="margin-left: 20px">
        <div class="nav-item dropdown back bg-primary" style="width: max-content; border-radius:8px">
          <a style="color:white" class="nav-link dropdown-toggle" href="#" id="dropdown1" data-toggle="dropdown"
              arial-haspopup="true" arial-expanded="false">Program Studi</a>
          <div class="dropdown-menu" arial-labelledby="dropdown1">
              @foreach ($prodis as $prodi)
                  <a class="dropdown-item" href="{{ route('kelas.pilihProdi', $prodi->id) }}">{{ $prodi->nama }}</a>
              @endforeach
          </div>
        </div><br>
     </div>

  {{-- pilih berdasarkan mku --}}
    <div style="margin-left: 20px">
      <div class="nav-item dropdown back bg-primary" style="width: max-content; border-radius:8px">
        <a style="color:white" class="nav-link dropdown-toggle" href="#" id="dropdown1" data-toggle="dropdown"
            arial-haspopup="true" arial-expanded="false">Fakultas</a>
        <div class="dropdown-menu" arial-labelledby="dropdown1">
            @foreach ($mata_kuliah as $mku)
                <a class="dropdown-item" href="{{ route('kelas.pilihMku', $mku->id) }}">{{ $mku->nama }}</a>
            @endforeach
        </div>
      </div>
    </div>
    </div>

      <br><br>
    
        <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Kelas Mata Kuliah Umum</h6>
        </div>
        
        <div class="card-body">
            <div class="table-responsive">
                <table class="table" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Kode MKU</th>
                            <th>Nama MKU</th>
                            <th>Kode Program Studi</th>
                            <th>Nama Program Studi</th>
                            <th>Kelas</th>
                            <th>Nama Dosen Pengampu</th>
                            <th></th>
                            <th>Aksi</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                      @php
                         $no=1;
                      @endphp
                        @foreach ($kelas as $index => $class)
                         <tr>
                          <th scope="row"> {{ $index + $kelas->firstItem() }}</th>
                           <td>{{ $class->mku_prodi->mku->kode }}</td>
                           <td>{{ $class->mku_prodi->mku->nama }}</td>
                           <td>{{ $class->mku_prodi->prodi->kode }}</td>
                           <td>{{ $class->mku_prodi->prodi->nama }}</td>
                           <td>{{ $class->nama }}</td>
                           <td>
                            @foreach ($class->dosen as $dosen)
                                {{ $dosen->nama }} <br>
                            @endforeach
                           </td>

                           <td>
                              <a href="{{ route('kelas.lihat', $class->id) }}"><button type="submit" class="btn btn-primary"> 
                                <i class="fas fa-sharp fa-eye"></i>
                              </button> </a>
                           </td>

                           
                           <td>
                            <a href="{{ route('kelas.edit', $class->id) }}"><button type="submit" class="btn btn-warning"> 
                              <i class="fas fa-pencil-alt"></i>   
                            </button> </a>
                         </td>

                         
                         <td>
                          <a href="#" class="btn btn-danger remove-btn" data-id="{{ $class->id }}">
                            <i class="fas fa-trash-alt"></i>
                          </a>
                       </td>


                         </tr>
                         @endforeach
                    </tbody>
                </table>
                <div style="float: right">
                  {{ $kelas->links() }}
              </div>
            </div>
        </div>
    </div>
  
  </div>
@endsection

@section('custom_html')
@foreach ($kelas as $class)
  <form action="{{ route('kelas.destroy', $class->id) }}" id="delete-form-{{ $class->id }}" method="post">
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
  title: 'apakah anda yakin hapus Kelas?',
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