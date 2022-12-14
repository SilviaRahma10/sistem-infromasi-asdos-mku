@extends('layouts.mainKoordinator')
@section('title', 'edit Mku')

@section('custom_head')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection

@section('content')
    <div class="container-fluid">
        <h1 class="h3 mb-2 text-gray-800">Edit Mata Kuliah Umum - {{ $generalsubject->nama }}</h1>
    <br>

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <a href="{{ route('generalsubject.data') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                    class="fas fa-arrow-left fa-sm text-white-50"></i> Kembali</a>
        </div>

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Edit Data Mata Kuliah Umum</h6>
            </div>

            <form class="pl-5" action="{{ route('generalsubject.update', $generalsubject->id) }}" method="POST">
                @csrf
                @method('PUT')
                <br>
                <div class="container-fluid">

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3" class="pl-5">
                                <label for="nama" class="form-label">Nama MKU</label>
                                <input type="text" name="nama" id="nama" class="form-control @error('nama') is-invalid @enderror" 
                                    value="{{ $generalsubject->nama }}">

                                    
                                @error('nama')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                 @enderror
                            </div>
                        </div>
                        <div class="col-md-6">

                            <div class="mb-3" class="pl-5">
                                <label for="kode" class="form-label">Kode MKU</label>
                                <input type="text" name="kode" id="kode" class="form-control @error('kode') is-invalid @enderror" 
                                    value="{{ $generalsubject->kode }}">

                                @error('kode')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                 @enderror
                            </div>
                        </div>
                    </div>

                    {{-- <div class="mb-3">
                        <label for="">Prodi yang mengambil mata kuliah</label>
                        <div>
                            <select name="prodi[]" id="" class="prodi-dropdown" multiple="multiple"
                                style="width: 100%">
                                @foreach ($prodis as $item)
                                    <option value="{{ $item->id }}" @if (in_array($item->id, $program_studi)) selected @endif>{{ $item->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div> --}}
                    <br>
                    <button type="submit" class="btn btn-primary">Simpan</button><br><br>
            </form>
        </div>
    </div>
    <br>
            {{-- <a class="pl-5" href="{{ route('.index') }}"><button type="submit" class="btn btn-primary" >Cancle</button></a> --}}
 @endsection


        @push('custom_js')
            <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

            <script>
                $(document).ready(function() {
                    $('.prodi-dropdown').select2();
                });
            </script>
        @endpush
