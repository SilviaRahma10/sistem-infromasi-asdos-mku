@extends('layouts.main')
@section('content')
<main id="main" data-aos="fade-in">

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs">
      <div class="container">
        <h2>Sertifikat</h2>
      </div>
    </div><!-- End Breadcrumbs -->

    <!-- ======= Courses Section ======= -->
    <section id="courses" class="courses">
      <div class="container" data-aos="fade-up">
      
        
        <div class="row" data-aos="zoom-in" data-aos-delay="100">
          
          {{-- @foreach() --}}
       
            <div class=" flex-0-0-2 shadow-0-0-1392 card-0-0-1375 transition-0-0-76">
          
                  <img src="{{url('themes/frontend/assets/img/course-1.jpg')}}" class="img-fluid" alt="...">
                  <div class="course-content">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                      <div>
                        <h3><a href=""></a> mku ....</h3>
                      </div>
                    </div>
                  
                    <div class="trainer d-flex justify-content-between align-items-center">
                      <div class="trainer-profile d-flex align-items-center">                      
                        <a href=""><button type="submit" class="btn btn-warning"> 
                          Unduh Sertifikat
                        </button> </a>                       
                      </div>
                     </div>
                  </div>
            </div>
        {{-- @endforeach --}}
      </div>
    </div>


    </section><!-- End Courses Section -->

  </main><!-- End #main -->
  @endsection