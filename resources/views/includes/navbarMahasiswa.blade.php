 <!-- ======= Header ======= -->
 <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">

      <h1 class="logo me-auto"><a href="{{route ('mahasiswa')}}">
        <img src="{{url('themes/frontend/assets/img/LOGOUNIB.png')}}" alt=""></a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo me-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

    
      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li><a  href="{{route ('mahasiswa')}}">Home</a></li>
          <li><a  href="{{route ('mahasiswa.program')}}">Program</a></li>
          <li><a  href="{{route ('mahasiswa.contact')}}">Notifications</a></li>
          <li><a  href="{{route ('mahasiswa.about')}}">About</a></li>
          
          @if (auth()->user())

          <li> <div class="nav-item dropdown back" style="width: max-content; border-radius:8px; background: #15246a; margin-left : 30px; padding-right:30px">
            <a style="color:white" class="nav-link dropdown-toggle" href="#" id="dropdown1" data-toggle="dropdown"
                arial-haspopup="true" arial-expanded="false">{{ auth()->user()->name }}</a>
            <div class="dropdown-menu" arial-labelledby="dropdown1">
              <a href="{{route ('mahasiswa.profil')}}">Profile</a>
              <a href="{{route('mahasiswa.edit')}}">Edit Profile</a>
              <a href="{{route ('mahasiswa.sertifikat')}}">Sertifikat</a>
              <a href="{{route('mahasiswa.password') }}">Change Password</a>

              <form method="POST" action="{{ route('logout') }}">
                @csrf

                <li><a href="route('logout')" 
                  onclick="event.preventDefault();
                  this.closest('form').submit();"> 
                  Logout</a></li>
              </form>
            </div>
        </div> </li>

          {{-- <li class="dropdown"><a href="#" class="active"><span>{{ auth()->user()->name }}</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="{{route ('mahasiswa.profil')}}">Profile</a></li>
              <li><a href="{{route('mahasiswa.edit')}}">Edit Profile</a></li>
              <li><a href="{{route ('mahasiswa.profil')}}">Sertifikat</a></li>
              <li><a href="{{route('mahasiswa.password') }}">Change Password</a></li>

              <form method="POST" action="{{ route('logout') }}">
                @csrf

                <li><a href="route('logout')" 
                  onclick="event.preventDefault();
                  this.closest('form').submit();"> 
                  Logout</a></li>
              </form>

            </ul>
          </li> --}}

          @else
          <a href="{{ route('login') }}"><button type="submit" class="btn" style="background: #15246a ; color:white"> 
            Login
          </button> </a>  

          @endif
        </ul>

       
        </nav>
      </div>
    </header>
