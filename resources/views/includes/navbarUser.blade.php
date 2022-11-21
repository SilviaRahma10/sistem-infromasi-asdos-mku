 <!-- ======= Header ======= -->
 <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">

      <h1 class="logo me-auto"><a href="{{route ('mahasiswa')}}">
        <img src="{{url('themes/frontend/assets/img/logo.png')}}" alt=""></a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo me-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

            <nav id="navbar" class="navbar order-last order-lg-0">
              <ul>
                <li><a class="active" href="{{route ('mahasiswa')}}">Home</a></li>
                <li><a class="active" href="{{route ('mahasiswa.program')}}">Program</a></li>
                <li><a class="active" href="{{route ('mahasiswa.about')}}">About</a></li>
                
              </ul>
              <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->
      
            <a href="courses.html" class="get-started-btn">Get Started</a>
            @endif
         
         
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

      <a href="courses.html" class="get-started-btn">Get Started</a>

    </div>
  </header><!-- End Header -->
