<!DOCTYPE html>
<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default"
    data-assets-path="{{ asset('template/assets/') }}" data-template="vertical-menu-template-free">

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>@yield('dashboard-title') | KP-A</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('template/assets/img/favicon/favicon.ico') }}" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet" />

    <!-- Icons. Uncomment required icon fonts -->
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
    <style>
        body{
            background-image: url('{{ asset("images/background/bg7.jpg") }}');
            
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
        }
        .notification{
            margin: 2% 2%;
        }
        .layout-container #layout-menu {
            /* background: rgb(5,67,90); */
            background-color: rgba(255, 255, 255, 0.6) !important;
        }
        .bg-navbar-theme {
            background-color: rgba(255, 255, 255, 0.2) !important;
        }
        .table-tirage, .table-tontine, .table-user {
            background-color: rgba(255, 255, 255, 0.8) !important;
        }
        .menu-link {
            color:black !important;
        }
        .app-brand-link .app-brand-text {
            /* color: rgb(88,153,223); */
            color: black;
        }
        .app-brand-logo{
            border-radius: 15px;
        }
    </style>
    @yield('dashboard-css')
    <!-- Helpers -->
    <script src="{{ asset('template/assets/vendor/js/helpers.js') }}"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="{{ asset('template/assets/js/config.js') }}"></script>
</head>

<body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            {{-- sidebar --}}
            @include('dashboard.layouts.includes._sidebar-left')

            <!-- Layout container -->
            <div class="layout-page">
                {{-- nav bar --}}
                @include('dashboard.layouts.includes._navbar')

                <!-- Content wrapper -->
                <div class="content-wrapper">
                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible notification" style="text-align: center" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                aria-label="Close"></button>
                        </div>
                    @endif
                    @if (session('danger'))
                        <div class="alert alert-danger alert-dismissible notification" style="text-align: center" role="alert">
                            {{ session('danger') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                aria-label="Close"></button>
                        </div>
                    @endif
                    @yield('dashboard-content')

                    @include('dashboard.layouts.includes._footer')

                    <div class="content-backdrop fade"></div>
                </div>
                <!-- Content wrapper -->
            </div>
            <!-- / Layout page -->
        </div>

        <!-- Overlay -->
        <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->



    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="{{ asset('template/assets/vendor/libs/jquery/jquery.js') }}"></script>
    <script src="{{ asset('template/assets/vendor/libs/popper/popper.js') }}"></script>
    <script src="{{ asset('template/assets/vendor/js/bootstrap.js') }}"></script>
    <script src="{{ asset('template/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>

    <script src="{{ asset('js/custom.js') }}"></script>
    @yield('dashboard-js')
    <script src="{{ asset('template/assets/vendor/js/menu.js') }}"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="{{ asset('template/assets/vendor/libs/apex-charts/apexcharts.js') }}"></script>

    <!-- Main JS -->
    <script src="{{ asset('template/assets/js/main.js') }}"></script>

    <!-- Page JS -->
    <script src="{{ asset('template/assets/js/dashboards-analytics.js') }}"></script>
    <script src="{{ asset('template/assets/js/pages-account-settings-account.js') }}"></script>

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
</body>

</html>
