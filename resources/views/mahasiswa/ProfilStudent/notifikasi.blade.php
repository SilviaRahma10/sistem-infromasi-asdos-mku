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
                        <p class="text-muted">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Unde, dolorem.</p>
                        <p class="text-muted"><small>{{ $asisten }}</small></p>
                    </div>
                </div>
                <div class="notification-list_feature-img">
                    <img src="https://i.imgur.com/bpBpAlH.jpg" alt="Feature image">
                </div>
            </div>
        </div>
        @endforeach

        <div class="text-center">
            <a href="#!" class="dark-link">Load more activity</a>
        </div>

    </div>
</section>

</main><!-- End #main -->
@endsection
