@extends('layouts.mainKoordinator')
@section('title', 'data ketua pusat mku')
@section('content')

@section('custom_head')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.13.1/cr-1.6.1/r-2.4.0/sc-2.0.7/sb-1.4.0/datatables.min.css"/>
@endsection

<div class="container-fluid">
  <h1 class="h3 mb-2 text-gray-800">Ubah ketua Pusat MKU (Mata Kuliah Umum) </h1><br>


    <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Data ketua pusat</h6>
        </div>
          <form class="pl-5">
            @csrf
          <div class="container-fluid">
            <br>
              <div class="row">
                <div class="col-md-6">
                  <div class="mb-3" class="pl-5">
                    <label for="ketua" class="form-label">Nama Ketua</label>
                    <input type="text" name="ketua" id="ketua" class="form-control" value="{{ $ketuapusat->ketua }}" readonly>

                
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="mb-3" class="pl-5">
                    <label for="nip" class="form-label">Nip Ketua Pusat</label>
                    <input type="text" name="nip" id="nip" class="form-control" value="{{ $ketuapusat->nip }}" readonly>

                  </div>
                </div>
              </div>

              </div>
              <div style="text-align: center; padding-top:20px; padding:bottom :30px">
                <button type="submit" class="btn btn-danger" ><a href="{{route('Ketuapusat.edit',$ketuapusat->id ) }}" style="color:white">Ubah Ketua Pusat MKU</button>             
              </div> 
          
          </form>
          <br><br>

        </div>
      </div>
@endsection
        
