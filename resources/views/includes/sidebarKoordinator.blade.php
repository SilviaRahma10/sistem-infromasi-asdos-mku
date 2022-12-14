<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <div class="sidebar-brand-icon" style=" text-align:center ; padding-top: 30px;">
        {{-- < class="logo me-auto">< href="{{route ('mahasiswa')}}"> --}}
            <img src="{{url('themes/frontend/assets/img/logo2.png')}}" alt="">
    </div>

    <div class="sidebar-brand-text mx-3" style="color: white; text-align:center; font-size:1.2em; font-weight: bold; padding-bottom : 20px;" >Sistem Informasi Asdos MKU Universitas Bengkulu</div> 

<li class="nav-item active">
    <a class="nav-link" href="{{ route('koordinator') }}">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span></a>
</li>


    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Interface
    </div>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('mkuprogram.data') }}">
            <i class="fas fa-fw fa-book"></i>
            <span>Program MKU</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('registration.data') }}">
            <i class="fas fa-fw fa-id-card"></i>
            <span>Pendaftar</span>
        </a>
    </li>

    
    <li class="nav-item">
        <a class="nav-link" href="{{ route('asisten.data') }}">
            <i class="fas fa-chalkboard-teacher"></i>
            <span>Asisten Kelas</span>
        </a>
    </li>




    <!-- Nav Item - Pages Collapse Menu -->



  

    <!-- Divider -->
    <hr class="sidebar-divider">


    <!-- Nav Item - Pages Collapse Menu -->
  



</ul>
<!-- End of Sidebar -->
