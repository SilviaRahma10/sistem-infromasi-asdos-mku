@extends('layouts.main')
@section('content')
<main id="main" data-aos="fade-in">

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs">
      <div class="container">
        <h2>Sertifikat</h2>
      </div>
    </div>

    <!-- ======= Courses Section ======= -->
    <section id="courses" class="courses">
      <div class="container" data-aos="fade-up">
        
        <div class="row" data-aos="zoom-in" data-aos-delay="100" style="margin-bottom: 30px">
          
          {{-- @foreach() --}} 
          @foreach ($items as $item)

          @if ($item->program->is_active == 0)
          
          <div class=" flex-0-0-2 shadow-0-0-1392 card-0-0-1379 transition-0-0-76">
          
            <img src="{{url('themes/frontend/assets/img/sertifikat.png')}}" class="img-fluid" alt="...">
            <div class="course-content">
              <div class="d-flex justify-content-between align-items-center mb-3">
                <div>
                  <h3><a href=""></a> MKU {{ $item->mku->nama }}</h3>
                </div>
              </div>
            
              <div class="trainer d-flex justify-content-between align-items-center">
                <div class="trainer-profile d-flex align-items-center">                      
                  <a href="{{ route('mahasiswa.print', $item->id) }}" target="_blank">
                    <button type="submit" class="btn btn-warning"> 
                    Unduh Sertifikat
                    </button> 
                </a>                       
                </div>
              </div>
            </div>
      </div><br><br>
          {{-- @else
              <h1>Pendaftaran Anda Belum Diterima</h1> --}}
          @endif
          @endforeach  
      </div>
    </div>
  </section>
  </main>
  @endsection