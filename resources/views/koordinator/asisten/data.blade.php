
    @extends('layouts.mainKoordinator')
    @section('title', 'data asisten')
    @section('content')
    
    @section('custom_head')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.13.1/cr-1.6.1/r-2.4.0/sc-2.0.7/sb-1.4.0/datatables.min.css"/>
    @endsection

  
    
    <div class="container-fluid">
        <h1 class="h3 mb-2 text-gray-800">Data Asisten Dosen MKU </h1><br>
    
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            
    
            
            <div>
                <div class="nav-item dropdown back bg-primary" style="width: max-content; border-radius:8px">
                    <a style="color:white" class="nav-link dropdown-toggle" href="#" id="dropdown1" data-toggle="dropdown"
                        arial-haspopup="true" arial-expanded="false">
                        <i class="fas fa-download fa-sm text-white-50"></i>
                        Export Laporan Asisten Dosen</a>
                    <div class="dropdown-menu" arial-labelledby="dropdown1">
                        @foreach ($tahun_ajarans as $tahun_ajaran)
                            <a class="dropdown-item" href="{{ route('asisten.export', ['id_tahun' => $tahun_ajaran->id]) }}">{{ $tahun_ajaran->tahun }} - 
                             
                                @if($tahun_ajaran->semester==1)
                                    Ganjil
                                @else
                                    Genap
                                @endif
                            </a>
                        @endforeach
                    </div>
                  </div>
            </div>
        </div><br>
    
       <div class="card shadow mb-4">
            <div class="card-header py-3"> 
                <h6 class="m-0 font-weight-bold text-primary">Data Pendaftar</h6>
            </div>
    
            <div class="card-body">
                <div class="table-responsive">
                        <table class="table" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama mahasiswa</th>
                                    <th>NPM mahasiswa</th>
                                    <th>Email</th>
                                    <th>Prodi mahasiswa</th>
                                    <th>Angkatan</th>
                                    <th>Tahun ajaran</th>
                                    <th>semester</th>
                                    <th>nama mku</th>
                                    <th>kode mku</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
    
                                @php
                                $no=1;
                                @endphp
    
                                @foreach($registrations as $index => $registration)
                                    @if ($registration->id_mata_kuliah == $idMku)
                                    <tr>
                                        <th scope="row"> {{ $index + $registrations->firstItem() }}</th>
                                        <td>{{ $registration->mahasiswa->user->name }}</td>
                                        <td>{{ $registration->mahasiswa->npm }}</td>
                                        <td>{{ $registration->mahasiswa->user->email }}</td>
                                        <td>{{ $registration->mahasiswa->prodi->nama }}</td>
                                        <td>{{ $registration->mahasiswa->angkatan }}</td>
                                        <td>{{ $registration->program->tahun_ajaran->tahun }}</td>
                                        <td>
                                            @if($registration->program->tahun_ajaran->semester==1)
                                                Ganjil
                                            @else
                                                Genap
                                            @endif
                                        </td>
                                        <td>{{ $registration->mku->nama }}</td>
                                        <td>{{ $registration->mku->kode }}</td>
                                        <td>
                                            @if($registration->status==0)
                                                Belum Diverifikasi
        
                                            @elseif($registration->status==1)
                                                    Terima
                                            @else
                                                    Tolak
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('asisten.lihat', $registration->id) }}"><button type="submit" class="btn btn-primary">
                                                <i class="fas fa-sharp fa-eye"></i> 
                                            </button> </a>
                                        </td>

                                        <td>
                                            <a href="#" class="btn btn-danger remove-btn" data-id="{{ $registration->id }}">
                                                <i class="fas fa-trash-alt"></i>
                                            </a>
                                        </td>
    
                                  
                                    </tr>
                                    @endif
                                   
                                 
                                @endforeach
                            </tbody>
                        </table>
                        <div style="float: right">
                            {{ $registrations->links() }}
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
    @foreach ($registrations as $registration)
        <form action="{{ route('asisten.destroy', $registration->id) }}" id="delete-form-{{ $registration->id }}" method="post">
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
                let deleteForm = document.querySelector('#delete-form-' + id);
    
                Swal.fire({
                    title: 'apakah anda yakin hapus asisten?',
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
    
   