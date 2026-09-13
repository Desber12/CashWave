@extends('layouts.app')

@section('title', 'Edit Category')

@push('style')
    <link rel="stylesheet" href="{{ asset('library/bootstrap-daterangepicker/daterangepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('library/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/select2/dist/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/selectric/public/selectric.css') }}">
    <link rel="stylesheet" href="{{ asset('library/bootstrap-timepicker/css/bootstrap-timepicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/bootstrap-tagsinput/dist/bootstrap-tagsinput.css') }}">

    <style>

        :root {
            --cw-bg: #0b1020;
            --cw-surface: #11182a;
            --cw-input: #0c1322;
            --cw-text: #f4f7ff;
            --cw-text-soft: #c3ccdd;
            --cw-muted: #8f9bb5;
            --cw-border: rgba(255,255,255,.075);
            --cw-primary: #6d73ff;
            --cw-primary-2: #8b5cf6;
            --cw-danger: #ff6b7d;
        }

        html, body {
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

        .section-header .section-header-button {
            margin-left: auto;
        }

        .section-header .section-header-button .btn,
        .btn-primary {
            color: #fff !important;
            background: linear-gradient(135deg, var(--cw-primary), var(--cw-primary-2)) !important;
            border: 0 !important;
            border-radius: 10px !important;
            box-shadow: 0 8px 18px rgba(109,115,255,.2) !important;
            font-weight: 750 !important;
        }

        .section-header .section-header-button .btn {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            padding: 10px 17px !important;
            font-size: 12px;
        }

        .section-header .section-header-button .btn:hover,
        .btn-primary:hover {
            transform: translateY(-1px);
            box-shadow: 0 11px 23px rgba(109,115,255,.27) !important;
        }

        .card {
            background: linear-gradient(145deg, #121a2c 0%, #101728 100%) !important;
            border: 1px solid var(--cw-border) !important;
            border-radius: 18px !important;
            box-shadow: 0 16px 42px rgba(0,0,0,.20) !important;
            overflow: hidden;
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

        .form-group {
            margin-bottom: 22px !important;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px !important;
            color: #b8c2d5 !important;
            font-size: 12px !important;
            font-weight: 700 !important;
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

        .form-control.is-invalid {
            border-color: rgba(255,107,125,.7) !important;
            box-shadow: 0 0 0 4px rgba(255,107,125,.07) !important;
        }

        .invalid-feedback {
            color: var(--cw-danger) !important;
            font-size: 11px !important;
            margin-top: 7px;
        }

        .card .card-footer {
            padding: 17px 25px !important;
            background: rgba(255,255,255,.018) !important;
            border-top: 1px solid var(--cw-border) !important;
        }

        .card-footer .btn-primary {
            min-height: 40px;
            padding: 9px 21px !important;
            font-size: 12px !important;
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
        }

    </style>
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Edit Category</h1>

                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Forms</a></div>
                    <div class="breadcrumb-item">Category</div>
                </div>
            </div>

            <div class="section-body">
                <div class="card">
                    <form action="{{ route('categories.update', $category) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="card-header">
                            <h4>Edit Category Information</h4>
                        </div>

                        <div class="card-body">
                            <div class="form-group">
                                <label>Name</label>
                                <input
                                    type="text"
                                    class="form-control @error('name') is-invalid @enderror"
                                    name="name"
                                    value="{{ $category->name }}"
                                    placeholder="Enter category name"
                                >
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
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
