@push('style')
<style>
    /* ==========================================================
       CASHWAVE — Sidebar / Dark Premium
    ========================================================== */

    :root {
        --cw-sidebar: #0e1525;
        --cw-sidebar-soft: #111a2d;
        --cw-sidebar-border: rgba(255,255,255,.07);
        --cw-sidebar-text: #929db4;
        --cw-sidebar-text-active: #ffffff;
        --cw-primary: #6d73ff;
        --cw-primary-2: #8b5cf6;
    }

    .main-sidebar.sidebar-style-2 {
        background:
            radial-gradient(circle at 40% -10%, rgba(109,115,255,.10), transparent 32%),
            var(--cw-sidebar) !important;
        border-right: 1px solid var(--cw-sidebar-border) !important;
    }

    #sidebar-wrapper {
        background: transparent !important;
    }

    /* Logo */
    .sidebar-brand {
        height: 74px !important;
        border-bottom: 1px solid var(--cw-sidebar-border);
        background: rgba(255,255,255,.012);
    }

    .sidebar-brand a {
        color: #f6f8ff !important;
        font-weight: 850 !important;
        letter-spacing: 2px !important;
        font-size: 15px !important;
    }

    .sidebar-brand-sm a {
        font-size: 14px !important;
        letter-spacing: 1px !important;
    }

    /* Menu wrapper */
    .sidebar-menu {
        padding: 18px 12px 20px !important;
    }

    .sidebar-menu > li {
        margin-bottom: 5px !important;
    }

    /* Menu links */
    .sidebar-menu li a.nav-link {
        position: relative;
        min-height: 46px;
        display: flex !important;
        align-items: center;
        gap: 11px;
        padding: 0 14px !important;
        border-radius: 11px !important;
        color: var(--cw-sidebar-text) !important;
        background: transparent !important;
        font-size: 12px !important;
        font-weight: 650 !important;
        letter-spacing: .05px;
        transition:
            background .18s ease,
            color .18s ease,
            transform .18s ease;
    }

    .sidebar-menu li a.nav-link::before {
        display: none !important;
    }

    .sidebar-menu li a.nav-link i {
        width: 19px;
        min-width: 19px;
        margin: 0 !important;
        color: #69758d !important;
        font-size: 14px !important;
        text-align: center;
        transition: color .18s ease, transform .18s ease;
    }

    .sidebar-menu li a.nav-link span {
        color: inherit !important;
    }

    /* Hover */
    .sidebar-menu li:hover > a.nav-link {
        color: #e8ecf8 !important;
        background: rgba(109,115,255,.075) !important;
        transform: translateX(2px);
    }

    .sidebar-menu li:hover > a.nav-link i {
        color: #9da3ff !important;
        transform: scale(1.04);
    }

    /* Active */
    .sidebar-menu > li.active > a.nav-link,
    .sidebar-menu > li.active > a.nav-link:hover {
        color: var(--cw-sidebar-text-active) !important;
        background:
            linear-gradient(
                90deg,
                rgba(109,115,255,.18),
                rgba(139,92,246,.10)
            ) !important;
        box-shadow:
            inset 0 0 0 1px rgba(109,115,255,.12),
            0 7px 18px rgba(0,0,0,.12);
    }

    .sidebar-menu > li.active > a.nav-link::after {
        content: "";
        position: absolute;
        left: 0;
        top: 9px;
        bottom: 9px;
        width: 3px;
        border-radius: 999px;
        background: linear-gradient(
            180deg,
            var(--cw-primary),
            var(--cw-primary-2)
        );
        box-shadow: 0 0 10px rgba(109,115,255,.45);
    }

    .sidebar-menu > li.active > a.nav-link i {
        color: #aeb4ff !important;
    }

    /* Nested Products menu */
    .sidebar-menu .dropdown-menu {
        position: static !important;
        float: none !important;
        width: auto !important;
        margin: 4px 0 5px 30px !important;
        padding: 3px !important;
        background: rgba(255,255,255,.018) !important;
        border: 1px solid rgba(255,255,255,.045) !important;
        border-radius: 10px !important;
        box-shadow: none !important;
    }

    .sidebar-menu .dropdown-menu li {
        margin: 0 !important;
    }

    .sidebar-menu .dropdown-menu li a.nav-link {
        min-height: 36px !important;
        padding: 0 11px !important;
        border-radius: 8px !important;
        color: #7f8ba3 !important;
        font-size: 11px !important;
        font-weight: 600 !important;
    }

    .sidebar-menu .dropdown-menu li a.nav-link:hover {
        color: #e8ecf8 !important;
        background: rgba(109,115,255,.07) !important;
        transform: none;
    }

    /* Remove old Stisla arrow look for cleaner sidebar */
    .sidebar-menu li.has-dropdown > a:after,
    .sidebar-menu li.nav-item > a:after {
        color: #56627a !important;
        border-color: #56627a !important;
    }

    /* Better sidebar scroll */
    .main-sidebar .sidebar-menu {
        overflow-y: auto;
        scrollbar-width: thin;
        scrollbar-color: rgba(255,255,255,.08) transparent;
    }

    .main-sidebar .sidebar-menu::-webkit-scrollbar {
        width: 4px;
    }

    .main-sidebar .sidebar-menu::-webkit-scrollbar-track {
        background: transparent;
    }

    .main-sidebar .sidebar-menu::-webkit-scrollbar-thumb {
        background: rgba(255,255,255,.08);
        border-radius: 99px;
    }

    @media (max-width: 1024px) {
        .sidebar-menu {
            padding-left: 9px !important;
            padding-right: 9px !important;
        }
    }
</style>
@endpush

<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">

        <div class="sidebar-brand">
            <a href="{{ route('dashboard') }}">CASHWAVE</a>
        </div>

        <div class="sidebar-brand sidebar-brand-sm">
            <a href="{{ route('dashboard') }}">CW</a>
        </div>

        <ul class="sidebar-menu">

            {{-- Dashboard --}}
            <li class="nav-item {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                <a href="{{ route('dashboard') }}" class="nav-link">
                    <i class="fas fa-th-large"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            {{-- Users --}}
            <li class="nav-item {{ request()->routeIs('user.*') ? 'active' : '' }}">
                <a href="{{ route('user.index') }}" class="nav-link">
                    <i class="fas fa-users"></i>
                    <span>Users</span>
                </a>
            </li>

            {{-- Categories --}}
            <li class="nav-item {{ request()->routeIs('categories.*') ? 'active' : '' }}">
                <a href="{{ route('categories.index') }}" class="nav-link">
                    <i class="fas fa-layer-group"></i>
                    <span>Categories</span>
                </a>
            </li>

            {{-- Products --}}
            <li class="nav-item {{ request()->routeIs('product.*') ? 'active' : '' }}">
                <a href="{{ route('product.index') }}" class="nav-link">
                    <i class="fas fa-box-open"></i>
                    <span>Products</span>
                </a>

                <ul class="dropdown-menu">
                    <li>
                        <a
                            class="nav-link"
                            href="{{ route('product.index') }}"
                        >
                            <i class="fas fa-list-ul"></i>
                            <span>All Products</span>
                        </a>
                    </li>

                    <li>
                        <a
                            class="nav-link"
                            href="{{ route('product.create') }}"
                        >
                            <i class="fas fa-plus"></i>
                            <span>Add Product</span>
                        </a>
                    </li>
                </ul>
            </li>

            {{-- Orders --}}
            <li class="nav-item {{ request()->routeIs('order.*') ? 'active' : '' }}">
                <a href="{{ route('order.index') }}" class="nav-link">
                    <i class="fas fa-receipt"></i>
                    <span>Orders</span>
                </a>
            </li>

        </ul>
    </aside>
</div>
