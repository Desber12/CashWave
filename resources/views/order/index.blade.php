@extends('layouts.app')

@section('title', 'Orders')

@push('style')
    <link rel="stylesheet" href="{{ asset('library/selectric/public/selectric.css') }}">

    <style>
        :root {
            --cw-bg: #0b1020;
            --cw-surface: #11182a;
            --cw-text: #f4f7ff;
            --cw-text-soft: #c3ccdd;
            --cw-muted: #8f9bb5;
            --cw-border: rgba(255,255,255,.075);
            --cw-primary: #6d73ff;
            --cw-primary-2: #8b5cf6;
            --cw-green: #35d39b;
        }

        html, body {
            background: var(--cw-bg) !important;
        }

        .main-content {
            min-height: 100vh;
            padding-top: 18px !important;
            background:
                radial-gradient(
                    circle at 72% -10%,
                    rgba(109,115,255,.11),
                    transparent 30%
                ),
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
            margin: 0 !important;
        }

        .card {
            background: linear-gradient(
                145deg,
                #121a2c 0%,
                #101728 100%
            ) !important;
            border: 1px solid var(--cw-border) !important;
            border-radius: 18px !important;
            box-shadow: 0 16px 42px rgba(0,0,0,.20) !important;
            overflow: hidden;
        }

        .card-header {
            min-height: 70px;
            padding: 20px 25px !important;
            background: transparent !important;
            border-bottom: 1px solid var(--cw-border) !important;
        }

        .card-header h4 {
            color: var(--cw-text) !important;
            font-size: 15px !important;
            font-weight: 750 !important;
            margin: 0;
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
        }

        table.table,
        table.table th,
        table.table td {
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
        }

        table.table tbody tr {
            background: transparent !important;
            transition: background .18s ease;
        }

        table.table tbody tr:hover {
            background: rgba(109,115,255,.045) !important;
        }

        table.table tbody td {
            padding: 15px 16px !important;
            color: var(--cw-text-soft) !important;
            border-bottom: 1px solid var(--cw-border) !important;
            font-size: 12px;
        }

        .order-link {
            color: #aeb4ff !important;
            font-weight: 750;
            text-decoration: none !important;
        }

        .price {
            color: #b6bdff !important;
            font-weight: 750 !important;
            white-space: nowrap;
        }

        .item-count {
            color: #91e7c7 !important;
            font-weight: 700 !important;
        }
    </style>
@endpush

@section('main')
    <div class="main-content">
        <section class="section">

            <div class="section-header">
                <h1>Orders</h1>

                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active">
                        <a href="#">Dashboard</a>
                    </div>
                    <div class="breadcrumb-item">
                        <a href="#">Orders</a>
                    </div>
                    <div class="breadcrumb-item">
                        All Orders
                    </div>
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

                            <div class="card-header">
                                <h4>Transaction History</h4>
                            </div>

                            <div class="card-body">

                                <div class="table-responsive">

                                    <table class="table table-striped">

                                        <thead>
                                            <tr>
                                                <th>Transaction Time</th>
                                                <th>Total Price</th>
                                                <th>Total Item</th>
                                                <th>Kasir</th>
                                            </tr>
                                        </thead>

                                        <tbody>

                                            @foreach ($order as $item)

                                                <tr>

                                                    <td>
                                                        <a
                                                            href="{{ route('order.show', $item->id) }}"
                                                            class="order-link"
                                                        >
                                                            {{ $item->created_at }}
                                                        </a>
                                                    </td>

                                                    <td class="price">
                                                        Rp {{ number_format($item->total_price, 0, ',', '.') }}
                                                    </td>

                                                    <td class="item-count">
                                                        {{ $item->total_item }}
                                                    </td>

                                                    <td>
                                                        {{ $item->kasir->name }}
                                                    </td>

                                                </tr>

                                            @endforeach

                                        </tbody>

                                    </table>

                                </div>

                                <div class="float-right mt-3">
                                    {{ $order->withQueryString()->links() }}
                                </div>

                            </div>

                        </div>

                    </div>
                </div>

            </div>
        </section>
    </div>
@endsection
