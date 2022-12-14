@extends('layouts.main')
@section('content')

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex justify-content-center align-items-center">
    <div class="container position-relative" data-aos="zoom-in" data-aos-delay="100">
      <h1>Sistem Informasi Asdos MKU<br>Universitas Bengkulu</h1>
      {{-- <h2>We are team of talented designers making websites with Bootstrap</h2> --}}
      <br>
      <a href="{{route ('mahasiswa.program')}}" class="btn-get-started">Telusuri Program</a>
    </div>
  </section><!-- End Hero -->

 <!-- ======= About Section ======= -->
 <section id="about" class="about">
    <div class="container" data-aos="fade-up">

      <div class="row">
        <div class="col-lg-6 order-1 order-lg-2" data-aos="fade-left" data-aos-delay="100">
          <img src="{{url('themes/frontend/assets/img/about.jpg')}}" class="img-fluid" alt="">
        </div>
        <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1 content">
          <br>
          <h3>Sekilas Tentang Asisten Dosen Mata  kuliah Umum .</h3><br>
          <ul>
            <li><i class="bi bi-check-circle"></i> Asisten Dosen merupakan pihak yang membantu dosen terkait dengan pelaksanaan praktikum.</li>
            <li><i class="bi bi-check-circle"></i> Asisten Dosen memeiliki peran dalam melaksanakan kegiatan mengajar, memeriksa tugas dan lapora pratikum, dan merekap nilai tugas dan laporan mahasiswa.</li>
            <li><i class="bi bi-check-circle"></i> Asisten Dosen memperoleh beberapa benefit</li>
          </ul>
        </div>
      </div>
    </div>
  </section><!-- End About Section -->

  <!-- ======= Counts Section ======= -->
  <section id="counts" class="counts section-bg">
    <div class="container">

      <div class="row counters">

        <div class="col-lg-3 col-6 text-center">
          <span data-purecounter-start="0" data-purecounter-end="{{ count($generalsubjects) }}" data-purecounter-duration="1" class="purecounter"></span>
          <p>Mata Kuliah Umum</p>
        </div>

        <div class="col-lg-3 col-6 text-center">
          <span data-purecounter-start="0" data-purecounter-end="{{$kuota }}" data-purecounter-duration="1" class="purecounter"></span>
          <p>Total Kuota</p>
        </div>

        <div class="col-lg-3 col-6 text-center">
          <span data-purecounter-start="0" data-purecounter-end="{{ count($registrations) }}" data-purecounter-duration="1" class="purecounter"></span>
          <p>Jumlah Pendaftaran</p>
        </div>

  
        <div class="col-lg-3 col-6 text-center">
          <span data-purecounter-start="0" data-purecounter-end="{{ count($asisten) }}" data-purecounter-duration="1" class="purecounter"></span>
          <p>Jumlah Asisten Diterima</p>
        </div>

      </div>

    </div>
  </section><!-- End Counts Section -->

  <!-- ======= Why Us Section ======= -->
  <section id="why-us" class="why-us">
    <div class="container" data-aos="fade-up">

      <div class="row">
        <div class="col-lg-3 d-flex align-items-stretch">
          <div class="content">
            <h3>Apa Keuntungan Menjadi Asdos ?</h3>
           
            <div class="text-center">
              <a  href="{{route ('mahasiswa.program')}}" class="more-btn">Telusuri <i class="bx bx-chevron-right"></i></a>
            </div>
          </div>
        </div>
        <div class="col-lg-9 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
          <div class="icon-boxes d-flex flex-column justify-content-center">
            <div class="row">
              <div class="col-xl-3 d-flex align-items-stretch">
                <div class="icon-box mt-4 mt-xl-0">
                  <i class="bx bx-receipt"></i>
                  <h4>Meningkatkan pengalaman dan pengetahuan</h4>
                </div>
              </div>

              <div class="col-xl-3 d-flex align-items-stretch">
                <div class="icon-box mt-4 mt-xl-0">
                  <i class="bx bx-cube-alt"></i>
                  <h4>Meningkatkan skill Public Speaking</h4>
                </div>
              </div>

              <div class="col-xl-3 d-flex align-items-stretch ">
                <div class="icon-box mt-4 mt-xl-0" >
                  <i class="bx bx-cube-alt"></i>
                  <h4>Uang Tranportasi</h4>
                </div>
              </div>

              <div class="col-xl-3 d-flex align-items-stretch">
                <div class="icon-box mt-4 mt-xl-0">
                  <i class="bx bx-images"></i>
                  <h4>Mendapatkan sertifikat program</h4>
                </div>
              </div>

            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section id="why-us" class="why-us">
    <div class="container" data-aos="fade-up">

      <div class="row">
        <div class="col-lg-3 d-flex align-items-stretch">
          <div class="content">
            <h3>Apa Tugas Asdos?</h3>
           
            <div class="text-center">
              <a  href="{{route ('mahasiswa.program')}}" class="more-btn">Telusuri <i class="bx bx-chevron-right"></i></a>
            </div>
          </div>
        </div>
        <div class="col-lg-9 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
          <div class="icon-boxes d-flex flex-column justify-content-center">
            <div class="row">
              <div class="col-xl-3 d-flex align-items-stretch">
                <div class="icon-box mt-4 mt-xl-0">
                  <i class="bx bx-receipt"></i>
                  <h4>Mengajar</h4>
                </div>
              </div>

              <div class="col-xl-3 d-flex align-items-stretch">
                <div class="icon-box mt-4 mt-xl-0">
                  <i class="bx bx-cube-alt"></i>
                  <h4>Memeriksa tugas dan laporan</h4>
                </div>
              </div>

              <div class="col-xl-3 d-flex align-items-stretch ">
                <div class="icon-box mt-4 mt-xl-0" >
                  <i class="bx bx-cube-alt"></i>
                  <h4>Merekap Nilai</h4>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

        </div>
      </div>

    </div>
  </section><!-- End Why Us Section -->

  {{-- <!-- ======= Features Section ======= -->
  <section id="features" class="features">
    <div class="container" data-aos="fade-up">

      <div class="row" data-aos="zoom-in" data-aos-delay="100">
        <div class="col-lg-3 col-md-4">
          <div class="icon-box">
            <i class="ri-store-line" style="color: #ffbb2c;"></i>
            <h3><a href="">Lorem Ipsum</a></h3>
          </div>
        </div>
        <div class="col-lg-3 col-md-4 mt-4 mt-md-0">
          <div class="icon-box">
            <i class="ri-bar-chart-box-line" style="color: #5578ff;"></i>
            <h3><a href="">Dolor Sitema</a></h3>
          </div>
        </div>
        <div class="col-lg-3 col-md-4 mt-4 mt-md-0">
          <div class="icon-box">
            <i class="ri-calendar-todo-line" style="color: #e80368;"></i>
            <h3><a href="">Sed perspiciatis</a></h3>
          </div>
        </div>
        <div class="col-lg-3 col-md-4 mt-4 mt-lg-0">
          <div class="icon-box">
            <i class="ri-paint-brush-line" style="color: #e361ff;"></i>
            <h3><a href="">Magni Dolores</a></h3>
          </div>
        </div>
        <div class="col-lg-3 col-md-4 mt-4">
          <div class="icon-box">
            <i class="ri-database-2-line" style="color: #47aeff;"></i>
            <h3><a href="">Nemo Enim</a></h3>
          </div>
        </div>
        <div class="col-lg-3 col-md-4 mt-4">
          <div class="icon-box">
            <i class="ri-gradienter-line" style="color: #ffa76e;"></i>
            <h3><a href="">Eiusmod Tempor</a></h3>
          </div>
        </div>
        <div class="col-lg-3 col-md-4 mt-4">
          <div class="icon-box">
            <i class="ri-file-list-3-line" style="color: #11dbcf;"></i>
            <h3><a href="">Midela Teren</a></h3>
          </div>
        </div>
        <div class="col-lg-3 col-md-4 mt-4">
          <div class="icon-box">
            <i class="ri-price-tag-2-line" style="color: #4233ff;"></i>
            <h3><a href="">Pira Neve</a></h3>
          </div>
        </div>
        <div class="col-lg-3 col-md-4 mt-4">
          <div class="icon-box">
            <i class="ri-anchor-line" style="color: #b2904f;"></i>
            <h3><a href="">Dirada Pack</a></h3>
          </div>
        </div>
        <div class="col-lg-3 col-md-4 mt-4">
          <div class="icon-box">
            <i class="ri-disc-line" style="color: #b20969;"></i>
            <h3><a href="">Moton Ideal</a></h3>
          </div>
        </div>
        <div class="col-lg-3 col-md-4 mt-4">
          <div class="icon-box">
            <i class="ri-base-station-line" style="color: #ff5828;"></i>
            <h3><a href="">Verdo Park</a></h3>
          </div>
        </div>
        <div class="col-lg-3 col-md-4 mt-4">
          <div class="icon-box">
            <i class="ri-fingerprint-line" style="color: #29cc61;"></i>
            <h3><a href="">Flavor Nivelanda</a></h3>
          </div>
        </div>
      </div>

    </div>
  </section><!-- End Features Section --> --}}

  <!-- ======= Popular Courses Section ======= -->
  {{-- <section id="popular-courses" class="courses">
    <div class="container" data-aos="fade-up">

      <div class="section-title">
        <h2>Sedang Dibuka</h2>
        <p>Program Asisten Dosen MKU</p>
      </div>

      <div class="row" data-aos="zoom-in" data-aos-delay="100">

        <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
          <div class="course-item">
            <img src="{{url('themes/frontend/assets/img/course-1.jpg')}}" class="img-fluid" alt="...">
            <div class="course-content">
              <div class="d-flex justify-content-between align-items-center mb-3">
                <h4>Web Development</h4>
                <p class="price">$169</p>
              </div>

              <h3><a href="course-details.html">Website Design</a></h3>
              <p>Et architecto provident deleniti facere repellat nobis iste. Id facere quia quae dolores dolorem tempore.</p>
              <div class="trainer d-flex justify-content-between align-items-center">
                <div class="trainer-profile d-flex align-items-center">
                  <img src="{{url('themes/frontend/assets/img/trainers/trainer-1.jpg')}}" class="img-fluid" alt="">
                  <span>Antonio</span>
                </div>
                <div class="trainer-rank d-flex align-items-center">
                  <i class="bx bx-user"></i>&nbsp;50
                  &nbsp;&nbsp;
                  <i class="bx bx-heart"></i>&nbsp;65
                </div>
              </div>
            </div>
          </div>
        </div> <!-- End Course Item-->

        <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-md-0">
          <div class="course-item">
            <img src="{{url('themes/frontend/assets/img/course-2.jpg')}}" class="img-fluid" alt="...">
            <div class="course-content">
              <div class="d-flex justify-content-between align-items-center mb-3">
                <h4>Marketing</h4>
                <p class="price">$250</p>
              </div>

              <h3><a href="course-details.html">Search Engine Optimization</a></h3>
              <p>Et architecto provident deleniti facere repellat nobis iste. Id facere quia quae dolores dolorem tempore.</p>
              <div class="trainer d-flex justify-content-between align-items-center">
                <div class="trainer-profile d-flex align-items-center">
                  <img src="{{url('themes/frontend/assets/img/trainers/trainer-2.jpg')}}" class="img-fluid" alt="">
                  <span>Lana</span>
                </div>
                <div class="trainer-rank d-flex align-items-center">
                  <i class="bx bx-user"></i>&nbsp;35
                  &nbsp;&nbsp;
                  <i class="bx bx-heart"></i>&nbsp;42
                </div>
              </div>
            </div>
          </div>
        </div> <!-- End Course Item-->

        <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-lg-0">
          <div class="course-item">
            <img src="{{url('themes/frontend/assets/img/course-3.jpg')}}" class="img-fluid" alt="...">
            <div class="course-content">
              <div class="d-flex justify-content-between align-items-center mb-3">
                <h4>Fakultas Teknik</h4>
                <p class="price">$180</p>
              </div>

              <h3><a href="course-details.html">MKU Komputer dan Pemrograman</a></h3>
              <p>Et architecto provident deleniti facere repellat nobis iste. Id facere quia quae dolores dolorem tempore.</p>
              <div class="trainer d-flex justify-content-between align-items-center">
                <div class="trainer-profile d-flex align-items-center">
                  <img src="{{url('themes/frontend/assets/img/trainers/trainer-3.jpg')}}" class="img-fluid" alt="">
                  <span>Brandon</span>
                </div>
                <div class="trainer-rank d-flex align-items-center">
                  <i class="bx bx-user"></i>&nbsp;20
                  &nbsp;&nbsp;
                  <i class="bx bx-heart"></i>&nbsp;85
                </div>
              </div>
            </div>
          </div>
        </div> <!-- End Course Item-->

      </div>

    </div>
  </section><!-- End Popular Courses Section --> --}}



</main><!-- End #main -->

@endsection
