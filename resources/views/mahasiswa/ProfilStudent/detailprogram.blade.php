@extends('layouts.main')
@section('content')


    <!-- ======= Breadcrumbs ======= -->
      <div class="breadcrumbs" data-aos="fade-in">
        <div class="container">
          <h2>Detail Program</h2>
          <p>Detail Informasi Program {{ $mku_program->mku->nama }}  </p>
        </div>
      </div>

      <div class="box-0-0-1 contentContainer-0-0-1473">

      <!-- ======= Cource Details Section ======= -->
      <section id="course-details" class="course-details">
        
              <img src="{{url('themes/frontend/assets/img/course-details.jpg')}}" class="img-fluid" alt="">
              <br><br>
              <a href="{{route('mahasiswa.daftar',$mku_program->id)}}"><button type="submit" class="btn btn-danger"> 
                DAFTAR
              </button> </a>
              <br><br>
              {{-- <h3>{{ $mku_program->mku->nama }}</h3> --}}
              
                <h2>{{ $mku_program->mku->nama }}</h2>
             
              <div class="trainer">
                 <h5>Program Bersertifikat</h5>
              </div>

              <div class="trainer">
                <h5>Kuota : {{ $mku_program->kuota }}</h5>
             </div>

             <div class="trainer">
                <h5>Periode Pendaftaran : {{ $mku_program->program->tanggal_buka }} s/d {{ $mku_program->program->tanggal_tutup }}</h5>
              </div>

              <div class="trainer">
                <h5>Pelaksanaan </h5>
                <h6>Tahun    : {{ $mku_program->program->tahun_ajaran->tahun }}</h6> 
                <h6>Semester :
                  @if($mku_program->program->tahun_ajaran->semester==1)
                     Ganjil
                  @else
                     Genap
                  @endif
                </h6>
              </div>

              <div class="trainer">
                <h5>Deskrispsi Tugas</h5>
                <ol>
                  <li>Melaksanakan kegiatan mengajar pada kelas pratikum</li>
                  <li>Memeriksa tugas atau laporan pratikum</li>
                  <li>merekap nilai tugas dan laporan mahasiswa</li>
              </ol>
              </div>
      </section><!-- End Cource Details Section -->

      <!-- ======= Cource Details Tabs Section ======= -->
      <section id="cource-details-tabs" class="cource-details-tabs">
        <div class="container" data-aos="fade-up">

          <div class="row">
            <div class="col-lg-3">
              <ul class="nav nav-tabs flex-column">
                <li class="nav-item">
                  <a class="nav-link active show" data-bs-toggle="tab" href="#tab-1">Kualifikasi</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" data-bs-toggle="tab" href="#tab-2">Syarat & Ketentuan</a>
                </li>
              </ul>
            </div>
            <div class="col-lg-9 mt-4 mt-lg-0">
              <div class="tab-content">
                <div class="tab-pane active show" id="tab-1">
                  <div class="row">
                    <div class="col-lg-8 details order-2 order-lg-1">
                      <h3>Kualifikasi</h3>
                      <p>{{ $mku_program->kualifikasi }}</p>
                      
                    </div>
                    <div class="col-lg-4 text-center order-1 order-lg-2">
                      <img src="{{url('themes/frontend/assets/img/course-details-tab-1.png')}}" alt="" class="img-fluid">
                    </div>
                  </div>
                </div>
                <div class="tab-pane" id="tab-2">
                  <div class="row">
                    <div class="col-lg-8 details order-2 order-lg-1">
                      <h3>Syarat & Ketentuan</h3>
                      <p>{{ $mku_program->syarat }}</p>
                      
                    </div>
                    <div class="col-lg-4 text-center order-1 order-lg-2">
                      <img src="{{url('themes/frontend/assets/img/course-details-tab-2.png')}}" alt="" class="img-fluid">
                    </div>
                  </div>
                </div>
                

              </div>
            </div>
          </div>


        </div>
      </section><!-- End Cource Details Tabs Section -->
    </div>

    </main><!-- End #main -->


@endsection
