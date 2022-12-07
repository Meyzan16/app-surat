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

    <title>E-surat FMIPA</title>

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

    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css" />

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
        
        @include('sweetalert::alert')
        
      </div>

      <!-- Overlay -->
      <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->

    @stack('addon-script')

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
    
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>

  

    
    <script>
      window.setTimeout(function() {
           $(".autohide").fadeTo(500, 0).slideUp(500, function() {
               $(this).remove();
           });
       }, 4000);
   </script>

@stack('prepend-script')
   
  </body>
</html>



