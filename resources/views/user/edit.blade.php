@extends('layouts.app')

@section('title', 'Edit User')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/bootstrap-daterangepicker/daterangepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('library/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/select2/dist/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/selectric/public/selectric.css') }}">
    <link rel="stylesheet" href="{{ asset('library/bootstrap-timepicker/css/bootstrap-timepicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/bootstrap-tagsinput/dist/bootstrap-tagsinput.css') }}">

    <style>

        /* ==========================================================
           CASHWAVE — User Form / Dark Premium Theme
        ========================================================== */

        :root {
            --cw-bg: #0b1020;
            --cw-surface: #11182a;
            --cw-surface-2: #151e32;
            --cw-input: #0c1322;
            --cw-text: #f4f7ff;
            --cw-text-soft: #c3ccdd;
            --cw-muted: #8f9bb5;
            --cw-border: rgba(255,255,255,.075);
            --cw-primary: #6d73ff;
            --cw-primary-2: #8b5cf6;
            --cw-danger: #ff6b7d;
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

        /* Page header */
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

        .section-header-breadcrumb {
            margin-top: 7px;
        }

        .section-header-breadcrumb .breadcrumb-item {
            color: var(--cw-muted) !important;
            font-size: 11px;
        }

        .section-header-breadcrumb .breadcrumb-item a,
        .section-header-breadcrumb .breadcrumb-item.active {
            color: #929cff !important;
        }

        /* Form card */
        .section-body > .card {
            max-width: 900px;
            margin: 0 auto;
            background: linear-gradient(145deg, #121a2c 0%, #101728 100%) !important;
            border: 1px solid var(--cw-border) !important;
            border-radius: 18px !important;
            box-shadow: 0 16px 42px rgba(0,0,0,.20) !important;
            overflow: hidden;
        }

        .section-body > .card form {
            margin: 0;
        }

        .card .card-header {
            min-height: 70px;
            padding: 20px 25px !important;
            background: transparent !important;
            border-bottom: 1px solid var(--cw-border) !important;
        }

        .card .card-header h4 {
            color: var(--cw-text) !important;
            font-size: 15px !important;
            font-weight: 750 !important;
            margin: 0 !important;
        }

        .card .card-body {
            padding: 28px 25px !important;
        }

        /* Form fields */
        .form-group {
            margin-bottom: 22px !important;
        }

        .form-group:last-child {
            margin-bottom: 4px !important;
        }

        .form-group label,
        .form-label {
            display: block;
            margin-bottom: 8px !important;
            color: #b8c2d5 !important;
            font-size: 12px !important;
            font-weight: 700 !important;
            letter-spacing: .1px;
        }

        .form-control {
            min-height: 44px;
            color: #e9edfa !important;
            background: var(--cw-input) !important;
            border: 1px solid var(--cw-border) !important;
            border-radius: 10px !important;
            box-shadow: none !important;
            padding: 10px 14px !important;
            font-size: 12.5px !important;
            transition: border-color .18s ease, box-shadow .18s ease, background .18s ease;
        }

        .form-control:hover {
            border-color: rgba(255,255,255,.12) !important;
        }

        .form-control:focus {
            color: #f4f7ff !important;
            background: #0d1526 !important;
            border-color: rgba(109,115,255,.65) !important;
            box-shadow: 0 0 0 4px rgba(109,115,255,.10) !important;
        }

        .form-control::placeholder {
            color: #66728b !important;
        }

        /* Password icon */
        .input-group-prepend .input-group-text {
            min-width: 44px;
            justify-content: center;
            color: #8995ad !important;
            background: #151e32 !important;
            border: 1px solid var(--cw-border) !important;
            border-right: 0 !important;
            border-radius: 10px 0 0 10px !important;
        }

        .input-group .form-control {
            border-radius: 0 10px 10px 0 !important;
        }

        .input-group .form-control:focus {
            border-left-color: var(--cw-border) !important;
        }

        /* Validation */
        .form-control.is-invalid {
            border-color: rgba(255,107,125,.7) !important;
            box-shadow: 0 0 0 4px rgba(255,107,125,.07) !important;
        }

        .invalid-feedback {
            color: var(--cw-danger) !important;
            font-size: 11px !important;
            margin-top: 7px;
        }

        /* Role selector */
        .selectgroup {
            display: flex;
            width: 100%;
            gap: 10px;
        }

        .selectgroup-item {
            flex: 1;
            margin: 0 !important;
        }

        .selectgroup-input {
            position: absolute;
            opacity: 0;
            pointer-events: none;
        }

        .selectgroup-button {
            width: 100%;
            min-height: 44px;
            display: flex !important;
            align-items: center;
            justify-content: center;
            padding: 10px 14px !important;
            color: #8995ad !important;
            background: var(--cw-input) !important;
            border: 1px solid var(--cw-border) !important;
            border-radius: 10px !important;
            font-size: 12px !important;
            font-weight: 700 !important;
            transition: all .18s ease;
        }

        .selectgroup-button:hover {
            color: #dce3f4 !important;
            border-color: rgba(109,115,255,.3) !important;
            background: rgba(109,115,255,.06) !important;
        }

        .selectgroup-input:checked + .selectgroup-button {
            color: #fff !important;
            background: linear-gradient(135deg, var(--cw-primary), var(--cw-primary-2)) !important;
            border-color: transparent !important;
            box-shadow: 0 7px 18px rgba(109,115,255,.18) !important;
        }

        .selectgroup-input:focus + .selectgroup-button {
            box-shadow: 0 0 0 4px rgba(109,115,255,.10) !important;
        }

        /* Footer / actions */
        .card .card-footer {
            padding: 17px 25px !important;
            background: rgba(255,255,255,.018) !important;
            border-top: 1px solid var(--cw-border) !important;
        }

        .card-footer .btn-primary {
            min-height: 40px;
            padding: 9px 21px !important;
            border: 0 !important;
            border-radius: 10px !important;
            color: #fff !important;
            background: linear-gradient(135deg, var(--cw-primary), var(--cw-primary-2)) !important;
            box-shadow: 0 8px 18px rgba(109,115,255,.2) !important;
            font-size: 12px !important;
            font-weight: 750 !important;
        }

        .card-footer .btn-primary:hover {
            transform: translateY(-1px);
            box-shadow: 0 11px 23px rgba(109,115,255,.27) !important;
        }

        @media (max-width: 767px) {
            .section-header {
                padding: 17px !important;
            }

            .section-header h1 {
                font-size: 22px !important;
            }

            .section-body > .card {
                margin: 0;
            }

            .card .card-body {
                padding: 22px 18px !important;
            }

            .card .card-footer {
                padding: 15px 18px !important;
            }

            .selectgroup {
                flex-direction: column;
                gap: 8px;
            }
        }

    </style>
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Edit User</h1>

                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active">
                        <a href="#">Dashboard</a>
                    </div>
                    <div class="breadcrumb-item">
                        <a href="#">Forms</a>
                    </div>
                    <div class="breadcrumb-item">Users</div>
                </div>
            </div>

            <div class="section-body">
                <div class="card">
                    <form action="{{ route('user.update', $user) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="card-header">
                            <h4>Edit User Information</h4>
                        </div>

                        <div class="card-body">
                            <div class="form-group">
                                <label>Name</label>
                                <input
                                    type="text"
                                    class="form-control @error('name') is-invalid @enderror"
                                    name="name"
                                    value="{{ $user->name }}"
                                >
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Email</label>
                                <input
                                    type="email"
                                    class="form-control @error('email') is-invalid @enderror"
                                    name="email"
                                    value="{{ $user->email }}"
                                >
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Password</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="fas fa-lock"></i>
                                        </div>
                                    </div>
                                    <input
                                        type="password"
                                        class="form-control @error('password') is-invalid @enderror"
                                        name="password"
                                        placeholder="Leave blank to keep current password"
                                    >
                                </div>
                                @error('password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Phone</label>
                                <input
                                    type="number"
                                    class="form-control"
                                    name="phone"
                                    value="{{ $user->phone }}"
                                >
                            </div>

                            <div class="form-group">
                                <label class="form-label">Roles</label>

                                <div class="selectgroup w-100">
                                    <label class="selectgroup-item">
                                        <input
                                            type="radio"
                                            name="roles"
                                            value="admin"
                                            class="selectgroup-input"
                                            @if ($user->roles == 'admin') checked @endif
                                        >
                                        <span class="selectgroup-button">Admin</span>
                                    </label>

                                    <label class="selectgroup-item">
                                        <input
                                            type="radio"
                                            name="roles"
                                            value="staff"
                                            class="selectgroup-input"
                                            @if ($user->roles == 'staff') checked @endif
                                        >
                                        <span class="selectgroup-button">Staff</span>
                                    </label>

                                    <label class="selectgroup-item">
                                        <input
                                            type="radio"
                                            name="roles"
                                            value="user"
                                            class="selectgroup-input"
                                            @if ($user->roles == 'user') checked @endif
                                        >
                                        <span class="selectgroup-button">User</span>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="card-footer text-right">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save mr-1"></i>
                                Save Changes
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('scripts')
@endpush
