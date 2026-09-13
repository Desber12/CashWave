@extends('layouts.app')

@section('title', 'Products')

@push('style')
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
            --cw-green: #35d39b;
            --cw-orange: #ffb84d;
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

        .section-header-button {
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

        /* Selectric / dropdown */
        .selectric {
            min-height: 44px !important;
            background: var(--cw-input) !important;
            border: 1px solid var(--cw-border) !important;
            border-radius: 10px !important;
        }

        .selectric .label {
            color: #e9edfa !important;
            line-height: 42px !important;
            font-size: 12.5px !important;
        }

        .selectric .button {
            background: transparent !important;
        }

        .selectric-items {
            background: #151e32 !important;
            border: 1px solid var(--cw-border) !important;
            box-shadow: 0 18px 40px rgba(0,0,0,.28) !important;
        }

        .selectric-items li {
            color: #bfc8da !important;
            background: transparent !important;
        }

        .selectric-items li:hover,
        .selectric-items li.highlighted {
            color: #fff !important;
            background: rgba(109,115,255,.10) !important;
        }

        @media (max-width: 767px) {
            .section-header {
                padding: 17px !important;
            }

            .section-header h1 {
                font-size: 22px !important;
            }

            .card .card-body {
                padding: 22px 18px !important;
            }

            .card .card-footer {
                padding: 15px 18px !important;
            }
        }

        .float-right .input-group {
            width: 280px;
        }

        .float-right .form-control {
            height: 42px;
            min-height: 42px;
            border-radius: 10px 0 0 10px !important;
            border-right: 0 !important;
        }

        .float-right .input-group-append .btn {
            width: 44px;
            height: 42px;
            padding: 0 !important;
            border-radius: 0 10px 10px 0 !important;
            display: inline-flex;
            align-items: center;
            justify-content: center;
        }

        .table-responsive {
            border: 1px solid var(--cw-border);
            border-radius: 14px;
            overflow: hidden;
            background: #101728;
        }

        table.table {
            margin-bottom: 0 !important;
            border-collapse: separate !important;
            border-spacing: 0;
            color: var(--cw-text-soft) !important;
        }

        table.table, table.table th, table.table td {
            border: 0 !important;
        }

        table.table thead th {
            padding: 14px 16px !important;
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
            padding: 14px 16px !important;
            border-bottom: 1px solid var(--cw-border) !important;
            color: var(--cw-text-soft) !important;
            font-size: 12px;
            vertical-align: middle;
        }

        table.table tbody tr:last-child td {
            border-bottom: 0 !important;
        }

        table.table tbody td:first-child {
            color: var(--cw-text) !important;
            font-weight: 700;
        }

        .product-photo {
            width: 48px;
            height: 48px;
            object-fit: cover;
            border-radius: 11px;
            border: 1px solid var(--cw-border);
            box-shadow: 0 5px 15px rgba(0,0,0,.2);
        }

        .no-image {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-width: 76px;
            height: 30px;
            padding: 0 9px;
            border-radius: 8px;
            background: rgba(255,107,125,.11);
            color: var(--cw-danger);
            font-size: 10px;
            font-weight: 700;
        }

        .price-cell {
            color: #b6bdff !important;
            font-weight: 750;
            white-space: nowrap;
        }

        .stock-cell {
            color: #8ee8c6 !important;
            font-weight: 700;
        }

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
        }

        .table .btn-info {
            color: #aeb4ff !important;
            background: rgba(109,115,255,.10) !important;
            border-color: rgba(109,115,255,.16) !important;
        }

        .table .btn-info:hover {
            color: #fff !important;
            background: var(--cw-primary) !important;
        }

        .table .btn-danger {
            color: var(--cw-danger) !important;
            background: rgba(255,107,125,.11) !important;
            border-color: rgba(255,107,125,.14) !important;
            box-shadow: none !important;
        }

        .table .btn-danger:hover {
            color: #fff !important;
            background: var(--cw-danger) !important;
        }

        .pagination {
            margin-top: 18px !important;
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

        .pagination .page-item.active .page-link {
            color: #fff !important;
            background: linear-gradient(135deg, var(--cw-primary), var(--cw-primary-2)) !important;
            border-color: transparent !important;
        }

        @media (max-width: 767px) {
            .float-right {
                float: none !important;
            }

            .float-right .input-group {
                width: 100%;
            }

            .clearfix {
                display: none;
            }
        }
    </style>
    <link rel="stylesheet" href="{{ asset('library/selectric/public/selectric.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Products</h1>

                <div class="section-header-button">
                    <a href="{{ route('product.create') }}" class="btn btn-primary">
                        <i class="fas fa-plus"></i>
                        Add New
                    </a>
                </div>

                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Products</a></div>
                    <div class="breadcrumb-item">All Products</div>
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
                                    <form method="GET" action="{{ route('product.index') }}">
                                        <div class="input-group">
                                            <input
                                                type="text"
                                                class="form-control"
                                                placeholder="Search products..."
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
                                                <th>Category</th>
                                                <th>Price</th>
                                                <th>Stock</th>
                                                <th>Photo</th>
                                                <th>Created At</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @foreach ($products as $product)
                                                <tr>
                                                    <td>{{ $product->name }}</td>
                                                    <td>{{ $product->kategori->name }}</td>
                                                    <td class="price-cell">Rp {{ number_format($product->price, 0, ',', '.') }}</td>
                                                    <td class="stock-cell">{{ $product->stock }}</td>
                                                    <td>
                                                        @if ($product->image)
                                                            <img
                                                                src="{{ asset('storage/' . $product->image) }}"
                                                                alt="{{ $product->name }}"
                                                                class="product-photo"
                                                            >
                                                        @else
                                                            <span class="no-image">No Image</span>
                                                        @endif
                                                    </td>
                                                    <td>{{ $product->created_at }}</td>
                                                    <td>
                                                        <div class="d-flex justify-content-start">
                                                            <a
                                                                href="{{ route('product.edit', $product->id) }}"
                                                                class="btn btn-sm btn-info btn-icon mr-2"
                                                            >
                                                                <i class="fas fa-edit"></i>
                                                                Edit
                                                            </a>

                                                            <form action="{{ route('product.destroy', $product->id) }}" method="POST">
                                                                @csrf
                                                                @method('DELETE')

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
                                    {{ $products->withQueryString()->links() }}
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
    <script src="{{ asset('library/selectric/public/jquery.selectric.min.js') }}"></script>
    <script src="{{ asset('js/page/features-posts.js') }}"></script>
@endpush
