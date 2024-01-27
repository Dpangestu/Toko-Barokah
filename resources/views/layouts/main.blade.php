<!DOCTYPE html>

<html lang="en" class="light-style layout-menu-fixed layout-compact" dir="ltr" data-theme="theme-default"
    data-assets-path="{{ asset('template/assets/') }}" data-template="vertical-menu-template-free">

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>{{ config('app.name') }}</title>

    <meta name="description" content="" />
    <meta content="token" name="token" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('template/assets/img/favicon/1.png') }}" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet" />

    <link rel="stylesheet" href="{{ asset('template/assets/vendor/fonts/boxicons.css') }}" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{ asset('template/assets/vendor/css/core.css') }}"
        class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{ asset('template/assets/vendor/css/theme-default.css') }}"
        class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{ asset('template/assets/css/demo.css') }}" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{ asset('template/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />
    <link rel="stylesheet" href="{{ asset('template/assets/vendor/libs/apex-charts/apex-charts.css') }}" />

    <!-- Page CSS -->

    <!-- Helpers -->
    <script src="{{ asset('template/assets/vendor/js/helpers.js') }}"></script>
    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js')}} in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="{{ asset('template/assets/js/config.js') }}"></script>
</head>

<body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">

            <!-- Sidebar -->
            @include('layouts.partial.sidebar')
            <!-- / End Sidebar -->

            <!-- Layout container -->
            <div class="layout-page">

                <!-- Navbar -->
                @include('layouts.partial.navbar')
                <!-- / Navbar -->

                <!-- Content -->
                @yield('content')
                <!-- / Content -->

                <!-- Footer -->
                @include('layouts.partial.footer')
                <!-- / Footer -->

                <div class="content-backdrop fade"></div>

            </div>
            <!-- / Layout page -->
        </div>

        <!-- Overlay -->
        <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->


    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js')}} -->

    <script src="{{ asset('template/assets/vendor/libs/jquery/jquery.js') }}"></script>
    <script src="{{ asset('template/assets/vendor/libs/popper/popper.js') }}"></script>
    <script src="{{ asset('template/assets/vendor/js/bootstrap.js') }}"></script>
    <script src="{{ asset('template/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
    <script src="{{ asset('template/assets/vendor/js/menu.js') }}"></script>

    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="{{ asset('template/assets/vendor/libs/apex-charts/apexcharts.js') }}"></script>

    <!-- Main JS -->
    <script src="{{ asset('template/assets/js/main.js') }}"></script>

    <!-- Page JS -->
    <script src="{{ asset('template/assets/js/dashboards-analytics.js') }}"></script>

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js')}}"></script>
    <!-- Add this script tag to include jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="path/to/bootstrap.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var searchInput = document.getElementById('searchInput');

            if (searchInput) {
                searchInput.addEventListener('input', function() {
                    var searchValue = this.value.toLowerCase();

                    // Panggil fungsi pencarian sesuai kebutuhan, contohnya:
                    // searchInTable(searchValue);
                });
            }
        });

        function searchInTable(keyword) {
            // Logika pencarian di dalam tabel
            // Sesuaikan dengan struktur tabel dan implementasi pencarian Anda
        }
    </script>



</body>

</html>
