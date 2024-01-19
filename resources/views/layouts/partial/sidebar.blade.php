<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="index.html" class="app-brand-link">
            <span class="app-brand-logo demo">
                <img src="{{ asset('template/assets/img/favicon/1.png') }}" alt="" style="width: 30px;">
            </span>
            <span class="demo menu-text fw-bolder ms-2" style="font-size: 23px;">{{ config('app.name') }}</span>
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        <!-- Dashboards -->
        <!-- Dashboard -->
        <li class="menu-item {{ $active === 'Dashboard' ? ' active' : '' }}">
            <a href="/dashboard" class="menu-link ">
                <i class="menu-icon tf-icons bx bxs-dashboard"></i>
                <div data-i18n="Analytics">Dashboard</div>
            </a>
        </li>

        <!-- Master Data -->
        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Master Data</span>
        </li>

        <li class="menu-item {{ $active === 'Produk' ? ' active' : '' }}">
            <a href="/produk" class="menu-link">
                <i class="menu-icon tf-icons bx bxs-package"></i>
                <div data-i18n="Analytics">Produk</div>
            </a>
        </li>

        <li class="menu-item {{ $active === 'Supplier' ? ' active' : '' }}">
            <a href="/supplier" class="menu-link ">
                <i class="menu-icon tf-icons bx bxs-archive-in"></i>
                <div data-i18n="Analytics">Supplier</div>
            </a>
        </li>

        <li class="menu-item {{ $active === 'Kategori' ? ' active' : '' }}">
            <a href="/kategori" class="menu-link ">
                <i class="menu-icon tf-icons bx bxs-package"></i>
                <div data-i18n="Analytics">Kategori</div>
            </a>
        </li>


        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Transaksi</span>
        </li>

        <li class="menu-item {{ $active === 'TransaksiG' ? ' active' : '' }}">
            <a href="/transaksi-gudang" class="menu-link ">
                <i class="menu-icon tf-icons bx bxs-cart-add"></i>
                <div data-i18n="Account Settings">Transaksi Gudang</div>
            </a>
        </li>
        </li>

        <li class="menu-item {{ $active === 'TransaksiT' ? ' active' : '' }}">
            <a href="/transaksi" class="menu-link ">
                <i class="menu-icon tf-icons bx bxs-cart-download"></i>
                <div data-i18n="Account Settings">Transaksi Toko</div>
            </a>
        </li>

        <!-- Components -->
        <li class="menu-header small text-uppercase"><span class="menu-header-text">Laporan</span></li>
        <!-- Cards -->
        <li class="menu-item {{ $active === 'Laporan' ? ' active' : '' }}">
            <a href="/laporan" class="menu-link">
                <i class="menu-icon tf-icons bx bxs-report"></i>
                <div data-i18n="Analytics">Laporan</div>
            </a>
        </li>

        <li class="menu-header small text-uppercase"><span class="menu-header-text">Sistem</span></li>

        <li class="menu-item {{ $active === 'Users' ? ' active' : '' }} ">
            <a href="/users" class="menu-link">
                <i class="menu-icon tf-icons bx bxs-user-circle"></i>
                <div data-i18n="Analytics">Users</div>
            </a>
        </li>

        <li class="menu-item {{ $active === 'Setting' ? ' active' : '' }}">
            <a href="/setting" class="menu-link ">
                <i class="menu-icon tf-icons bx bxs-cog"></i>
                <div data-i18n="Analytics">Setting</div>
            </a>
        </li>
    </ul>
    <br>

</aside>
