@extends('layouts.main')
@section('content')
<main id="main" data-aos="fade-in">

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs">
      <div class="container">
        <h2>Program</h2>

        <p>Program Asisten Dosen Mata Kuliah Umum</p>
        <p>Segera Daftarkan Diri Anda Pada Salah Satu Program Dibawah ini!</p>
      </div>
    </div><!-- End Breadcrumbs -->

    <!-- ======= Courses Section ======= -->
    <section id="courses" class="courses">
      <div class="container" data-aos="fade-up">
      
        
        <div class="row" data-aos="zoom-in" data-aos-delay="100">
          
          @foreach($mku_programs as $mku_program)
       
            <div class=" flex-0-0-2 shadow-0-0-1392 card-0-0-1370 transition-0-0-76">
          
                  <img src="{{url('themes/frontend/assets/img/course-1.jpg')}}" class="img-fluid" alt="...">
                  <div class="course-content">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                      <div>
                        <h3><a href="{{route('mahasiswa.detail', $mku_program)}}">{{ $mku_program->mku->nama }}</a></h3>
                      </div>
                    </div>
                    <div class="trainer-rank d-flex align-items-center">
                      <i class="bx uil:calender"></i>{{$mku_program->program->tanggal_buka}} s/d {{$mku_program->program->tanggal_tutup}}
                    </div>
                     
                      <p>{{$mku_program->program->tahun_ajaran->tahun}} - 
                            @if($mku_program->program->tahun_ajaran->semester==1)
                                Ganjil
                            @else
                                Genap
                            @endif
                        
                      </p>
                     <p>Rekrutment Assisten Dosen Untuk Mata Kuliah Umum {{ $mku_program->mku->nama }}</p>
                    <div class="trainer d-flex justify-content-between align-items-center">
                      <div class="trainer-profile d-flex align-items-center">                      
                        <a href="{{ route('mahasiswa.detail', $mku_program ) }}"><button type="submit" class="btn btn-warning"> 
                          Details Program
                        </button> </a>                       
                      </div>
                     </div>
                  </div>
            </div>
        @endforeach
      </div>
    </div>


    </section><!-- End Courses Section -->

  </main><!-- End #main -->
  @endsection