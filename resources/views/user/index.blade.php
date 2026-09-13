@extends('layouts.app')

@section('title', 'Users')

@push('style')
    <style>
        /* ==========================================================
           CASHWAVE — Users Page / Dark Premium Theme
           Designed to match the dark CashWave dashboard.
        ========================================================== */

        :root {
            --cw-bg: #0b1020;
            --cw-surface: #11182a;
            --cw-surface-2: #151e32;
            --cw-text: #f4f7ff;
            --cw-text-soft: #c1c9da;
            --cw-muted: #8f9bb5;
            --cw-border: rgba(255,255,255,.075);
            --cw-primary: #6d73ff;
            --cw-primary-2: #8b5cf6;
            --cw-danger: #ff6b7d;
            --cw-danger-soft: rgba(255,107,125,.11);
        }

        html,
        body {
            background: var(--cw-bg) !important;
        }

        .main-content {
            min-height: 100vh;
            padding-top: 18px !important;
            background:
                radial-gradient(circle at 72% -10%, rgba(109,115,255,.11), transparent 30%),
                var(--cw-bg) !important;
            color: var(--cw-text);
        }

        /* ---------- Page Header ---------- */
        .section-header {
            background: rgba(17,24,42,.72) !important;
            border: 1px solid var(--cw-border) !important;
            border-radius: 18px !important;
            padding: 20px 24px !important;
            margin-bottom: 24px !important;
            box-shadow: 0 10px 30px rgba(0,0,0,.14) !important;
        }

        .section-header h1 {
            color: var(--cw-text) !important;
            font-size: 25px !important;
            font-weight: 800 !important;
            letter-spacing: -.5px;
            margin: 0 !important;
        }

        .section-header .section-header-button {
            margin-left: auto;
        }

        .section-header .section-header-button .btn {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            padding: 10px 17px !important;
            border: 0 !important;
            border-radius: 10px !important;
            color: #fff !important;
            font-size: 12px;
            font-weight: 700;
            background: linear-gradient(135deg, var(--cw-primary), var(--cw-primary-2)) !important;
            box-shadow: 0 8px 18px rgba(109,115,255,.2) !important;
        }

        .section-header .section-header-button .btn:hover {
            transform: translateY(-1px);
            box-shadow: 0 11px 24px rgba(109,115,255,.27) !important;
        }

        .section-header-breadcrumb {
            margin-top: 7px;
        }

        .section-header-breadcrumb .breadcrumb-item {
            color: var(--cw-muted) !important;
            font-size: 11px;
        }

        .section-header-breadcrumb .breadcrumb-item a {
            color: #929cff !important;
        }

        .section-header-breadcrumb .breadcrumb-item.active {
            color: #929cff !important;
        }

        /* ---------- Main Card ---------- */
        .card {
            background: linear-gradient(145deg, #121a2c 0%, #101728 100%) !important;
            border: 1px solid var(--cw-border) !important;
            border-radius: 18px !important;
            box-shadow: 0 14px 38px rgba(0,0,0,.18) !important;
            overflow: hidden;
        }

        .card:hover {
            border-color: rgba(109,115,255,.18) !important;
        }

        .card .card-body {
            padding: 22px !important;
        }

        /* ---------- Search ---------- */
        .float-right .input-group {
            width: 280px;
        }

        .float-right .form-control {
            height: 42px;
            color: #e9edfa !important;
            background: #0c1322 !important;
            border: 1px solid var(--cw-border) !important;
            border-right: 0 !important;
            border-radius: 10px 0 0 10px !important;
            padding: 10px 14px;
            font-size: 12px;
        }

        .float-right .form-control::placeholder {
            color: #69758d !important;
        }

        .float-right .form-control:focus {
            background: #0d1526 !important;
            border-color: rgba(109,115,255,.55) !important;
            box-shadow: none !important;
        }

        .float-right .input-group-append .btn {
            width: 44px;
            height: 42px;
            padding: 0 !important;
            border: 0 !important;
            border-radius: 0 10px 10px 0 !important;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, var(--cw-primary), var(--cw-primary-2)) !important;
            color: #fff !important;
            box-shadow: none !important;
        }

        /* ---------- Table ---------- */
        .table-responsive {
            border: 1px solid var(--cw-border);
            border-radius: 14px;
            overflow: hidden;
            background: #101728;
        }

        table.table,
        table.table th,
        table.table td {
            border: 0 !important;
        }

        table.table {
            margin-bottom: 0 !important;
            border-collapse: separate !important;
            border-spacing: 0;
            color: var(--cw-text-soft) !important;
        }

        table.table thead th,
        table.table tr:first-child th {
            padding: 14px 18px !important;
            background: rgba(255,255,255,.025) !important;
            border-bottom: 1px solid var(--cw-border) !important;
            color: #8490a8 !important;
            font-size: 10px !important;
            font-weight: 800 !important;
            letter-spacing: .7px;
            text-transform: uppercase;
            white-space: nowrap;
        }

        table.table tbody tr {
            background: transparent !important;
            transition: background .18s ease;
        }

        table.table tbody tr:hover {
            background: rgba(109,115,255,.045) !important;
        }

        table.table tbody td {
            padding: 16px 18px !important;
            border-bottom: 1px solid var(--cw-border) !important;
            color: var(--cw-text-soft) !important;
            font-size: 12.5px;
            vertical-align: middle;
        }

        table.table tbody tr:last-child td {
            border-bottom: 0 !important;
        }

        /* Name */
        table.table tbody td:first-child {
            color: var(--cw-text) !important;
            font-weight: 700;
        }

        /* Email */
        table.table tbody td:nth-child(2) {
            color: #9da8be !important;
        }

        /* Created date */
        table.table tbody td:nth-child(3) {
            color: #7f8ba4 !important;
            white-space: nowrap;
            font-size: 11.5px;
        }

        /* ---------- Action Buttons ---------- */
        .table .btn {
            min-width: 72px;
            height: 34px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 6px;
            border-radius: 8px !important;
            border: 1px solid transparent !important;
            font-size: 11px;
            font-weight: 700;
            transition: all .18s ease;
        }

        .table .btn-info {
            color: #aeb4ff !important;
            background: rgba(109,115,255,.10) !important;
            border-color: rgba(109,115,255,.16) !important;
        }

        .table .btn-info:hover {
            color: #fff !important;
            background: var(--cw-primary) !important;
            border-color: var(--cw-primary) !important;
        }

        .table .btn-danger {
            color: var(--cw-danger) !important;
            background: var(--cw-danger-soft) !important;
            border-color: rgba(255,107,125,.14) !important;
            box-shadow: none !important;
        }

        .table .btn-danger:hover {
            color: #fff !important;
            background: var(--cw-danger) !important;
            border-color: var(--cw-danger) !important;
        }

        /* ---------- Pagination ---------- */
        .card-body > .float-right {
            margin-top: 18px;
        }

        .pagination {
            margin-bottom: 0 !important;
            gap: 5px;
        }

        .pagination .page-item .page-link {
            min-width: 34px;
            height: 34px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border: 1px solid var(--cw-border) !important;
            border-radius: 8px !important;
            background: #0f1728 !important;
            color: #929db4 !important;
            font-size: 11px;
            box-shadow: none !important;
        }

        .pagination .page-item .page-link:hover {
            background: rgba(109,115,255,.10) !important;
            color: #fff !important;
            border-color: rgba(109,115,255,.2) !important;
        }

        .pagination .page-item.active .page-link {
            color: #fff !important;
            background: linear-gradient(135deg, var(--cw-primary), var(--cw-primary-2)) !important;
            border-color: transparent !important;
            box-shadow: 0 6px 15px rgba(109,115,255,.2) !important;
        }

        .pagination .page-item.disabled .page-link {
            opacity: .4;
        }

        /* ---------- Alerts ---------- */
        .alert {
            border: 1px solid var(--cw-border) !important;
            border-radius: 12px !important;
            background: #11182a !important;
            color: #cbd3e2 !important;
        }

        /* ---------- Mobile ---------- */
        @media (max-width: 767px) {
            .section-header {
                padding: 17px !important;
            }

            .section-header .section-header-button {
                margin-top: 12px;
                margin-left: 0;
            }

            .float-right {
                float: none !important;
            }

            .float-right .input-group {
                width: 100%;
            }

            .clearfix {
                display: none;
            }

            .card .card-body {
                padding: 15px !important;
            }

            .table-responsive {
                border-radius: 12px;
            }

            table.table tbody td,
            table.table th {
                padding: 13px 14px !important;
            }
        }
    </style>

    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/selectric/public/selectric.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">

            <div class="section-header">
                <h1>Users</h1>

                <div class="section-header-button">
                    <a href="{{ route('user.create') }}" class="btn btn-primary">
                        <i class="fas fa-plus"></i>
                        Add New
                    </a>
                </div>

                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active">
                        <a href="#">Dashboard</a>
                    </div>
                    <div class="breadcrumb-item">
                        <a href="#">Users</a>
                    </div>
                    <div class="breadcrumb-item">All Users</div>
                </div>
            </div>

            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        @include('layouts.alert')
                    </div>
                </div>

                <div class="row mt-4">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">

                                <div class="float-right">
                                    <form method="GET" action="{{ route('user.index') }}">
                                        <div class="input-group">
                                            <input
                                                type="text"
                                                class="form-control"
                                                placeholder="Search users..."
                                                name="name"
                                                value="{{ request('name') }}"
                                            >
                                            <div class="input-group-append">
                                                <button class="btn btn-primary" type="submit">
                                                    <i class="fas fa-search"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                                <div class="clearfix mb-3"></div>

                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Created At</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @foreach ($users as $user)
                                                <tr>
                                                    <td>{{ $user->name }}</td>

                                                    <td>
                                                        {{ $user->email }}
                                                    </td>

                                                    <td>
                                                        {{ $user->created_at }}
                                                    </td>

                                                    <td>
                                                        <div class="d-flex justify-content-start">
                                                            <a
                                                                href="{{ route('user.edit', $user->id) }}"
                                                                class="btn btn-sm btn-info btn-icon"
                                                            >
                                                                <i class="fas fa-edit"></i>
                                                                Edit
                                                            </a>

                                                            <form
                                                                action="{{ route('user.destroy', $user->id) }}"
                                                                method="POST"
                                                                class="ml-2"
                                                            >
                                                                <input type="hidden" name="_method" value="DELETE">
                                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                                                <button
                                                                    type="submit"
                                                                    class="btn btn-sm btn-danger btn-icon confirm-delete"
                                                                >
                                                                    <i class="fas fa-trash-alt"></i>
                                                                    Delete
                                                                </button>
                                                            </form>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>

                                <div class="float-right">
                                    {{ $users->withQueryString()->links() }}
                                </div>

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
    <script src="{{ asset('library/selectric/public/jquery.selectric.min.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('js/page/features-posts.js') }}"></script>
@endpush
