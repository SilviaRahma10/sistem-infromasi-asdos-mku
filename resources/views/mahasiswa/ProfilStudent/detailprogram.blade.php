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
              @if($date < $mku_program->program->tanggal_tutup)

                  @if ( ! check_mahasiswa_mku($mku_program->id, auth()->user()->mahasiswa->id) )
                  <a href="{{route('mahasiswa.daftar',$mku_program->id)}}"><button type="submit" class="btn btn-danger" style="font-weight: bolder"> 
                    DAFTAR
                  </button> </a>

                  @else
                  <a href=""><button type="submit" class="btn btn-success"> 
                    Anda Sudah Mendaftar
                  </button> </a>

                  @endif
                 
              @else
              <a href=""><button  class="btn btn-danger"> 
                Tutup
              </button> </a>
              @endif
              
              <br><br>
                <h2>{{ $mku_program->mku->nama }}</h2>
             
              <div class="trainer">
                <i class="bi bi-award-fill"></i>
                 <span>Program Bersertifikat</span><br><br>
              </div>

              <div class="trainer">
                <i class="bi bi-people-fill"></i>
                <span>Kuota : {{ $mku_program->kuota }}</span><br><br>
             </div>

             <div class="trainer">
              <i class="bi bi-calendar-check-fill"></i>
                <span> Pendaftaran : {{ $mku_program->program->tanggal_buka }} s/d {{ $mku_program->program->tanggal_tutup }}</span><br><br>
              </div>

              <div class="trainer">

                <i class="bi bi-bookmark-star-fill"></i>
                <span>Pelaksanaan </span>
                <ul>
                <li>  Tahun    : {{ $mku_program->program->tahun_ajaran->tahun }}</li> 
                <li>  Semester :
                  @if($mku_program->program->tahun_ajaran->semester==1)
                     Ganjil
                  @else
                     Genap
                  @endif
                </li>
              </ul>
              </div>
      </section><!-- End Cource Details Section -->

      <!-- ======= Cource Details Tabs Section ======= -->
      <section id="cource-details-tabs" class="cource-details-tabs">
        <div class="container" data-aos="fade-up">

          <div class="row">
            <div class="col-lg-3">
              <ul class="nav nav-tabs flex-column">

                <li class="nav-item">
                  <a class="nav-link active show" data-bs-toggle="tab" href="#tab-1">Deskrispsi Tugas</a>
                </li>

                <li class="nav-item">
                  <a class="nav-link " data-bs-toggle="tab" href="#tab-2">Kualifikasi</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" data-bs-toggle="tab" href="#tab-3">Syarat & Ketentuan</a>
                </li>

                <li class="nav-item">
                  <a class="nav-link " data-bs-toggle="tab" href="#tab-4">Tata Cara Pendaftar</a>
                </li>

              
              </ul>
            </div>
            <div class="col-lg-9 mt-4 mt-lg-0">
              <div class="tab-content">

                <div class="tab-pane active show" id="tab-1">
                  <div class="row">
                    <div class="col-lg-8 details order-2 order-lg-1">
                      <h3>Deskrispsi Tugas</h3>
                      <p>
                        <ol>
                          <li>Melaksanakan kegiatan mengajar pada kelas pratikum</li>
                          <li>Memeriksa tugas atau laporan pratikum</li>
                          <li>merekap nilai tugas dan laporan mahasiswa</li>
                      </ol>  
                      </p>   
                    </div>
                    <div class="col-lg-4 text-center order-1 order-lg-2">
                      <img src="{{url('themes/frontend/assets/img/course-details-tab-2.png')}}" alt="" class="img-fluid">
                    </div>
                  </div>
                </div>

                
                <div class="tab-pane " id="tab-2">
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

                <div class="tab-pane" id="tab-3">
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

                <div class="tab-pane " id="tab-4">
                  <div class="row">
                    <div class="col-lg-8 details order-2 order-lg-1">
                      <h3>Tata Cara Pendaftaran</h3>
                      <p>
                        <ol>
                          <li>Upload Berkas KHS, KRS, dan Surat Rekomendasi ke Gdrive</li>
                          <li>Buka Akses  dan Copy Link Gdrive dari berkas tersebut</li>
                          <li>Pilih MKU yang akan di daftari, setiap mahasiswa hanya diperbolehkan mendaftar pada 1 MKU saja</li>
                          <li>Baca terlebih dahulu deskrspi tugas, kualifikasi, syarat & ketentuan,</li>
                          <li>Klik Tombol Daftar</li>
                          <li>Isi dan lengkapi data Pendaftaran ( isi berkas khs, krs, dan surat rekomendasi berupa link gdrive berkas anda)</li>
                          <li>Pendaftaran Selesai</li>
                          <li>Silahkan Tunggu Pengumuman pada laman Notifikasi</li>
                      </ol>  
                        
                      </p>
                      
                    </div>
                    <div class="col-lg-4 text-center order-1 order-lg-2">
                      <img src="{{url('themes/frontend/assets/img/course-details-tab-1.png')}}" alt="" class="img-fluid">
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
