<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    {{-- <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html"> --}}
        <div class="sidebar-brand-icon" style=" text-align:center ; padding-top: 30px;">
            {{-- < class="logo me-auto">< href="{{route ('mahasiswa')}}"> --}}
                <img src="{{url('themes/frontend/assets/img/logo2.png')}}" alt="">
        </div>

        <div class="sidebar-brand-text mx-3" style="color: white; text-align:center; font-size:1.2em; font-weight: bold; padding-bottom : 20px;" >Sistem Informasi Asdos MKU Universitas Bengkulu</div> 
        

    <li class="nav-item active">
        <a class="nav-link" href="{{ route('admin') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>


    <!-- Divider -->
    <hr class="sidebar-divider">


    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
            aria-expanded="true" aria-controls="collapseUtilities">
            
            <i class="fas fa-fw fa-university"></i>
            <span>Akademik</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Pilih Data:</h6>
                <a class="collapse-item" href="{{ route('fakultas.data') }}">Fakultas</a>
                <a class="collapse-item" href="{{ route('prodi.data') }}">Program Studi</a>
                {{-- <a class="collapse-item" href="{{ route('lecturer.data') }}">Dosen</a> --}}
            </div>
        </div>
    </li>
    {{-- <hr class="sidebar-divider"> --}}

    <li class="nav-item">
        <a class="nav-link" href="{{ route('generalsubject.data') }}">
            <i class="fas fa-fw fa-book"></i>
            <span>Mata Kuliah Umum</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('koordinator.data') }}">
            <i class="fas fa-fw fa-id-card"></i>
            <span>Koordinator MKU</span>
        </a>
    </li>


    <li class="nav-item">
        <a class="nav-link" href="{{ route('school_year.data') }}">
            <i class="fas fa-fw fa-calendar"></i>
            <span>Tahun Akademik</span>
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
        <a class="nav-link" href="{{ route('student.data') }}">
            <i class="fas fa-fw fa-users"></i>
            <span>Mahasiswa</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('asisten.datasisten') }}">
            <i class="fas fa-chalkboard-teacher"></i>
            <span>Asisten Kelas</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('Ketuapusat.lihat') }}">
            <i class="fas fa-fw fa-user-tie"></i>
            <span>Ketua Pusat</span>
        </a>
    </li>

    <hr class="sidebar-divider">
</ul>

