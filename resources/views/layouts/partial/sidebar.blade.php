<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="index.html" class="app-brand-link">
            <img src="{{ asset('images/logo/1.png') }}" alt="">
            <span class="app-brand-text demo menu-text fw-bolder ms-2">TOKO BAROKAH</span>
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        <!-- Dashboard -->
        <li class="menu-item active">
            <a href="/dashboard" class="menu-link {{ $title === 'Barokah' ? ' active' : '' }}">
                <i class="menu-icon tf-icons bx bxs-dashboard"></i>
                <div data-i18n="Analytics">Dashboard</div>
            </a>
        </li>

        <!-- Master Data -->
        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Master Data</span>
        </li>

        <li class="menu-item active">
            <a href="/produk" class="menu-link {{ $title === 'Barokah' ? ' active' : '' }}">
                <i class="menu-icon tf-icons bx bxs-package"></i>
                <div data-i18n="Analytics">Produk</div>
            </a>
        </li>

        <li class="menu-item active">
            <a href="/supplier" class="menu-link {{ $title === 'Barokah' ? ' active' : '' }}">
                <i class="menu-icon tf-icons bx bxs-archive-in"></i>
                <div data-i18n="Analytics">Supplier</div>
            </a>
        </li>

        <li class="menu-item active">
            <a href="/kategori" class="menu-link {{ $title === 'Barokah' ? ' active' : '' }}">
                <i class="menu-icon tf-icons bx bxs-package"></i>
                <div data-i18n="Analytics">Kategori</div>
            </a>
        </li>


        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Transaksi</span>
        </li>

        <li class="menu-item">
            <a href="/gudang" class="menu-link {{ $title === 'Barokah' ? ' active' : '' }}">
                <i class="menu-icon tf-icons bx bxs-cart-add"></i>
                <div data-i18n="Account Settings">Transaksi Gudang</div>
            </a>
        </li>
        </li>

        <li class="menu-item">
            <a href="/toko" class="menu-link {{ $title === 'Barokah' ? ' active' : '' }}">
                <i class="menu-icon tf-icons bx bxs-cart-download"></i>
                <div data-i18n="Account Settings">Transaksi Toko</div>
            </a>
        </li>

        <!-- Components -->
        <li class="menu-header small text-uppercase"><span class="menu-header-text">Laporan</span></li>
        <!-- Cards -->
        <li class="menu-item active">
            <a href="/laporan" class="menu-link {{ $title === 'Barokah' ? ' active' : '' }}">
                <i class="menu-icon tf-icons bx bxs-report"></i>
                <div data-i18n="Analytics">Laporan</div>
            </a>
        </li>

        <li class="menu-header small text-uppercase"><span class="menu-header-text">Sistem</span></li>

        <li class="menu-item active">
            <a href="/users" class="menu-link {{ $title === 'Barokah' ? ' active' : '' }}">
                <i class="menu-icon tf-icons bx bxs-user-circle"></i>
                <div data-i18n="Analytics">Users</div>
            </a>
        </li>

        <li class="menu-item active">
            <a href="/setting" class="menu-link {{ $title === 'Barokah' ? ' active' : '' }}">
                <i class="menu-icon tf-icons bx bxs-cog"></i>
                <div data-i18n="Analytics">Setting</div>
            </a>
        </li>
    </ul>
</aside>
