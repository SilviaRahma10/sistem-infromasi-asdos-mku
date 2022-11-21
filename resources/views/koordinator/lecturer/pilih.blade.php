@extends('layouts.mainKoordinator')
@section('title', 'data kelas')
@section('content')
{{-- <div class="container">
    <div class="row">
        <div class="col-12"> --}}
        <div class="container-fluid">
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <a href="{{ route('lecturer.data') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-arrow-left fa-sm text-white-50"></i> Kembali</a>
              </div> 

            <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Data Kelas Program Studi</h6>
                </div>
            
                <div class="card-body">
                    <div class="mb-3" class="pl-5">
                        <label for="kode_prodi" class="form-label">kode Prodi</label>
                        <input type="text" name="kode_prodi" id="kode_prodi" class="form-control" value="{{ $prodi->kode}}" readonly>
                    </div>
        
                    <div class="mb-3" class="pl-5">
                        <label for="nama_prodi" class="form-label">Id prodi</label>
                        <input type="text" name="nama_prodi" id="nama_prodi" class="form-control" value="{{ $prodi->nama}}" readonly>
                    </div>
                </div>
            </div>
            
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Data Mahasiswa Pogram studi {{ $prodi->prodi_name}} </h6>
                </div>
                
                 <div class="card-body">
                    <div class="table-responsive">
                        <table class="table" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Id Dosen</th>
                                    <th>Nama</th>
                                    <th>NIP</th>
                                    <th>NIDN</th>
                                    <th>No hp</th>
                                    <th>Jenis Kelamin</th>
                                    <th></th>
                                    <th>Aksi</th>
                                    <th></th>
                                </tr>
                            </thead>
                            
                            <tbody>
                                @foreach ($lecturers as $lecturer)
                                 <tr>
                                    <td>{{ $lecturer->id }}</td>
                                    <td>{{ $lecturer->nama }}</td>
                                    <td>{{ $lecturer->nip }}</td>
                                    <td>{{ $lecturer->nidn }}</td>
                                    <td>{{ $lecturer->no_hp }}</td> 
                                    <td>{{ $lecturer->jenis_kelamin }}</td> 


                                   <td>
                                    <a href="{{ route('lecturer.lihat', $lecturer->id) }}"><button type="submit" class="btn btn-primary">
                                        <i class="fas fa-sharp fa-eye"></i>
                                    </button> </a>
                                </td>
                                <td>
                                    <a href="{{ route('lecturer.edit', $lecturer->id) }}"><button type="submit" class="btn btn-warning">
                                        <i class="fas fa-pencil-alt"></i>
                                    </button> </a>
                                </td>
                                <td>
                                    <a href="#" class="btn btn-danger remove-btn" data-id="{{ $lecturer->id }}">
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
    </div>
</div>
@endsection


@section('custom_html')
@foreach ($lecturers as $lecturer)
  <form action="{{ route('lecturer.destroy', $lecturer->id) }}" id="delete-form-{{ $lecturer->id }}" method="post">
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
