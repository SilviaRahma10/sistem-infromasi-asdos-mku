@extends('layouts.mainKoordinator')
@section('title', 'Data Koordinator')
@section('content')


<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Data Koordinator</h1>
            <a href="{{ route('coordinator.tambah') }}"><button type="submit" class="btn btn-primary">Tambah</button></a>
            <br><br>
            
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Koordinator</h6>
        </div>
        
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>NIP</th>
                            <th>NIDN</th>
                            <th>Nama</th>
                            <th>Address</th>
                            <th>No Hp</th>
                            <th>status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($coordinators as $coordinator)
                         <tr>
                           <td>{{ $coordinator->id }}</td>
                           <td>{{ $coordinator->nip }}</td>
                           <td>{{ $coordinator->nidn }}</td>
                           <td>{{ $coordinator->name }}</td>
                           <td>{{ $coordinator->address }}</td>
                           <td>{{ $coordinator->no_hp }}</td>
                           <td>{{ $coordinator->status }}</td>
                           <td>
                                <a href="{{ route('coordinator.lihat', $coordinator->id) }}"><button type="submit" class="btn btn-primary">lihat</button> </a>
                             <br><br>
                                <a href="{{ route('coordinator.edit', $coordinator->id) }}"><button type="submit" class="btn btn-warning">edit</button> </a>
                             <br><br>
                                <a href="#" class="btn btn-danger remove-btn" data-id="{{ $coordinator->id }}">hapus</a>
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
  @foreach ($coordinators as $coordinator)
  <form action="{{ route('coordinator.destroy', $coordinator->id) }}" id="delete-form-{{ $coordinator->id }}" method="post">
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
  title: 'apakah anda yakin hapus Koordinator?',
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

