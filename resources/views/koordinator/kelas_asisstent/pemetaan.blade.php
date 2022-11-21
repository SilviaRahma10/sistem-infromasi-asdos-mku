@extends('layouts.mainKoordinator')
@section('title', 'pemetaan')

@section('content')

    <div class="container-fluid">
        <h1 class="h3 mb-2 text-gray-800">Pemetaan Asisten</h1>

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Pilih Prodi dan Kelas Penempatan</h6>
            </div>
            <form action="{{ route('asisten.tambah', $pendaftaran->id) }}" method="POST">
                @csrf
                @METHOD('POST')

                <div class="card-body">
                  <div class="mb-3">
                    <label for="prodi">Pilih Prodi</label>
                    <select name="id_prodi" id="prodi" class="form-control">
                      <option selected disabled>Pilih Prodi</option>
                      @foreach ($prodi as $item)
                          <option value="{{ $item->id }}">{{ $item->nama }}</option>
                      @endforeach
                    </select>
                  </div>

                  <div class="mb-3">
                    <label for="kelas">Pilih Kelas</label>
                    <select name="id_kelas" id="kelas" class="form-control">
                      <option selected disabled>Pilih kelas</option>
                    </select>
                  </div>

                  <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>

    <script>
      let prodi = document.querySelector('#prodi');
      prodi.addEventListener('change', function (e) {
        e.preventDefault();

        let id = prodi.value;

        fetch('{{ route('api.prodi.getKelas') }}?id_prodi='+ id)
          .then(res => res.json())
          .then(res => {
            let data = res.data;
            let kelas = document.querySelector('#kelas');
            kelas.innerHTML = '';

            let defaultOption = document.createElement('option');
            defaultOption.setAttribute('selected', 'selected');
            defaultOption.setAttribute('disabled', 'disabled');
            defaultOption.innerHTML = 'Pilih Kelas';

            kelas.appendChild(defaultOption);

            data.forEach((item) => {
              let option = document.createElement('option');
              option.value = item.id;
              option.innerHTML = `${item.nama} (${item.hari} / ${item.waktu}) | ${item.ruang}`;

              kelas.appendChild(option)
            })
          })
      })
    </script>
@endsection
