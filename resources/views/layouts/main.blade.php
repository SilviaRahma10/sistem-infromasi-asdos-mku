<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Sistem Informasi Asdos MKU</title>
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

    {{-- @include('includes.navbarUser') --}}

    
        @include('includes.navbarMahasiswa')
 



  <main id="main">

   @yield('content')

  <!-- ======= Footer ======= -->
  <footer id="footer">

    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-sm-4  footer-contact">
            <h4>ALAMAT</h4>

            <p>
              LPMPP Universitas Bengkulu
              Gedung B Lt. 2 <br><br>
            </p>

            <p>
              Jl. W.R Supratman, Kandang Limun, <br>
              Bengkulu 38371A<br>
              INDONESIA <br><br>
              <strong>Phone:</strong> +62-736-21170 dan 21884<br>
              <strong>Email:</strong> rektorat@unib.ac.id<br>
            </p>
          </div>

          <div class="col-sm-4  footer-links">
            <h4>FAKULTAS</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="http://fkip.unib.ac.id/">Fakultas KIP</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="http://fh.unib.ac.id/">Fakultas Hukum</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="https://feb.unib.ac.id/">Fakultas Ekonomi dan Bisnis</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="http://fisip.unib.ac.id/">Fakultas ISIP</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="http://fp.unib.ac.id/">Fakultas Pertanian</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="http://fmipa.unib.ac.id/">Fakutas MIPA</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="https://ft.unib.ac.id/">Fakultas Teknik</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="http://fkik.unib.ac.id/">Fakultas KIK</a></li>
            </ul>
          </div>

          <div class="col-sm-4  footer-links">
            <h4>Unit Kerja</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="https://lpmpp.unib.ac.id/category/pusat-penjamin-mutu/">Pusat Penjamin Mutu</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="https://lpmpp.unib.ac.id/category/pusat-pengembangan-pembelajaran/">Pusat Pengembangan Pembelajaran</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="https://lpmpp.unib.ac.id/category/pusat-mku-dan-kewirausahaan/">Pusat MKU dan Kewirausahaan</a></li>

            </ul>
          </div>

          {{-- <div class="col-lg-4 col-md-6 footer-newsletter">
            <h4>Join Our Newsletter</h4>
            <p>Tamen quem nulla quae legam multos aute sint culpa legam noster magna</p>
            <form action="" method="post">
              <input type="email" name="email"><input type="submit" value="Subscribe">
            </form>
          </div> --}}

        </div>
      </div>
    </div>

    <div class="container d-md-flex py-4">

      <div class="me-md-auto text-center text-md-start">
        <div class="copyright">
          &copy; Copyright <strong><span>Universitas Bengkulu</span></strong> | 2022
        </div>
        <div class="credits">
          <!-- All the links in the footer should remain intact. -->
          <!-- You can delete the links only if you purchased the pro version. -->
          <!-- Licensing information: https://bootstrapmade.com/license/ -->
          <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/mentor-free-education-bootstrap-theme/ -->
          
           <a href="https://lpmpp.unib.ac.id/">Lembaga Penjaminan Mutu dan Pengembangan Pembelajaran</a>
        </div>
      </div>
      <div class="social-links text-center text-md-right pt-3 pt-md-0">
        <a href="https://twitter.com/unibofficial?ref_src=twsrc%5Egoogle%7Ctwcamp%5Eserp%7Ctwgr%5Eauthor" class="twitter"><i class="bx bxl-twitter"></i></a>
        <a href="https://www.facebook.com/unibofficial1/" class="facebook"><i class="bx bxl-facebook"></i></a>
        <a href="https://www.instagram.com/unibofficial/?hl=id" class="instagram"><i class="bx bxl-instagram"></i></a>
        <a href="https://www.linkedin.com/school/universitasbengkulu/" class="linkedin"><i class="bx bxl-linkedin"></i></a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{ url ('themes/frontend/assets/vendor/purecounter/purecounter_vanilla.js')}}"></script>
  <script src="{{ url ('themes/frontend/assets/vendor/aos/aos.js')}}"></script>
  <script src="{{ url ('themes/frontend/assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{ url ('themes/frontend/assets/vendor/swiper/swiper-bundle.min.js')}}"></script>
  <script src="{{ url ('themes/frontend/assets/vendor/php-email-form/validate.js')}}"></script>

  <!-- Template Main JS File -->
  <script src="{{url('themes/frontend/assets/js/main.js')}}"></script>


  @yield('custom_html')


    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('themes/sb-admin-2/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('themes/sb-admin-2/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('themes/sb-admin-2/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('themes/sb-admin-2/js/sb-admin-2.min.js') }}"></script>

    <!-- Page level plugins -->
    <script src="{{ asset('themes/sb-admin-2/vendor/chart.js/Chart.min.js') }}"></script>

    <!-- Page level custom scripts -->
    <script src="{{ asset('themes/sb-admin-2/js/demo/chart-area-demo.js') }}"></script>
    <script src="{{ asset('themes/sb-admin-2/js/demo/chart-pie-demo.js') }}"></script>

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>



    @if (session()->has('success'))
        <script>
            Swal.fire(
                'Berhasil!',
                '{{ session()->get('success') }}',
                'success'
            )
        </script>
    @endif

    @stack('custom_js')
</body>

</html>
