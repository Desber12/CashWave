@extends('layouts.app')

@section('title', 'General Dashboard')

@push('style')
    <link rel="stylesheet" href="{{ asset('library/jqvmap/dist/jqvmap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/summernote/dist/summernote-bs4.min.css') }}">
    <style>
        /* ==========================================================
           Minimalist Clean Dashboard — CashWave
           White space, thin borders, quiet color, calm typography.
        ========================================================== */

        :root {
            --ink: #1b1d29;
            --ink-soft: #4a4f6a;
            --muted: #9a9fb5;
            --line: #edeef3;
            --brand: #5b63f5;
            --brand-soft: #eef0ff;
            --danger: #ef5b5b;
            --danger-soft: #fdecec;
            --warning: #f2a93b;
            --warning-soft: #fdf3e3;
            --success: #22b07d;
            --success-soft: #e7f8f1;
            --radius: 12px;
        }

        body, .main-content {
            background: #ffffff;
        }

        .main-content {
            padding-top: 8px;
        }

        h1, h2, h3, h4, h5, h6 {
            letter-spacing: -0.01em;
        }

        /* ---------- Section Header ---------- */
        .section-header {
            border: none !important;
            background: transparent !important;
            box-shadow: none !important;
            padding: 8px 4px 28px !important;
            border-bottom: 1px solid var(--line);
            margin-bottom: 32px !important;
        }
        .section-header h1 {
            font-weight: 700;
            color: var(--ink);
            font-size: 22px;
        }

        /* ---------- Generic Cards ---------- */
        .card {
            border: 1px solid var(--line) !important;
            border-radius: var(--radius);
            box-shadow: none !important;
            transition: border-color 0.2s ease;
        }
        .card:hover {
            border-color: #dfe1ec;
        }
        .card .card-header {
            background-color: transparent;
            border-bottom: 1px solid var(--line);
            padding: 20px 24px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        .card .card-header h4 {
            font-size: 15px;
            font-weight: 600;
            color: var(--ink);
            margin: 0;
        }
        .card .card-body {
            padding: 24px;
        }

        .row {
            margin-left: -12px;
            margin-right: -12px;
        }
        .row > [class*="col-"] {
            padding-left: 12px;
            padding-right: 12px;
        }
        .row + .row {
            margin-top: 24px;
        }

        /* ---------- Statistic Cards ---------- */
        .card.card-statistic-1 {
            border-radius: var(--radius);
        }
        .card.card-statistic-1 .card-icon {
            border-radius: 10px;
            font-size: 18px;
            width: 44px;
            height: 44px;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: none !important;
            margin: 20px 0 0 22px;
        }
        .card.card-statistic-1 .card-icon.bg-primary { background: var(--brand-soft) !important; color: var(--brand) !important; }
        .card.card-statistic-1 .card-icon.bg-danger  { background: var(--danger-soft) !important; color: var(--danger) !important; }
        .card.card-statistic-1 .card-icon.bg-warning { background: var(--warning-soft) !important; color: var(--warning) !important; }
        .card.card-statistic-1 .card-icon.bg-success { background: var(--success-soft) !important; color: var(--success) !important; }

        .card.card-statistic-1 .card-wrap {
            padding: 0 22px 4px;
        }
        .card.card-statistic-1 .card-header {
            border-bottom: none;
            padding: 14px 0 2px;
            display: block;
        }
        .card.card-statistic-1 .card-header h4 {
            font-size: 12.5px;
            color: var(--muted);
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        .card.card-statistic-1 .card-body {
            font-size: 28px;
            font-weight: 700;
            color: var(--ink);
            padding: 0 0 22px;
        }

        /* ---------- Buttons ---------- */
        .btn {
            font-weight: 600;
            font-size: 13.5px;
        }
        .btn-primary {
            background: var(--brand) !important;
            border-color: var(--brand) !important;
            box-shadow: none !important;
            border-radius: 8px;
        }
        .btn-primary:hover {
            background: #4a51e0 !important;
            border-color: #4a51e0 !important;
        }
        .btn-light.text-muted {
            border-radius: 8px;
            background: #ffffff !important;
            border: 1px solid var(--line) !important;
            color: var(--muted) !important;
        }
        .btn-danger {
            background: #ffffff !important;
            border: 1px solid var(--line) !important;
            color: var(--danger) !important;
            box-shadow: none !important;
            border-radius: 8px;
        }
        .btn-danger:hover {
            background: var(--danger-soft) !important;
        }
        .btn.btn-primary.btn-sm.mr-1 {
            background: #ffffff !important;
            border: 1px solid var(--line) !important;
            color: var(--brand) !important;
        }
        .btn.btn-primary.btn-sm.mr-1:hover {
            background: var(--brand-soft) !important;
        }
        .btn-round {
            border-radius: 999px !important;
        }
        .btn-group .btn-primary,
        .btn-group .btn-light {
            padding: 6px 16px;
        }

        /* ---------- Tables ---------- */
        .table:not(.table-sm) th {
            background-color: transparent;
            border-top: none;
            border-bottom: 1px solid var(--line);
            color: var(--muted);
            font-weight: 600;
            font-size: 12px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            padding: 12px 20px;
        }
        .table td {
            vertical-align: middle;
            color: var(--ink-soft);
            border-color: var(--line);
            padding: 16px 20px;
        }
        .table-striped tbody tr:nth-of-type(odd) {
            background-color: transparent;
        }
        .table-striped tbody tr:hover {
            background-color: #fafafd;
        }
        .table-links a {
            color: var(--muted);
            font-size: 12.5px;
        }

        /* ---------- Recent Activities ---------- */
        .list-unstyled-borders li {
            padding-bottom: 6px;
        }
        .list-unstyled-borders img {
            box-shadow: none;
        }
        .media-title {
            color: var(--ink);
            font-size: 14px;
            font-weight: 600;
        }
        .media .text-small {
            font-size: 12.5px;
        }

        /* ---------- Team Authors ---------- */
        .avatar-item img {
            border: 2px solid #fff;
            box-shadow: 0 0 0 1px var(--line);
        }
        .avatar-badge {
            box-shadow: 0 0 0 2px #fff;
        }

        /* ---------- Referral Traffic Progress Bars ---------- */
        .progress {
            border-radius: 999px;
            background-color: #f2f3f8;
            overflow: hidden;
        }
        .progress-bar {
            border-radius: 999px;
        }
        .progress-bar.bg-primary { background-color: var(--brand) !important; }
        .progress-bar.bg-info    { background-color: #6ec6d8 !important; }
        .progress-bar.bg-warning { background-color: var(--warning) !important; }
        .progress-bar.bg-danger  { background-color: var(--danger) !important; }

        /* ---------- Statistic Details Footer (chart card) ---------- */
        .statistic-details {
            border-top: 1px solid var(--line);
            padding-top: 20px;
        }
        .statistic-details-item {
            text-align: center;
        }
        .statistic-details-item .detail-value {
            font-size: 18px;
            font-weight: 700;
            color: var(--ink);
        }
        .statistic-details-item .detail-name {
            font-size: 12px;
            color: var(--muted);
        }

        /* ---------- Forms ---------- */
        .form-group label {
            font-size: 13px;
            font-weight: 600;
            color: var(--ink-soft);
        }
        .form-control {
            border-radius: 8px;
            border: 1px solid var(--line);
            padding: 10px 14px;
            font-size: 14px;
        }
        .form-control:focus {
            border-color: var(--brand);
            box-shadow: 0 0 0 3px var(--brand-soft);
        }

        /* ---------- Weather card ---------- */
        #myWeather {
            font-weight: 500;
            color: var(--muted);
        }

        /* ==========================================================
           CASHWAVE — Modern Dashboard UI
           Keeps existing markup/JS compatible with the current page.
        ========================================================== */

        :root {
            --cw-bg: #f6f7fb;
            --cw-surface: #ffffff;
            --cw-text: #172033;
            --cw-muted: #8992a7;
            --cw-border: #e9ecf3;
            --cw-primary: #5b61f6;
            --cw-primary-2: #7c5cff;
            --cw-primary-soft: #eef0ff;
            --cw-green: #20b486;
            --cw-green-soft: #e8faf3;
            --cw-orange: #f59e0b;
            --cw-orange-soft: #fff5df;
            --cw-red: #ef5b6d;
            --cw-red-soft: #fff0f2;
            --cw-radius: 18px;
        }

        body,
        .main-content {
            background: var(--cw-bg) !important;
            color: var(--cw-text);
        }

        .main-content {
            padding-top: 18px !important;
        }

        .section {
            padding-left: 4px;
            padding-right: 4px;
        }

        /* Header / welcome area */
        .section-header {
            position: relative;
            border: 0 !important;
            padding: 10px 4px 26px !important;
            margin-bottom: 22px !important;
        }

        .section-header h1 {
            margin: 0 0 7px !important;
            font-size: 28px !important;
            line-height: 1.2;
            font-weight: 800 !important;
            letter-spacing: -0.8px;
            color: var(--cw-text) !important;
        }

        .section-header h1::after {
            content: "Overview & performance";
            display: block;
            margin-top: 8px;
            font-size: 13px;
            line-height: 1.5;
            font-weight: 500;
            letter-spacing: 0;
            color: var(--cw-muted);
        }

        /* Generic modern cards */
        .card {
            background: var(--cw-surface) !important;
            border: 1px solid rgba(226, 230, 239, .85) !important;
            border-radius: var(--cw-radius) !important;
            box-shadow: 0 8px 28px rgba(28, 36, 58, .045) !important;
            overflow: hidden;
        }

        .card:hover {
            border-color: #dfe3ef !important;
            box-shadow: 0 14px 34px rgba(28, 36, 58, .075) !important;
            transform: translateY(-1px);
            transition: all .22s ease;
        }

        .card .card-header {
            min-height: 68px;
            padding: 19px 22px !important;
            border-bottom: 1px solid #f0f2f6 !important;
        }

        .card .card-header h4 {
            font-size: 14px !important;
            font-weight: 750 !important;
            color: var(--cw-text) !important;
            letter-spacing: -.1px;
        }

        .card .card-body {
            padding: 22px !important;
        }

        /* KPI cards */
        .card.card-statistic-1 {
            min-height: 142px;
            position: relative;
            border: 0 !important;
            box-shadow: 0 10px 30px rgba(35, 43, 70, .06) !important;
            background: linear-gradient(145deg, #fff 0%, #fbfcff 100%) !important;
        }

        .card.card-statistic-1::after {
            content: "";
            position: absolute;
            width: 110px;
            height: 110px;
            right: -45px;
            top: -45px;
            border-radius: 50%;
            background: var(--cw-primary-soft);
            opacity: .7;
        }

        .card.card-statistic-1 .card-icon {
            position: relative;
            z-index: 2;
            width: 48px !important;
            height: 48px !important;
            margin: 18px 0 0 20px !important;
            border-radius: 14px !important;
            font-size: 17px !important;
            box-shadow: none !important;
        }

        .card.card-statistic-1 .card-icon.bg-primary {
            background: linear-gradient(135deg, #eef0ff, #e6e8ff) !important;
            color: var(--cw-primary) !important;
        }

        .card.card-statistic-1 .card-icon.bg-danger {
            background: var(--cw-red-soft) !important;
            color: var(--cw-red) !important;
        }

        .card.card-statistic-1 .card-icon.bg-warning {
            background: var(--cw-orange-soft) !important;
            color: var(--cw-orange) !important;
        }

        .card.card-statistic-1 .card-icon.bg-success {
            background: var(--cw-green-soft) !important;
            color: var(--cw-green) !important;
        }

        .card.card-statistic-1 .card-wrap {
            padding: 0 20px 16px !important;
        }

        .card.card-statistic-1 .card-header {
            min-height: 0;
            padding: 12px 0 2px !important;
            border: 0 !important;
        }

        .card.card-statistic-1 .card-header h4 {
            font-size: 11px !important;
            color: var(--cw-muted) !important;
            letter-spacing: .7px;
            text-transform: uppercase;
        }

        .card.card-statistic-1 .card-body {
            padding: 0 !important;
            font-size: 28px !important;
            line-height: 1.15;
            font-weight: 800 !important;
            color: var(--cw-text) !important;
        }

        /* Give KPI row a little more breathing room */
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

        /* Chart controls */
        .card-header-action .btn-group {
            padding: 3px;
            border: 1px solid var(--cw-border);
            background: #f8f9fc;
            border-radius: 10px;
        }

        .btn-group .btn-primary,
        .btn-group .btn-light {
            border: 0 !important;
            border-radius: 8px !important;
            padding: 7px 15px !important;
            font-size: 12px !important;
        }

        .btn-group .btn-primary {
            background: var(--cw-primary) !important;
            color: #fff !important;
            box-shadow: 0 5px 12px rgba(91, 97, 246, .2) !important;
        }

        .btn-group .btn-light {
            background: transparent !important;
            color: var(--cw-muted) !important;
        }

        /* Chart summary */
        .statistic-details {
            margin-top: 18px !important;
            padding: 18px 0 2px !important;
            border-top: 1px solid #f0f2f6 !important;
        }

        .statistic-details-item {
            padding: 0 10px;
        }

        .statistic-details-item .detail-value {
            margin-top: 4px;
            font-size: 17px !important;
            font-weight: 800 !important;
            color: var(--cw-text) !important;
        }

        .statistic-details-item .detail-name {
            margin-top: 3px;
            font-size: 11px !important;
            color: var(--cw-muted) !important;
        }

        /* Activities */
        .list-unstyled-borders {
            margin-bottom: 0 !important;
        }

        .list-unstyled-borders li {
            position: relative;
            padding: 8px 0 13px !important;
            margin-bottom: 4px !important;
            border-bottom: 1px solid #f1f3f7;
        }

        .list-unstyled-borders li:last-child {
            border-bottom: 0;
        }

        .list-unstyled-borders img {
            width: 43px !important;
            height: 43px !important;
            border: 3px solid #fff;
            box-shadow: 0 5px 15px rgba(35, 43, 70, .10);
        }

        .media-title {
            font-size: 13.5px !important;
            font-weight: 750 !important;
            color: var(--cw-text) !important;
        }

        .media .text-small {
            font-size: 11.5px !important;
            color: var(--cw-muted) !important;
        }

        /* Buttons */
        .btn-primary {
            background: linear-gradient(135deg, var(--cw-primary), var(--cw-primary-2)) !important;
            border: 0 !important;
            border-radius: 10px !important;
            box-shadow: 0 7px 16px rgba(91, 97, 246, .18) !important;
        }

        .btn-primary:hover {
            filter: brightness(.97);
            transform: translateY(-1px);
        }

        .btn-round {
            border-radius: 999px !important;
        }

        /* Team */
        .avatar-item img {
            border: 3px solid #fff !important;
            box-shadow: 0 5px 15px rgba(35, 43, 70, .10) !important;
        }

        .avatar-badge {
            border: 2px solid #fff;
            box-shadow: 0 3px 10px rgba(35, 43, 70, .12) !important;
        }

        /* Progress */
        .progress {
            height: 7px !important;
            background: #f0f2f7 !important;
            border-radius: 99px !important;
        }

        .progress-bar {
            border-radius: 99px !important;
            background: linear-gradient(90deg, var(--cw-primary), #8a74ff) !important;
        }

        /* Forms */
        .form-control {
            border: 1px solid #e4e7ef !important;
            border-radius: 10px !important;
            background: #fbfcfe !important;
        }

        .form-control:focus {
            border-color: var(--cw-primary) !important;
            background: #fff !important;
            box-shadow: 0 0 0 4px rgba(91, 97, 246, .09) !important;
        }

        /* Tables */
        .table:not(.table-sm) th {
            background: #fafbfe !important;
            color: var(--cw-muted) !important;
            border-bottom: 1px solid #edf0f5 !important;
            font-size: 10.5px !important;
        }

        .table td {
            padding: 15px 18px !important;
            border-color: #f0f2f6 !important;
            color: #4f5870 !important;
        }

        .table tbody tr:hover {
            background: #fafbff !important;
        }

        .table-links a {
            color: var(--cw-muted) !important;
        }

        /* Weather */
        #myWeather {
            padding: 4px 2px;
            color: var(--cw-muted) !important;
            font-size: 13px;
        }

        /* Responsive */
        @media (max-width: 767px) {
            .main-content {
                padding-top: 10px !important;
            }

            .section-header h1 {
                font-size: 23px !important;
            }

            .card.card-statistic-1 {
                min-height: 130px;
            }

            .statistic-details-item {
                margin-bottom: 14px;
            }
        }


        /* ==========================================================
           CASHWAVE — Dark Premium Theme
        ========================================================== */

        :root {
            --cw-bg: #0b1020;
            --cw-surface: #11182a;
            --cw-surface-2: #151e32;
            --cw-text: #f4f7ff;
            --cw-muted: #8f9bb5;
            --cw-border: rgba(255,255,255,.075);
            --cw-primary: #6d73ff;
            --cw-primary-2: #8b5cf6;
            --cw-primary-soft: rgba(109,115,255,.14);
            --cw-green: #35d39b;
            --cw-green-soft: rgba(53,211,155,.12);
            --cw-orange: #ffb84d;
            --cw-orange-soft: rgba(255,184,77,.12);
            --cw-red: #ff6b7d;
            --cw-red-soft: rgba(255,107,125,.12);
        }

        html, body {
            background: var(--cw-bg) !important;
        }

        body,
        .main-content {
            background:
                radial-gradient(circle at 72% -10%, rgba(109,115,255,.11), transparent 30%),
                var(--cw-bg) !important;
            color: var(--cw-text) !important;
        }

        .main-content {
            padding-top: 18px !important;
        }

        /* Header area */
        .section-header {
            background: rgba(17,24,42,.72) !important;
            border-bottom: 1px solid var(--cw-border) !important;
            border-radius: 0 0 16px 16px;
            padding: 12px 5px 22px !important;
            margin-bottom: 22px !important;
        }

        .section-header h1 {
            color: var(--cw-text) !important;
            font-size: 28px !important;
            font-weight: 800 !important;
        }

        .section-header h1::after {
            color: var(--cw-muted) !important;
        }

        /* Fix the top-right account text that was white on white */
        .main-header .nav-link,
        .main-header .nav-link span,
        .main-header .nav-link small,
        .main-header .dropdown-toggle,
        .main-header .dropdown-toggle span,
        .main-header .text-dark,
        .main-header .text-muted {
            color: #dce3f4 !important;
        }

        .main-header {
            background: rgba(11,16,32,.92) !important;
            border-bottom: 1px solid var(--cw-border) !important;
            box-shadow: 0 8px 25px rgba(0,0,0,.15) !important;
        }

        /* Sidebar */
        .main-sidebar,
        .sidebar {
            background: #0e1525 !important;
            border-right: 1px solid var(--cw-border) !important;
        }

        .main-sidebar .sidebar-brand a,
        .main-sidebar .sidebar-menu li a,
        .main-sidebar .sidebar-menu li a span {
            color: #aeb8ce !important;
        }

        .main-sidebar .sidebar-brand a {
            color: #f5f7ff !important;
            font-weight: 800;
            letter-spacing: 1.2px;
        }

        .main-sidebar .sidebar-menu li.active a,
        .main-sidebar .sidebar-menu li a:hover {
            color: #fff !important;
            background: rgba(109,115,255,.12) !important;
        }

        .main-sidebar .sidebar-menu li.active a::before {
            background: var(--cw-primary) !important;
        }

        /* Cards */
        .card {
            background: linear-gradient(145deg, #121a2c 0%, #101728 100%) !important;
            border: 1px solid var(--cw-border) !important;
            box-shadow: 0 14px 38px rgba(0,0,0,.18) !important;
        }

        .card:hover {
            border-color: rgba(109,115,255,.24) !important;
            box-shadow: 0 18px 44px rgba(0,0,0,.26) !important;
        }

        .card .card-header {
            background: transparent !important;
            border-bottom: 1px solid var(--cw-border) !important;
        }

        .card .card-header h4,
        .media-title,
        .card.card-statistic-1 .card-body {
            color: var(--cw-text) !important;
        }

        /* KPI cards */
        .card.card-statistic-1 {
            background:
                radial-gradient(circle at 100% 0%, rgba(109,115,255,.12), transparent 34%),
                linear-gradient(145deg, #121a2c, #101728) !important;
        }

        .card.card-statistic-1::after {
            background: rgba(109,115,255,.08) !important;
        }

        .card.card-statistic-1 .card-header h4 {
            color: #8f9bb5 !important;
        }

        .card.card-statistic-1 .card-icon.bg-primary {
            background: var(--cw-primary-soft) !important;
            color: #8c91ff !important;
        }

        .card.card-statistic-1 .card-icon.bg-danger {
            background: var(--cw-red-soft) !important;
            color: var(--cw-red) !important;
        }

        .card.card-statistic-1 .card-icon.bg-warning {
            background: var(--cw-orange-soft) !important;
            color: var(--cw-orange) !important;
        }

        .card.card-statistic-1 .card-icon.bg-success {
            background: var(--cw-green-soft) !important;
            color: var(--cw-green) !important;
        }

        /* Chart */
        #myChart {
            filter: saturate(1.05);
        }

        .statistic-details {
            border-top-color: var(--cw-border) !important;
        }

        .statistic-details-item .detail-value {
            color: var(--cw-text) !important;
        }

        .statistic-details-item .detail-name,
        .text-muted,
        .media .text-small {
            color: var(--cw-muted) !important;
        }

        /* Period switch */
        .card-header-action .btn-group {
            background: #0c1322 !important;
            border-color: var(--cw-border) !important;
        }

        .btn-group .btn-light {
            color: #8995ad !important;
            background: transparent !important;
        }

        .btn-group .btn-primary {
            color: #fff !important;
            background: linear-gradient(135deg, var(--cw-primary), var(--cw-primary-2)) !important;
        }

        /* Activities */
        .list-unstyled-borders li {
            border-bottom-color: var(--cw-border) !important;
        }

        .list-unstyled-borders img {
            border-color: #11182a !important;
            box-shadow: 0 5px 18px rgba(0,0,0,.3) !important;
        }

        /* Tables */
        .table {
            color: #c6cede !important;
        }

        .table:not(.table-sm) th {
            background: rgba(255,255,255,.025) !important;
            color: #8490a8 !important;
            border-bottom-color: var(--cw-border) !important;
        }

        .table td {
            color: #c0c8d8 !important;
            border-color: var(--cw-border) !important;
        }

        .table tbody tr:hover {
            background: rgba(109,115,255,.045) !important;
        }

        .table-links a,
        .font-weight-600.text-dark {
            color: #aeb8cc !important;
        }

        /* Form */
        .form-group label {
            color: #b8c1d3 !important;
        }

        .form-control {
            color: #e9edfa !important;
            background: #0c1322 !important;
            border-color: var(--cw-border) !important;
        }

        .form-control::placeholder {
            color: #66728b !important;
        }

        .form-control:focus {
            background: #0d1526 !important;
            border-color: var(--cw-primary) !important;
            box-shadow: 0 0 0 4px rgba(109,115,255,.10) !important;
        }

        /* Summernote */
        .note-editor.note-frame {
            background: #0c1322 !important;
            border-color: var(--cw-border) !important;
        }

        .note-editor .note-editing-area .note-editable {
            background: #0c1322 !important;
            color: #dce3f4 !important;
        }

        .note-toolbar {
            background: #11182a !important;
            border-bottom-color: var(--cw-border) !important;
        }

        /* Weather / miscellaneous */
        #myWeather {
            color: var(--cw-muted) !important;
        }

        /* Footer / common Stisla dark leftovers */
        .dropdown-menu {
            background: #151e32 !important;
            border: 1px solid var(--cw-border) !important;
            box-shadow: 0 18px 40px rgba(0,0,0,.3) !important;
        }

        .dropdown-menu .dropdown-item {
            color: #bfc8da !important;
        }

        .dropdown-menu .dropdown-item:hover {
            background: rgba(109,115,255,.09) !important;
            color: #fff !important;
        }

        /* Prevent accidental white text on the dark canvas */
        .text-dark {
            color: #dce3f4 !important;
        }

        /* Section label */
        .mb-3[style*="letter-spacing"] {
            color: #8793aa !important;
        }

        @media (max-width: 767px) {
            .section-header h1 {
                font-size: 23px !important;
            }
        }

    </style>
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header mb-4">
                <h1>Good evening, Sandy 👋</h1>
            </div>

            <div class="mb-3" style="font-size:12px;font-weight:700;color:#8992a7;letter-spacing:.6px;text-transform:uppercase;">Today at a glance</div>

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
    <script src="{{ asset('library/jqvmap/dist/jquery.vmap.min.js') }}"></script>
    <script src="{{ asset('library/jqvmap/dist/maps/jquery.vmap.world.js') }}"></script>
    <script src="{{ asset('library/summernote/dist/summernote-bs4.min.js') }}"></script>
    <script src="{{ asset('library/chocolat/dist/js/jquery.chocolat.min.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('js/page/index-0.js') }}"></script>
@endpush
