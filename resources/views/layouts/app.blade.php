<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">

    <title>@yield('title') &mdash; CWB</title>

    <!-- ==========================================================
         GENERAL CSS
    =========================================================== -->
    <link rel="stylesheet" href="{{ asset('library/bootstrap/dist/css/bootstrap.min.css') }}">

    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous"
        referrerpolicy="no-referrer"
    >

    <!-- ==========================================================
         STISLA CSS
    =========================================================== -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/components.css') }}">

    <!-- ==========================================================
         CASHWAVE GLOBAL DARK THEME
         Hanya mengatur area global.
         Card / table / form tetap diatur oleh halaman masing-masing.
    =========================================================== -->
    <style>
        :root {
            --cw-bg: #0b1020;
            --cw-bg-secondary: #0f1728;
            --cw-sidebar: #0e1525;
            --cw-topbar: #101728;

            --cw-border: rgba(255, 255, 255, 0.075);

            --cw-text: #f4f7ff;
            --cw-muted: #8f9bb5;

            --cw-primary: #6d73ff;
            --cw-primary-2: #8b5cf6;
        }

        /* ======================================================
           GLOBAL
        ====================================================== */

        html {
            background: var(--cw-bg) !important;
        }

        body {
            margin: 0;
            padding: 0;

            background: var(--cw-bg) !important;
            color: var(--cw-text);

            font-family:
                'Segoe UI',
                Tahoma,
                Geneva,
                Verdana,
                sans-serif;
        }

        /* ======================================================
           STISLA MAIN WRAPPER
        ====================================================== */

        #app {
            background: var(--cw-bg) !important;
            min-height: 100vh;
        }

        .main-wrapper {
            background: var(--cw-bg) !important;
            min-height: 100vh;
        }

        .main {
            background: var(--cw-bg) !important;
            min-height: 100vh;
        }

        /* ======================================================
           TOP NAVBAR
        ====================================================== */

        .main-header {
            background: var(--cw-topbar) !important;

            border-bottom:
                1px solid var(--cw-border) !important;

            box-shadow:
                0 8px 25px rgba(0, 0, 0, 0.18) !important;
        }

        .main-header .navbar {
            background: transparent !important;
        }

        .main-header .nav-link {
            color: #b7c0d3 !important;
        }

        .main-header .nav-link:hover {
            color: #ffffff !important;
        }

        /* hamburger */
        .main-header .nav-link i {
            color: #8d98ad !important;
        }

        /* ======================================================
           MAIN CONTENT
        ====================================================== */

        .main-content {
            min-height: 100vh;

            background:
                radial-gradient(
                    circle at 72% -10%,
                    rgba(109, 115, 255, 0.08),
                    transparent 30%
                ),
                var(--cw-bg) !important;
        }

        /*
         * Jangan memberi background solid ke section.
         * Supaya card dari masing-masing halaman tetap terlihat.
         */

        .section,
        .section-body {
            background: transparent !important;
        }

        /* ======================================================
           PAGE HEADER
        ====================================================== */

        .section-header {
            background: rgba(17, 24, 42, 0.72) !important;

            border: 1px solid var(--cw-border) !important;

            border-radius: 18px !important;

            box-shadow:
                0 10px 30px rgba(0, 0, 0, 0.14) !important;
        }

        .section-header h1 {
            color: var(--cw-text) !important;
        }

        .section-header-breadcrumb {
            color: var(--cw-muted) !important;
        }

        .breadcrumb-item {
            color: var(--cw-muted) !important;
        }

        .breadcrumb-item a {
            color: #929cff !important;
        }

        /* ======================================================
           SIDEBAR
        ====================================================== */

        .main-sidebar {
            background:
                radial-gradient(
                    circle at 40% -10%,
                    rgba(109, 115, 255, 0.10),
                    transparent 32%
                ),
                var(--cw-sidebar) !important;

            border-right:
                1px solid var(--cw-border) !important;

            box-shadow:
                10px 0 30px rgba(0, 0, 0, 0.12) !important;
        }

        #sidebar-wrapper {
            background: transparent !important;
        }

        /* ======================================================
           SIDEBAR BRAND
        ====================================================== */

        .sidebar-brand {
            background: transparent !important;

            border-bottom:
                1px solid var(--cw-border) !important;
        }

        .sidebar-brand a {
            color: #f6f8ff !important;

            font-weight: 800 !important;

            letter-spacing: 2px !important;
        }

        .sidebar-brand-sm a {
            color: #ffffff !important;
        }

        /* ======================================================
           SIDEBAR MENU
        ====================================================== */

        .sidebar-menu li a {
            color: #929db4 !important;
        }

        .sidebar-menu li a span {
            color: inherit !important;
        }

        .sidebar-menu li a i {
            color: #69758d !important;
        }

        .sidebar-menu li a:hover {
            color: #ffffff !important;

            background:
                rgba(109, 115, 255, 0.075) !important;
        }

        .sidebar-menu li a:hover i {
            color: #9da3ff !important;
        }

        /* Active menu */
        .sidebar-menu li.active > a {
            color: #ffffff !important;

            background:
                linear-gradient(
                    90deg,
                    rgba(109, 115, 255, 0.18),
                    rgba(139, 92, 246, 0.10)
                ) !important;

            box-shadow:
                inset 0 0 0 1px rgba(109, 115, 255, 0.10);
        }

        .sidebar-menu li.active > a i {
            color: #aeb4ff !important;
        }

        /* ======================================================
           MAIN FOOTER
        ====================================================== */

        .main-footer {
            background: var(--cw-bg) !important;

            border-top:
                1px solid var(--cw-border) !important;

            color: var(--cw-muted) !important;
        }

        .main-footer a {
            color: #aeb4ff !important;
        }

        /* ======================================================
           DROPDOWN
        ====================================================== */

        .dropdown-menu {
            background: #151e32 !important;

            border:
                1px solid var(--cw-border) !important;

            box-shadow:
                0 18px 40px rgba(0, 0, 0, 0.30) !important;
        }

        .dropdown-item {
            color: #c3ccdd !important;
        }

        .dropdown-item:hover,
        .dropdown-item:focus {
            color: #ffffff !important;

            background:
                rgba(109, 115, 255, 0.10) !important;
        }

        /* ======================================================
           MODAL
        ====================================================== */

        .modal-content {
            background: #11182a !important;

            border:
                1px solid var(--cw-border) !important;

            color: var(--cw-text) !important;
        }

        .modal-header,
        .modal-footer {
            border-color: var(--cw-border) !important;
        }

        /* ======================================================
           SCROLLBAR
        ====================================================== */

        ::-webkit-scrollbar {
            width: 7px;
            height: 7px;
        }

        ::-webkit-scrollbar-track {
            background: #0b1020;
        }

        ::-webkit-scrollbar-thumb {
            background: #29324a;
            border-radius: 999px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: #3a4564;
        }

        /* ======================================================
           MOBILE
        ====================================================== */

        @media (max-width: 1024px) {
            .main-content {
                background:
                    radial-gradient(
                        circle at 72% -10%,
                        rgba(109, 115, 255, 0.06),
                        transparent 32%
                    ),
                    var(--cw-bg) !important;
            }
        }
    </style>

    <!-- ==========================================================
         PAGE-SPECIFIC CSS
    =========================================================== -->
    @stack('style')
</head>

<body>

    <div id="app">

        <div class="main-wrapper">

            <!-- ==================================================
                 HEADER
            =================================================== -->
            @include('components.header')

            <!-- ==================================================
                 SIDEBAR
            =================================================== -->
            @include('components.sidebar')

            <!-- ==================================================
                 CONTENT
            =================================================== -->
            @yield('main')

            <!-- ==================================================
                 FOOTER
            =================================================== -->
            @include('components.footer')

        </div>

    </div>


    <!-- ==========================================================
         GENERAL JS
    =========================================================== -->

    <script src="{{ asset('library/jquery/dist/jquery.min.js') }}"></script>

    <script src="{{ asset('library/popper.js/dist/umd/popper.js') }}"></script>

    <script src="{{ asset('library/tooltip.js/dist/umd/tooltip.js') }}"></script>

    <script src="{{ asset('library/bootstrap/dist/js/bootstrap.min.js') }}"></script>

    <script src="{{ asset('library/jquery.nicescroll/dist/jquery.nicescroll.min.js') }}"></script>

    <script src="{{ asset('library/moment/min/moment.min.js') }}"></script>

    <!-- Stisla -->
    <script src="{{ asset('js/stisla.js') }}"></script>

    <!-- Page-specific scripts -->
    @stack('scripts')

    <!-- Template JS -->
    <script src="{{ asset('js/scripts.js') }}"></script>

    <script src="{{ asset('js/custom.js') }}"></script>

</body>

</html>
