<!DOCTYPE html>

<html
  lang="en"
  class="light-style layout-menu-fixed"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="/template-siswa/assets/"
  data-template="vertical-menu-template-free"
>
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />

    <title>Dashboard - Analytics | Sneat - Bootstrap 5 HTML Admin Template - Pro</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="/template-siswa/assets/img/favicon/favicon.ico" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet"
    />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="/template-siswa/assets/vendor/fonts/boxicons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="/template-siswa/assets/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="/template-siswa/assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="/template-siswa/assets/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="/template-siswa/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

    <link rel="stylesheet" href="/template-siswa/assets/vendor/libs/apex-charts/apex-charts.css" />

    <!-- Page CSS -->

    <!-- Helpers -->
    <script src="/template-siswa/assets/vendor/js/helpers.js"></script>
    <script src="/template-siswa/assets/js/config.js"></script>
  </head>

  <body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">

        {{-- sidebar --}}
        @include('mhs.partials.sidebar')
        {{-- tutup sidebar --}}


        <!-- Layout container -->
        <div class="layout-page">
          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->

            @yield('content')
           
            <!-- / Content -->

            <!-- Footer -->
            <footer class="content-footer footer bg-footer-theme">
              <div class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
                <div class="mb-2 mb-md-0">
                  ©
                  <script>
                    document.write(new Date().getFullYear());
                  </script> 
                  <a  class="footer-link fw-bolder">Universitas Bengkulu</a>
                </div>
              
              </div>
            </footer>
            <!-- / Footer -->

            <div class="content-backdrop fade"></div>
          </div>
      
        </div>
        
      </div>

      <!-- Overlay -->
      <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->

  

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="/template-siswa/assets/vendor/libs/jquery/jquery.js"></script>
    <script src="/template-siswa/assets/vendor/libs/popper/popper.js"></script>
    <script src="/template-siswa/assets/vendor/js/bootstrap.js"></script>
    <script src="/template-siswa/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

    <script src="/template-siswa/assets/vendor/js/menu.js"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="/template-siswa/assets/vendor/libs/apex-charts/apexcharts.js"></script>

    <!-- Main JS -->
    <script src="/template-siswa/assets/js/main.js"></script>

    <!-- Page JS -->
    <script src="/template-siswa/assets/js/dashboards-analytics.js"></script>

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
  </body>
</html>





{{-- 
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Skydash Admin</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="/template-siswa/template/vendors/feather/feather.css">
  <link rel="stylesheet" href="/template-siswa/template/vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="/template-siswa/template/vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="/template-siswa/template/vendors/datatables.net-bs4/dataTables.bootstrap4.css">
  <link rel="stylesheet" href="/template-siswa/template/vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" type="/template-siswa/template/text/css" href="js/select.dataTables.min.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="/template-siswa/template/css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="/template-siswa/template/images/favicon.png" />
</head>

<body>

  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
     @include('mhs.partials.navbar')

    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_settings-panel.html -->

      @include('mhs.partials.sidebar')

      
      <div class="main-panel">
        
       


        <footer class="footer">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2021.  Premium <a href="https://www.bootstrapdash.com/" target="_blank">Bootstrap admin template</a> from BootstrapDash. All rights reserved.</span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with <i class="ti-heart text-danger ml-1"></i></span>
          </div>
        </footer>
        <!-- partial -->
      </div>
     
    </div>
    <!-- page-body-wrapper ends -->
  </div>
 


 
  
  <!-- plugins:js -->
  <script src="/template-siswa/template/vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="/template-siswa/template/vendors/chart.js/Chart.min.js"></script>
  <script src="/template-siswa/template/vendors/datatables.net/jquery.dataTables.js"></script>
  <script src="/template-siswa/template/vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
  <script src="/template-siswa/template/js/dataTables.select.min.js"></script>

  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="/template-siswa/template/js/off-canvas.js"></script>
  <script src="/template-siswa/template/js/hoverable-collapse.js"></script>
  <script src="/template-siswa/template/js/template.js"></script>
  <script src="/template-siswa/template/js/settings.js"></script>
  <script src="/template-siswa/template/js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="/template-siswa/template/js/dashboard.js"></script>
  <script src="/template-siswa/template/js/Chart.roundedBarCharts.js"></script>


</body>

</html> --}}

