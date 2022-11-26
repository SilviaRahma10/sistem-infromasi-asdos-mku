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

        @foreach ($asistens as $asisten)
        
        <div class="notification-ui_dd-content">
            <div class="notification-list">
                <div class="notification-list_content">
                    <div class="notification-list_detail">
                        <p><b>PENGUMUMAN !!</b> Hi, {{ auth()->user()->name }}</p>
                        <p><b>Selamat, Pendaftaran Asdos Anda Dinyatakan Lulus</b></p>
                        <br>
                        <p class="text-muted">Informasi Penempatan : </p>
                        <p class="text-muted">Prodi: {{ $asisten->kelas->mku_prodi->prodi->nama }}</p>
                        <p class="text-muted">Kelas : {{ $asisten->kelas->nama }} {{ $asisten->kelas->hari }}</p>
                        <p class="text-muted">Mku : {{ $asisten->pendaftaran->mku->nama }}</></p>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</section>

</main><!-- End #main -->
@endsection
