@extends('layouts.main')
@section('content')


<main id="main">
    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs" data-aos="fade-in">
      <div class="container">
        <h2>Notifikasi</h2>
        <p>Informasi Pengumuman Pendaftaran Program</p>
      </div>
    </div><!-- End Breadcrumbs -->

<section class="section-50">
    <div class="container">
        <h3 class="m-b-50 heading-line">Notifikasi<i class="fa fa-bell text-muted"></i></h3>

        @foreach (collect($notifications)->reverse() as $notification)
        
        <div class="notification-ui_dd-content">
            <div class="notification-list">
                <div class="notification-list_content">
                    <div class="notification-list_detail">
                        @if($notification->status == 0)

                        <p><b>PENGUMUMAN !!</b> Hi, {{ auth()->user()->name }}</p>
                        <p><b>Pendaftaran Anda Terkirim, silahkan tunggu informasi selanjutnya</b></p>
                        
                        @elseif($notification->status == 1)

                        <p><b>PENGUMUMAN !!</b> Hi, {{ auth()->user()->name }}</p>
                        <p><b>Selamat, Pendaftaran Asdos Anda Dinyatakan Lulus</b></p>
                        <br>
                        <p class="text-muted">Informasi Pendaftaran : </p>
                        <p class="text-muted">Tahun Akademik: {{ $notification->program->tahun_ajaran->tahun }}</p>
                        <p class="text-muted">Semester: 
                            
                            @if($notification->program->tahun_ajaran->semester==1) 
                            Ganjil
                            @else
                            Genap
                            @endif
                            
                            </p>
                        <p class="text-muted">Mku Yang Diampu: {{ $notification->mku->nama }}</p>

                    
                        @else

                        <p><b>PENGUMUMAN !!</b> Hi, {{ auth()->user()->name }}</p>
                        <p><b>Maaf, Pendaftaran Asdos Anda Belum Diterima</b></p>
                        
                        @endif
                        
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    </div>
</section>

</main><!-- End #main -->
@endsection
