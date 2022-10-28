<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div>
    </a>

    <li class="nav-item active">
        <a class="nav-link" href="{{ route('admin') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>


    <!-- Divider -->
    <hr class="sidebar-divider">   

    <!-- Heading -->
    <div class="sidebar-heading">
        Interface
    </div>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">
    <!-- Nav Item - Dashboard --> 

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
            aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fas fa-fw fa-pen"></i>
            <span>Akademik</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Pilih Data:</h6>
                <a class="collapse-item" href="{{ route('fakultas.data') }}">Fakultas</a>
                <a class="collapse-item" href="{{ route('prodi.data') }}">Program Studi</a>
                <a class="collapse-item" href="{{ route('lecturer.data') }}">Dosen</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('school_year.data') }}">
            <i class="fas fa-fw fa-calendar"></i>
            <span>Tahun Akademik</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('generalsubject.data') }}">
            <i class="fas fa-regular fa-book"></i>
            <span>Mata Kuliah Umum</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('program.data') }}">
            {{-- <i class="fas fa-fw fa-university"></i> --}}
            <i class="fas fa-fw fa-pen"></i>
            <span>Program</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('kelas.data') }}">
            <i class="fas fa-fw fa-university"></i>
            <span>Kelas</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('student.data') }}">
            <i class="fas fa-fw fa-users"></i>
            <span>Mahasiswa</span>
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
            <i class="fas fa-fw fa-id-card"></i>
            <span>Asisten Kelas</span>
        </a>
    </li>
    
    {{-- <li class="nav-item">
        <a class="nav-link" href="{{ route('ta.data') }}">
            <i class="fas fa-fw fa-book"></i>
            <span>Tahun Akademik</span></a>
    </li> --}}

    {{-- <li class="nav-item">
        <a class="nav-link" href="{{ route('kelas.data') }}">
            <i class="fas fa-fw fa-book"></i>
            <span>Kelas</span></a>
    </li> --}}

    {{-- <li class="nav-item">
        <a class="nav-link" href="{{ route('mku.data') }}">
            <i class="fas fa-fw fa-book"></i>
            <span>Mata kuliah Umum</span></a>
    </li> --}}


    {{-- <li class="nav-item">
        <a class="nav-link" href="{{ route('koordinatormku.data') }}">
            <i class="fas fa-fw fa-book-reader"></i>
            <span>Koordinator Matkul Kuliah Umum</span></a>
    </li> --}}

    <!-- Nav Item - Pages Collapse Menu -->



    <!-- Nav Item - Utilities Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
            aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fas fa-fw fa-wrench"></i>
            <span>Utilities</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Custom Utilities:</h6>
                <a class="collapse-item" href="utilities-color.html">Colors</a>
                <a class="collapse-item" href="utilities-border.html">Borders</a>
                <a class="collapse-item" href="utilities-animation.html">Animations</a>
                <a class="collapse-item" href="utilities-other.html">Other</a>
            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Addons
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
            aria-expanded="true" aria-controls="collapsePages">
            <i class="fas fa-fw fa-folder"></i>
            <span>Pages</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Login Screens:</h6>
                <a class="collapse-item" href="login.html">Login</a>
                <a class="collapse-item" href="register.html">Register</a>
                <a class="collapse-item" href="forgot-password.html">Forgot Password</a>
                <div class="collapse-divider"></div>
                <h6 class="collapse-header">Other Pages:</h6>
                <a class="collapse-item" href="404.html">404 Page</a>
                <a class="collapse-item" href="blank.html">Blank Page</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Charts -->
    <li class="nav-item">
        <a class="nav-link" href="charts.html">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Charts</span></a>
    </li>

    <!-- Nav Item - Tables -->
    <li class="nav-item">
        <a class="nav-link" href="tables.html">
            <i class="fas fa-fw fa-table"></i>
            <span>Tables</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

    <!-- Sidebar Message -->
    <div class="sidebar-card d-none d-lg-flex">
        <img class="sidebar-card-illustration mb-2" src="{{ asset('themes/sb-admin-2/img/undraw_rocket.svg') }}">
        <p class="text-center mb-2"><strong>SB Admin Pro</strong> is packed with premium features, components, and more!</p>
        <a class="btn btn-success btn-sm" href="https://startbootstrap.com/theme/sb-admin-pro">Upgrade to Pro!</a>
    </div>

</ul>
<!-- End of Sidebar -->