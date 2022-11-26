@extends('layouts.mainKoordinator')
@section('title', 'Tambah kelas')

@section('custom_head')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection

@section('content')
    <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <a href="{{ route('kelas.data') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                    class="fas fa-arrow-left fa-sm text-white-50"></i> Kembali</a>
        </div>

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Tambah Kelas</h6>
            </div>

            <form action="{{ route('kelas.store') }}" method="post">
                @csrf
                <div class="card-body">

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="prodi">Prodi</label>
                                <select name="id_prodi" id="prodi" class="form-control">
                                    <option selected disabled>Pilih Prodi</option>
                                    @foreach ($prodis as $item)
                                        <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="mata_kuliah">Mata Kuliah</label>
                                <select name="id_mata_kuliah" id="mata_kuliah" class="form-control">
                                    <option selected disabled>Pilih Mata Kuliah</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="nama_kelas">Nama Kelas</label>
                            <input type="text" name="nama" id="nama_kelas" class="form-control @error('nama') is-invalid @enderror" value="{{ old('nama') }}">

                            @error('nama')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="dosen">Dosen</label>
                            <select name="dosen[]" id="dosen" class="form-control @error('dosen') is-invalid @enderror"  multiple>
                                @foreach ($dosens as $item)
                                    <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                @endforeach
                            </select>
                            
                            @error('dosen')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>



                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="hari">Hari</label>
                                <select name="hari" id="hari" class="form-control">
                                    <option selected disabled>Pilih Hari</option>
                                    <option value="Senin">Senin</option>
                                    <option value="Selasa">Selasa</option>
                                    <option value="Rabu">Rabu</option>
                                    <option value="Kamis">Kamis</option>
                                    <option value="Jumat">Jumat</option>
                                    <option value="Sabtu">Sabtu</option>
                                    <option value="Minggu">Minggu</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="waktu">Waktu</label>
                                <input type="text" name="waktu" id="waktu" class="form-control">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="ruangan">Ruangan</label>
                        <input type="text" name="ruang" id="ruangan" class="form-control">
                    </div>


                </div>
                <div class="card-footer">
                    <input type="submit" value="Tambah Kelas" class="btn btn-primary btn-sm">
                </div>
            </form>
        </div>
    </div>
@endsection

@push('custom_js')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#dosen').select2();
        });

        let prodi = document.querySelector('#prodi');
        prodi.addEventListener('change', function (e) {
            e.preventDefault();

            let id = prodi.value;
            
            fetch(`{{ route('api.prodi.getMku') }}?id=${id}`)
                .then(res => res.json())
                .then(res => {
                    let mataKuliahProdi = res.data;
                    let mata_kuliahs = document.querySelector('#mata_kuliah');

                    mata_kuliahs.innerHTML = '';
                    mata_kuliahs.innerHTML += `<option selected disabled>Pilih Mata Kuliah</option>`;

                    mataKuliahProdi.forEach(mataKuliah => {
                        let option = document.createElement('option');
                        option.value = mataKuliah.id;
                        option.innerHTML = mataKuliah.mku.nama;

                        mata_kuliahs.appendChild(option);

                        console.log(mataKuliah)
                    });
                });
        });
    </script>
@endpush