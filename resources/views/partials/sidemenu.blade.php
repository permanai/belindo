<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="{{ route('admin.index') }}" class="app-brand-link">
            <img src="{{ asset('img/logo belindo.png') }}" alt="Logo" width="120">
            {{-- <span class="menu-text fw-bolder fs-4 ms-2">Admin</span> --}}
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">

        @if(Auth::check() && Auth::user()->role_id == 1)
        <li class="menu-item">
            <a href="{{ route('admin.user') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-user"></i>
                <div>Customers</div>
            </a>
        </li>
        @endif

        <!-- Produk -->
        <li class="menu-item">
            <a href="{{ route('admin.produk.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-box"></i>
                <div>Produk</div>
            </a>
        </li>
        <li class="menu-item">
            <a href="{{ route('admin.kategori.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-box"></i>
                <div>Kategori</div>
            </a>
        </li>
        <li class="menu-item dropdown">
            <a href="#" class="menu-link dropdown-toggle" data-bs-toggle="dropdown">
                <i class="menu-icon tf-icons bx bx-box"></i>
                <div>Sub Kategori</div>
            </a>
            <ul class="dropdown-menu">
                <li><a href="{{ route('admin.kategori.alat_kebersihan.index') }}">Alat Kebersihan</a></li>
                <li><a href="{{ route('admin.kategori.alat_kecantikan.index') }}">Alat Kecantikan</a></li>
                <li><a href="{{ route('admin.kategori.alat_tulis_kantor.index') }}">Alat Tulis Kantor</a></li>
                <li><a href="{{ route('admin.kategori.barang_unik.index') }}">Barang Unik</a></li>
                <li><a href="{{ route('admin.kategori.elektronik.index') }}">Elektronik</a></li>
                <li><a href="{{ route('admin.kategori.fashion.index') }}">Fashion</a></li>
                <li><a href="{{ route('admin.kategori.ibu_anak.index') }}">Ibu dan Anak</a></li>
                <li><a href="{{ route('admin.kategori.perabot_dapur.index') }}">Perabot Dapur</a></li>
                <li><a href="{{ route('admin.kategori.perabot_rumah.index') }}">Perabot Rumah</a></li>
                <li><a href="{{ route('admin.kategori.produk_kesehatan.index') }}">Produk Kesehatan</a></li>
                
            </ul>
        </li>
    </ul>
</aside>