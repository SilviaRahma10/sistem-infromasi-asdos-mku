@extends('layouts.mainKoordinator')
@section('title', 'Lihat Program')

@section('content')
<div class="container-fluid">
  <!-- Page Heading -->
  <h1 class="h3 mb-2 text-gray-800">Data program</h1>

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <a href="{{ route('program.data') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
      class="fas fa-arrow-left fa-sm text-white-50"></i> Kembali</a>
    </div>



    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Program</h6>
      </div>
      
      <form class="pl-5">
        @csrf
        <div class="container-fluid">
          
            <br>
            <div class="row">
              <div class="col-6">
                  <div class="mb-3" class="pl-5">
                    <label for="id" class="form-label">Id Program</label>
                    <input type="number" name="id" id="id" class="form-control" value="{{ $program->id }}" readonly>
                  </div>
                </div>

                <div class="col-6">
                  <div class="mb-3" class="pl-5">
                    <label for="status" class="form-label">Status</label>
                        @if($program->is_active==0)
                          <input type="text" name="status" id="status" class="form-control" value="Non- Aktif" readonly>

                        @else($program->is_active==1)
                          <input type="text" name="status" id="status" class="form-control" value="Aktif" readonly>
                        @endif
                  </div>
                </div>
            </div>


            <div class="row">
              <div class="col-6">
                <div class="mb-3" class="pl-5">
                  <label for="id_schoolyear" class="form-label">Tahun Ajaran</label>
                  <input type="text" name="id_schoolyear" id="id_schoolyear" class="form-control" value="{{ $program->tahun_ajaran->tahun }}" readonly>
                </div>
              </div>
              
              <div class="col-6">
                <div class="mb-3" class="pl-5">
                  <label for="semester" class="form-label">Semester</label>
                    @if ($program->tahun_ajaran->semester == 1)
                      <input type="text" name="semester" id="semester" class="form-control" value="Ganjil" readonly>
                    @else ($program->tahun_ajaran->semester == 2)
                      <input type="text" name="id_schoolyear" id="id_schoolyear" class="form-control" value="Genap" readonly>
                    @endif
                </div>
              </div>
            </div>


            <div class="row">
              <div class="col-6">
                <div class="mb-3" class="pl-5">
                  <label for="start_period" class="form-label">Periode Awal pendafataran</label>
                  <input type="date" name="start_period" id="start_period" class="form-control" value="{{ $program->tanggal_buka }}" readonly>
                </div>
              </div>

              <div class="col-6">
                <div class="mb-3" class="pl-5">
                  <label for="finish_period" class="form-label">Periode Akhir pendafataran</label>
                  <input type="date" name="finish_period" id="finish_period" class="form-control" value="{{  $program->tanggal_tutup }}" readonly>
                </div>
              </div>
            </div>


          </form>
            <label for="mku_program" class="form-label">Program MKU yang Dibuka</label>
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" >
                <thead>
                    <tr>
                        <th>Kode MKU</th>
                        <th>Nama MKU</th>
                        <th>Kuota Penerimaan Asiten</th>
                        <th>syarat & ketentuan</th>
                        <th>kualifikasi</th>
                       
                        <th>Aksi</th>
                       
                    </tr>
                </thead>

                <tbody>
                      @foreach ($mku_program as $mkuprogram )
                            <tr>
                              
                              <td>{{ $mkuprogram->mku->kode }}</td>
                              <td>{{ $mkuprogram->mku->nama }}</td>
                              <td>{{ $mkuprogram->kuota }}</td>
                              <td>{{ $mkuprogram->syarat }}</td>
                              <td>{{ $mkuprogram->kualifikasi }}</td>
                              <td>
                                <a href="{{ route('mkuprogram.lihat', $mkuprogram->id) }}"><button type="button" class="btn btn-primary"> 
                                  <i class="fas fa-sharp fa-eye"></i>  
                                  </button> </a>
                              </td>

                              {{-- <td>
                                <a href="{{ route('mkuprogram.edit',$mkuprogram->id) }}"><button type="button" class="btn btn-warning"> 
                                  <i class="fas fa-pencil-alt"></i>  
                                </button> </a>
                               </td>

                               <td>
                                <a href="#" class="btn btn-danger remove-btn" data-id="{{ $mkuprogram->id }}">
                                  <i class="fas fa-trash-alt"></i>
                                </a>
                               </td> --}}


                              
                            </tr>
                      @endforeach  
                  </tbody>
              </table>
            </div><br>
         </div>    
    </div>
</div>

    <br>
  {{-- <a class="pl-5" href="{{ route('.index') }}"><button type="submit" class="btn btn-primary" >Cancle</button></a> --}}
  @endsection

  
  @section('custom_html')
  @foreach ($mku_program as $mkuprogram )
  <form action="{{ route('mkuprogram.destroy', $mkuprogram->id) }}" id="delete-form-{{ $mkuprogram->id }}" method="post">
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
  title: 'apakah anda yakin hapus MKU Program?',
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
          
