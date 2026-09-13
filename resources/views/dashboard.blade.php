@extends('layouts.app')

@section('title', 'General Dashboard')

@push('style')
    <link rel="stylesheet" href="{{ asset('library/jqvmap/dist/jqvmap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/summernote/dist/summernote-bs4.min.css') }}">
    <style>
        /* ==========================================================
           CASHWAVE — Dark Mode Dashboard (single, clean theme)
        ========================================================== */

        :root {
            --cw-bg: #0b0f1a;
            --cw-surface: #131a2b;
            --cw-surface-2: #171f33;
            --cw-text: #f2f4fb;
            --cw-muted: #8d96b3;
            --cw-border: rgba(255, 255, 255, 0.08);
            --cw-primary: #6d73ff;
            --cw-primary-2: #8b5cf6;
            --cw-primary-soft: rgba(109, 115, 255, 0.14);
            --cw-green: #35d39b;
            --cw-green-soft: rgba(53, 211, 155, 0.12);
            --cw-orange: #ffb84d;
            --cw-orange-soft: rgba(255, 184, 77, 0.12);
            --cw-red: #ff6b7d;
            --cw-red-soft: rgba(255, 107, 125, 0.12);
            --cw-radius: 16px;
        }

        html, body {
            background: var(--cw-bg) !important;
        }

        body, .main-content {
            background: var(--cw-bg) !important;
            color: var(--cw-text) !important;
        }

        /* NOTE: deliberately not touching .main-content padding-top —
           the layout already reserves that space for the fixed navbar.
           Overriding it is what caused the toggle icon / title overlap. */

        h1, h2, h3, h4, h5, h6 {
            letter-spacing: -0.01em;
        }

        /* ---------- Top navbar & sidebar (match dark theme) ---------- */
        .main-navbar, .navbar.main-navbar {
            background: rgba(11, 15, 26, 0.95) !important;
            border-bottom: 1px solid var(--cw-border) !important;
        }
        .main-navbar .nav-link,
        .main-navbar .nav-link span,
        .main-navbar .text-dark,
        .main-navbar .text-muted,
        .navbar-nav .nav-link {
            color: #dbe1f4 !important;
        }

        .main-sidebar, .sidebar {
            background: #0e1425 !important;
            border-right: 1px solid var(--cw-border) !important;
        }
        .main-sidebar .sidebar-brand a {
            color: #f5f7ff !important;
            font-weight: 800;
            letter-spacing: 1.2px;
        }
        .main-sidebar .sidebar-menu li a,
        .main-sidebar .sidebar-menu li a span {
            color: #a9b3cc !important;
        }
        .main-sidebar .sidebar-menu li.active a,
        .main-sidebar .sidebar-menu li a:hover {
            color: #ffffff !important;
            background: rgba(109, 115, 255, 0.12) !important;
        }

        /* ---------- Section Header ---------- */
        .section-header {
            border: 0 !important;
            background: transparent !important;
            box-shadow: none !important;
            padding: 4px 4px 22px !important;
            margin-bottom: 24px !important;
            border-bottom: 1px solid var(--cw-border);
        }
        .section-header h1 {
            margin: 0 !important;
            font-size: 26px !important;
            font-weight: 800 !important;
            color: var(--cw-text) !important;
        }
        .section-subtitle {
            margin: 6px 0 0 !important;
            font-size: 13px;
            color: var(--cw-muted);
        }

        .section-label {
            font-size: 12px;
            font-weight: 700;
            color: var(--cw-muted);
            letter-spacing: 0.6px;
            text-transform: uppercase;
            margin-bottom: 14px;
        }

        /* ---------- Generic Cards ---------- */
        .card {
            background: var(--cw-surface) !important;
            border: 1px solid var(--cw-border) !important;
            border-radius: var(--cw-radius) !important;
            box-shadow: 0 14px 32px rgba(0, 0, 0, 0.18) !important;
        }
        .card:hover {
            border-color: rgba(109, 115, 255, 0.22) !important;
        }
        .card .card-header {
            background: transparent !important;
            border-bottom: 1px solid var(--cw-border) !important;
            padding: 20px 22px !important;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        .card .card-header h4 {
            font-size: 14px !important;
            font-weight: 700 !important;
            color: var(--cw-text) !important;
            margin: 0;
        }
        .card .card-body {
            padding: 22px !important;
        }

        .row {
            margin-left: -10px !important;
            margin-right: -10px !important;
        }
        .row > [class*="col-"] {
            padding-left: 10px !important;
            padding-right: 10px !important;
        }
        .row + .row {
            margin-top: 20px !important;
        }

        /* ---------- KPI / Statistic Cards ---------- */
        .card.card-statistic-1 {
            position: relative;
            overflow: hidden;
            min-height: 140px;
        }
        /* Decorative glow kept subtle and clipped so it never sits on top of text */
        .card.card-statistic-1::after {
            content: "";
            position: absolute;
            width: 130px;
            height: 130px;
            right: -55px;
            top: -55px;
            border-radius: 50%;
            background: var(--cw-primary-soft);
            opacity: 0.35;
            pointer-events: none;
            z-index: 0;
        }
        .card.card-statistic-1 .card-icon,
        .card.card-statistic-1 .card-wrap {
            position: relative;
            z-index: 1;
        }
        .card.card-statistic-1 .card-icon {
            width: 46px !important;
            height: 46px !important;
            margin: 20px 0 0 20px !important;
            border-radius: 12px !important;
            font-size: 17px !important;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: none !important;
        }
        .card.card-statistic-1 .card-icon.bg-primary { background: var(--cw-primary-soft) !important; color: #9ba0ff !important; }
        .card.card-statistic-1 .card-icon.bg-danger  { background: var(--cw-red-soft) !important; color: var(--cw-red) !important; }
        .card.card-statistic-1 .card-icon.bg-warning { background: var(--cw-orange-soft) !important; color: var(--cw-orange) !important; }
        .card.card-statistic-1 .card-icon.bg-success { background: var(--cw-green-soft) !important; color: var(--cw-green) !important; }

        .card.card-statistic-1 .card-wrap {
            padding: 0 20px 18px !important;
        }
        .card.card-statistic-1 .card-header {
            border: 0 !important;
            padding: 14px 0 2px !important;
            display: block !important;
        }
        .card.card-statistic-1 .card-header h4 {
            font-size: 11.5px !important;
            color: var(--cw-muted) !important;
            letter-spacing: 0.7px;
            text-transform: uppercase;
        }
        .card.card-statistic-1 .card-body {
            padding: 0 !important;
            font-size: 28px !important;
            font-weight: 800 !important;
            color: var(--cw-text) !important;
        }

        /* ---------- Chart controls ---------- */
        .card-header-action .btn-group {
            padding: 3px;
            border: 1px solid var(--cw-border);
            background: #0e1425;
            border-radius: 10px;
        }
        .btn-group .btn-primary,
        .btn-group .btn-light {
            border: 0 !important;
            border-radius: 8px !important;
            padding: 7px 15px !important;
            font-size: 12px !important;
        }
        .btn-group .btn-light {
            background: transparent !important;
            color: var(--cw-muted) !important;
        }

        /* ---------- Chart summary ---------- */
        .statistic-details {
            margin-top: 18px !important;
            padding-top: 18px !important;
            border-top: 1px solid var(--cw-border) !important;
        }
        .statistic-details-item .detail-value {
            font-size: 17px !important;
            font-weight: 800 !important;
            color: var(--cw-text) !important;
        }
        .statistic-details-item .detail-name {
            font-size: 11px !important;
            color: var(--cw-muted) !important;
        }

        /* ---------- Activities ---------- */
        .list-unstyled-borders li {
            padding: 8px 0 13px !important;
            border-bottom: 1px solid var(--cw-border);
        }
        .list-unstyled-borders li:last-child {
            border-bottom: 0;
        }
        .list-unstyled-borders img {
            width: 43px !important;
            height: 43px !important;
            border: 3px solid var(--cw-surface-2);
        }
        .media-title {
            font-size: 13.5px !important;
            font-weight: 700 !important;
            color: var(--cw-text) !important;
        }
        .media .text-small, .text-muted {
            color: var(--cw-muted) !important;
        }

        /* ---------- Buttons ---------- */
        .btn-primary {
            background: linear-gradient(135deg, var(--cw-primary), var(--cw-primary-2)) !important;
            border: 0 !important;
            border-radius: 10px !important;
            box-shadow: 0 8px 18px rgba(109, 115, 255, 0.25) !important;
            font-weight: 600;
        }
        .btn-primary:hover {
            filter: brightness(1.05);
        }
        .btn-danger {
            background: transparent !important;
            border: 1px solid var(--cw-border) !important;
            color: var(--cw-red) !important;
            border-radius: 8px;
        }
        .btn-danger:hover {
            background: var(--cw-red-soft) !important;
        }
        .btn.btn-primary.btn-sm.mr-1 {
            background: transparent !important;
            border: 1px solid var(--cw-border) !important;
            color: #9ba0ff !important;
            box-shadow: none !important;
        }
        .btn.btn-primary.btn-sm.mr-1:hover {
            background: var(--cw-primary-soft) !important;
        }
        .btn-round { border-radius: 999px !important; }

        /* ---------- Team avatars ---------- */
        .avatar-item img {
            border: 3px solid var(--cw-surface-2) !important;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3) !important;
        }
        .avatar-badge {
            border: 2px solid var(--cw-surface) !important;
        }

        /* ---------- Progress bars ---------- */
        .progress {
            height: 7px !important;
            background: #1a2238 !important;
            border-radius: 99px !important;
        }
        .progress-bar {
            border-radius: 99px !important;
        }
        .progress-bar.bg-primary { background: linear-gradient(90deg, var(--cw-primary), #8a74ff) !important; }
        .progress-bar.bg-info    { background: #4fb8cf !important; }
        .progress-bar.bg-warning { background: var(--cw-orange) !important; }
        .progress-bar.bg-danger  { background: var(--cw-red) !important; }

        /* ---------- Forms ---------- */
        .form-group label {
            color: #b8c1d6 !important;
            font-size: 13px;
            font-weight: 600;
        }
        .form-control {
            background: #0e1425 !important;
            border: 1px solid var(--cw-border) !important;
            color: var(--cw-text) !important;
            border-radius: 10px;
            padding: 10px 14px;
        }
        .form-control::placeholder { color: #66708a !important; }
        .form-control:focus {
            border-color: var(--cw-primary) !important;
            box-shadow: 0 0 0 3px var(--cw-primary-soft) !important;
        }
        .note-editor.note-frame {
            background: #0e1425 !important;
            border-color: var(--cw-border) !important;
        }
        .note-editor .note-editing-area .note-editable {
            background: #0e1425 !important;
            color: var(--cw-text) !important;
        }
        .note-toolbar {
            background: var(--cw-surface-2) !important;
            border-bottom-color: var(--cw-border) !important;
        }

        /* ---------- Tables ---------- */
        .table { color: #c7cfe3 !important; }
        .table:not(.table-sm) th {
            background: rgba(255, 255, 255, 0.02) !important;
            border-top: none;
            border-bottom: 1px solid var(--cw-border) !important;
            color: var(--cw-muted) !important;
            font-weight: 700;
            font-size: 11px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            padding: 12px 18px !important;
        }
        .table td {
            vertical-align: middle;
            border-color: var(--cw-border) !important;
            color: #c3cbdf !important;
            padding: 15px 18px !important;
        }
        .table-striped tbody tr:nth-of-type(odd) { background-color: transparent !important; }
        .table tbody tr:hover { background: rgba(109, 115, 255, 0.05) !important; }
        .table-links a { color: var(--cw-muted) !important; }
        .font-weight-600.text-dark { color: #d3d9ec !important; }

        /* ---------- Weather ---------- */
        #myWeather {
            font-weight: 500;
            color: var(--cw-muted) !important;
        }

        /* ---------- Dropdowns ---------- */
        .dropdown-menu {
            background: var(--cw-surface-2) !important;
            border: 1px solid var(--cw-border) !important;
            box-shadow: 0 18px 40px rgba(0, 0, 0, 0.3) !important;
        }
        .dropdown-menu .dropdown-item { color: #c3cbdf !important; }
        .dropdown-menu .dropdown-item:hover {
            background: var(--cw-primary-soft) !important;
            color: #fff !important;
        }

        @media (max-width: 767px) {
            .section-header h1 { font-size: 21px !important; }
            .card.card-statistic-1 { min-height: 128px; }
        }
    </style>
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header mb-4">
                <h1>Good evening, Sandy 👋</h1>
                <p class="section-subtitle">Here's what's happening with CashWave today.</p>
            </div>

            <div class="section-label">Today at a glance</div>

            <!-- Statistic Cards Row -->
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-primary text-white shadow-sm">
                            <i class="far fa-user"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Total Admin</h4>
                            </div>
                            <div class="card-body">
                                4
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-danger text-white shadow-sm">
                            <i class="far fa-newspaper"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>News</h4>
                            </div>
                            <div class="card-body">
                                7
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-warning text-white shadow-sm">
                            <i class="far fa-file"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Reports</h4>
                            </div>
                            <div class="card-body">
                                777
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-success text-white shadow-sm">
                            <i class="fas fa-circle"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Online Users</h4>
                            </div>
                            <div class="card-body">
                                4
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Charts & Activities Row -->
            <div class="row">
                <div class="col-lg-8 col-md-12 col-12 col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Statistics Overview</h4>
                            <div class="card-header-action">
                                <div class="btn-group">
                                    <a href="#" class="btn btn-primary">Week</a>
                                    <a href="#" class="btn btn-light text-muted">Month</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <canvas id="myChart" height="182"></canvas>
                            <div class="statistic-details mt-sm-4">
                                <div class="statistic-details-item">
                                    <span class="text-muted"><span class="text-primary"><i class="fas fa-caret-up"></i></span> 7%</span>
                                    <div class="detail-value">$243</div>
                                    <div class="detail-name">Today's Sales</div>
                                </div>
                                <div class="statistic-details-item">
                                    <span class="text-muted"><span class="text-danger"><i class="fas fa-caret-down"></i></span> 23%</span>
                                    <div class="detail-value">$2,902</div>
                                    <div class="detail-name">This Week's Sales</div>
                                </div>
                                <div class="statistic-details-item">
                                    <span class="text-muted"><span class="text-primary"><i class="fas fa-caret-up"></i></span> 9%</span>
                                    <div class="detail-value">$12,821</div>
                                    <div class="detail-name">This Month's Sales</div>
                                </div>
                                <div class="statistic-details-item">
                                    <span class="text-muted"><span class="text-primary"><i class="fas fa-caret-up"></i></span> 19%</span>
                                    <div class="detail-value">$92,142</div>
                                    <div class="detail-name">This Year's Sales</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-12 col-12 col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Recent Activities</h4>
                        </div>
                        <div class="card-body">
                            <ul class="list-unstyled list-unstyled-borders">
                                <li class="media align-items-center mb-3">
                                    <img class="rounded-circle mr-3" width="45" src="{{ asset('img/avatar/avatar-1.png') }}" alt="avatar">
                                    <div class="media-body">
                                        <div class="text-primary float-right font-weight-bold" style="font-size: 11px;">Now</div>
                                        <div class="media-title font-weight-bold">Sandy Yopa</div>
                                        <span class="text-small text-muted">FrontEnd Dev</span>
                                    </div>
                                </li>
                                <li class="media align-items-center mb-3">
                                    <img class="rounded-circle mr-3" width="45" src="{{ asset('img/avatar/avatar-2.png') }}" alt="avatar">
                                    <div class="media-body">
                                        <div class="float-right text-muted" style="font-size: 11px;">12m</div>
                                        <div class="media-title font-weight-bold">Desber</div>
                                        <span class="text-small text-muted">BackEnd Dev</span>
                                    </div>
                                </li>
                                <li class="media align-items-center mb-3">
                                    <img class="rounded-circle mr-3" width="45" src="{{ asset('img/avatar/avatar-3.png') }}" alt="avatar">
                                    <div class="media-body">
                                        <div class="float-right text-muted" style="font-size: 11px;">17m</div>
                                        <div class="media-title font-weight-bold">Samuel</div>
                                        <span class="text-small text-muted">Server + Database</span>
                                    </div>
                                </li>
                                <li class="media align-items-center">
                                    <img class="rounded-circle mr-3" width="45" src="{{ asset('img/avatar/avatar-4.png') }}" alt="avatar">
                                    <div class="media-body">
                                        <div class="float-right text-muted" style="font-size: 11px;">21m</div>
                                        <div class="media-title font-weight-bold">John LBF</div>
                                        <span class="text-small text-muted">Cyber Security</span>
                                    </div>
                                </li>
                            </ul>
                            <div class="pt-3 pb-1 text-center">
                                <a href="#" class="btn btn-primary btn-sm btn-round px-4">
                                    View All
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Weather and Authors Row -->
            <div class="row">
                <div class="col-lg-6 col-md-12 col-12 col-sm-12">
                    <div class="card">
                        <div class="card-body pt-3 pb-3">
                            <div id="myWeather">Please wait</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-12 col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Team Authors</h4>
                        </div>
                        <div class="card-body">
                            <div class="row pb-2 text-center">
                                <div class="col-3">
                                    <div class="avatar-item mb-0">
                                        <img alt="image" src="{{ asset('img/avatar/avatar-5.png') }}" class="rounded-circle img-fluid shadow-sm" width="60" data-toggle="tooltip" title="Desber">
                                        <div class="avatar-badge bg-primary text-white" title="Editor" data-toggle="tooltip"><i class="fas fa-wrench"></i></div>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="avatar-item mb-0">
                                        <img alt="image" src="{{ asset('img/avatar/avatar-4.png') }}" class="rounded-circle img-fluid shadow-sm" width="60" data-toggle="tooltip" title="Sandy Boangmanalu">
                                        <div class="avatar-badge bg-success text-white" title="Admin" data-toggle="tooltip"><i class="fas fa-cog"></i></div>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="avatar-item mb-0">
                                        <img alt="image" src="{{ asset('img/avatar/avatar-1.png') }}" class="rounded-circle img-fluid shadow-sm" width="60" data-toggle="tooltip" title="Samuel">
                                        <div class="avatar-badge bg-warning text-white" title="Author" data-toggle="tooltip"><i class="fas fa-pencil-alt"></i></div>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="avatar-item mb-0">
                                        <img alt="image" src="{{ asset('img/avatar/avatar-2.png') }}" class="rounded-circle img-fluid shadow-sm" width="60" data-toggle="tooltip" title="John LBF">
                                        <div class="avatar-badge bg-danger text-white" title="Admin" data-toggle="tooltip"><i class="fas fa-shield-alt"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Referral, Browsers & Quick Draft -->
            <div class="row">
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Referral Traffic</h4>
                        </div>
                        <div class="card-body">
                            <div class="mb-4">
                                <div class="text-small font-weight-bold text-muted float-right">2,100</div>
                                <div class="font-weight-bold mb-1">Google</div>
                                <div class="progress" data-height="6" style="height: 6px;">
                                    <div class="progress-bar bg-primary" role="progressbar" data-width="80%"></div>
                                </div>
                            </div>
                            <div class="mb-4">
                                <div class="text-small font-weight-bold text-muted float-right">1,880</div>
                                <div class="font-weight-bold mb-1">Facebook</div>
                                <div class="progress" data-height="6" style="height: 6px;">
                                    <div class="progress-bar bg-info" role="progressbar" data-width="67%"></div>
                                </div>
                            </div>
                            <div class="mb-4">
                                <div class="text-small font-weight-bold text-muted float-right">1,521</div>
                                <div class="font-weight-bold mb-1">Bing</div>
                                <div class="progress" data-height="6" style="height: 6px;">
                                    <div class="progress-bar bg-warning" role="progressbar" data-width="58%"></div>
                                </div>
                            </div>
                            <div class="mb-4">
                                <div class="text-small font-weight-bold text-muted float-right">884</div>
                                <div class="font-weight-bold mb-1">Yahoo</div>
                                <div class="progress" data-height="6" style="height: 6px;">
                                    <div class="progress-bar bg-danger" role="progressbar" data-width="36%"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Quick Draft Form Card -->
                    <form method="post" class="needs-validation mt-4" novalidate="">
                        <div class="card">
                            <div class="card-header">
                                <h4>Quick Draft</h4>
                            </div>
                            <div class="card-body pb-0">
                                <div class="form-group">
                                    <label>Title</label>
                                    <input type="text" name="title" class="form-control" placeholder="Enter title..." required>
                                    <div class="invalid-feedback">
                                        Please fill in the title
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Content</label>
                                    <textarea class="summernote-simple" placeholder="Write something..."></textarea>
                                </div>
                            </div>
                            <div class="card-footer pt-0 border-0">
                                <button class="btn btn-primary px-4">Save Draft</button>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="col-lg-6 col-md-6 col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Latest Posts</h4>
                            <div class="card-header-action">
                                <a href="#" class="btn btn-primary btn-sm">View All</a>
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-striped mb-0">
                                    <thead>
                                        <tr>
                                            <th>Title</th>
                                            <th>Author</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                Introduction Laravel 5
                                                <div class="table-links text-small text-muted">
                                                    in <a href="#">Web Development</a>
                                                </div>
                                            </td>
                                            <td>
                                                <a href="#" class="font-weight-600 text-dark"><img src="{{ asset('img/avatar/avatar-1.png') }}" alt="avatar" width="25" class="rounded-circle mr-1"> Sandy Yopa</a>
                                            </td>
                                            <td>
                                                <a class="btn btn-primary btn-sm mr-1" data-toggle="tooltip" title="Edit"><i class="fas fa-pencil-alt"></i></a>
                                                <a class="btn btn-danger btn-sm" data-toggle="tooltip" title="Delete"><i class="fas fa-trash"></i></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                Laravel 5 Tutorial - Installation
                                                <div class="table-links text-small text-muted">
                                                    in <a href="#">Web Development</a>
                                                </div>
                                            </td>
                                            <td>
                                                <a href="#" class="font-weight-600 text-dark"><img src="{{ asset('img/avatar/avatar-1.png') }}" alt="avatar" width="25" class="rounded-circle mr-1"> Sandy Yopa</a>
                                            </td>
                                            <td>
                                                <a class="btn btn-primary btn-sm mr-1" data-toggle="tooltip" title="Edit"><i class="fas fa-pencil-alt"></i></a>
                                                <a class="btn btn-danger btn-sm" data-toggle="tooltip" title="Delete"><i class="fas fa-trash"></i></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                Laravel 5 Tutorial - MVC
                                                <div class="table-links text-small text-muted">
                                                    in <a href="#">Web Development</a>
                                                </div>
                                            </td>
                                            <td>
                                                <a href="#" class="font-weight-600 text-dark"><img src="{{ asset('img/avatar/avatar-1.png') }}" alt="avatar" width="25" class="rounded-circle mr-1"> Desber</a>
                                            </td>
                                            <td>
                                                <a class="btn btn-primary btn-sm mr-1" data-toggle="tooltip" title="Edit"><i class="fas fa-pencil-alt"></i></a>
                                                <a class="btn btn-danger btn-sm" data-toggle="tooltip" title="Delete"><i class="fas fa-trash"></i></a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('scripts')
    <!-- JS Libraries -->
    <script src="{{ asset('library/simpleweather/jquery.simpleWeather.min.js') }}"></script>
    <script src="{{ asset('library/chart.js/dist/Chart.min.js') }}"></script>
    <script>
        // Retint Chart.js defaults for the dark theme BEFORE the page-specific
        // script (index-0.js) builds the chart, so the harsh white gridlines
        // from the old light-theme config are replaced with subtle dark-mode ones.
        if (window.Chart) {
            Chart.defaults.global.defaultFontColor = '#8d96b3';
            if (Chart.defaults.scale && Chart.defaults.scale.gridLines) {
                Chart.defaults.scale.gridLines.color = 'rgba(255,255,255,0.06)';
                Chart.defaults.scale.gridLines.zeroLineColor = 'rgba(255,255,255,0.1)';
            }
        }
    </script>
    <script src="{{ asset('library/jqvmap/dist/jquery.vmap.min.js') }}"></script>
    <script src="{{ asset('library/jqvmap/dist/maps/jquery.vmap.world.js') }}"></script>
    <script src="{{ asset('library/summernote/dist/summernote-bs4.min.js') }}"></script>
    <script src="{{ asset('library/chocolat/dist/js/jquery.chocolat.min.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('js/page/index-0.js') }}"></script>
@endpush
