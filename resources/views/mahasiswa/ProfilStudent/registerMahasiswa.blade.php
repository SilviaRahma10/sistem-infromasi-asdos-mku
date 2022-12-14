<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>SISTEM INFORMASI ASISTEN DOSEN - Index</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{url('themes/frontend/assets/img/logoweb.png')}}" rel="icon">
  <link href="{{url('themes/frontend/assets/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{url('themes/frontend/assets/vendor/animate.css/animate.min.css')}}" rel="stylesheet">
  <link href="{{url('themes/frontend/assets/vendor/aos/aos.css')}}" rel="stylesheet">
  <link href="{{url('themes/frontend/assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{url('themes/frontend/assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
  <link href="{{url('themes/frontend/assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
  <link href="{{url('themes/frontend/assets/vendor/remixicon/remixicon.css')}}" rel="stylesheet">
  <link href="{{url('themes/frontend/assets/vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{url('themes/frontend/assets/css/style.css')}}" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Mentor - v4.9.0
  * Template URL: https://bootstrapmade.com/mentor-free-education-bootstrap-theme/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

<div style="background: #15246a; width: 100%; padding-top:70px; padding-bottom:70px">
    <div class="box-0-0-4 contentContainer-0-0-1473">
        <div style="text-align: center">
            <h2>Masukkan Data Diri</h2>
          </div>

        <form  action="{{ route('mahasiswa.simpandataDiri', $user->id) }}" class="pl-5" method="POST">
            @csrf
            <br>
            <div class="container-fluid">
                <div class="mb-3" class="pl-5">
                    <label for="npm" class="form-label">NPM</label>
                    <input type="text" name="npm" id="npm" class="form-control @error('npm') is-invalid @enderror" value="{{ old('npm') }}">

                    @error('npm')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3" class="pl-5">
                    <label for="prodi_id" class="form-label">Pogram Studi</label>
                    <br>
                    <select id="prodi_id" name="prodi_id" class="form-control @error('prodi_id') is-invalid @enderror">
                        <option selected disabled>Pilih Prodi</option>
                        @foreach ($prodis as $prodi)
                            <option value="{{ $prodi->id }}">{{ $prodi->nama }}</option>
                        @endforeach
                    </select>

                    
                    @error('prodi_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3" class="pl-5">
                    <label for="angkatan" class="form-label">Angkatan</label>
                    <input type="year" name="angkatan" id="angkatan" class="form-control @error('angkatan') is-invalid @enderror" value="{{ old('angkatan') }}">

                    @error('angkatan')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3" class="pl-5">
                    <label for="no_hp" class="form-label">NO HP</label>
                    <input type="text" name="no_hp" id="no_hp" class="form-control @error('no_hp') is-invalid @enderror" value="{{ old('no_hp') }}">

                    @error('no_hp')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3" class="pl-5">
                    <label for="address" class="form-label">Alamat</label>
                    <input type="text" name="address" id="address" class="form-control @error('address') is-invalid @enderror" value="{{ old('address') }}">

                    @error('address')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>


                <div class="mb-3">
                    <label for="gender" class="form-label">Jenis Kelamin</label>
                    <br>
                    <select id="gender" name="gender" class="form-control @error('gender') is-invalid @enderror">
                        <option selected disabled>Pilih Jenis Kelamin</option>
                        <option >laki-laki</option>
                        <option >perempuan</option>
                    </select>

                    @error('gender')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

            </div>
            <div style="text-align: center; padding-top:20px; padding:bottom :30px">
            <button type="submit" class="btn" style="background: #15246a; align-item:center; color:white">Simpan</button>
            </div>
    </form>
    </div>
               

    <script src="{{ url('themes/form/form.js') }}"></script>

</div>

</body>
</html>

