<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>@yield('title')</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="{{url('themes/admin/vendors/feather/feather.css')}}">
  <link rel="stylesheet" href="{{url('themes/admin/vendors/ti-icons/css/themify-icons.css')}}">
  <link rel="stylesheet" href="{{url('themes/admin/vendors/css/vendor.bundle.base.css')}}">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="{{url('themes/admin/vendors/datatables.net-bs4/dataTables.bootstrap4.css')}}">
  <link rel="stylesheet" href="{{url('themes/admin/vendors/ti-icons/css/themify-icons.css')}}">
  <link rel="stylesheet" type="text/css" href="{{url('themes/admin/js/select.dataTables.min.css')}}">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="{{url('themes/admin/css/vertical-layout-light/style.css')}}">
  <!-- endinject -->
  <link rel="shortcut icon" href="{{url('themes/admin/images/favicon.png')}}" />
</head>

<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    @include('includes.navbar')
    <!-- partial -->
    @yield('content')
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  <!-- plugins:js -->
  <script src="{{url('themes/admin/vendors/js/vendor.bundle.base.js')}}"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="{{url('themes/admin/vendors/chart.js/Chart.min.js')}}"></script>
  <script src="{{url('themes/admin/vendors/datatables.net/jquery.dataTables.js')}}"></script>
  <script src="{{url('themes/admin/vendors/datatables.net-bs4/dataTables.bootstrap4.js')}}"></script>
  <script src="{{url('themes/admin/js/dataTables.select.min.js')}}"></script>

  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="{{url('themes/admin/js/off-canvas.js')}}"></script>
  <script src="{{url('themes/admin/js/hoverable-collapse.js')}}"></script>
  <script src="{{url('themes/admin/js/template.js')}}"></script>
  <script src="{{url('themes/admin/js/settings.js')}}"></script>
  <script src="{{url('themes/admin/js/todolist.js')}}"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="{{url('themes/admin/js/dashboard.js')}}"></script>
  <script src="{{url('themes/admin/js/Chart.roundedBarCharts.js')}}"></script>
  <!-- End custom js for this page-->


  @if (session()->has('success'))
  <script>
      Swal.fire(
'Berhasil!',
'{{ session()->get('success') }}',
'success'
)
  </script>
@endif

@stack('custom_js')
</body>

</html>

