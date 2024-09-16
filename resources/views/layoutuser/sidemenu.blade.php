<section class="hero hero-normal">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="hero__categories">
                    <div class="hero__categories__all" id="dropdownToggle">
                        <i class="fa fa-bars"></i>
                        <span>All Categories</span>
                    </div>
                    <style>
                         #categoryDropdown .active {
            color: orange;
        }
                </style>
                    <ul id="categoryDropdown" class="show">
                        <li><a href="{{ route('perabot-dapur') }}" @if(Request::is('perabot-dapur')) class="active" @endif>Perabot Dapur</a></li>
                        <li><a href="{{ route('alat-kebersihan') }}" @if(Request::is('alat-kebersihan')) class="active" @endif>Alat Kebersihan</a></li>
                        <li><a href="{{ route('produk-kesehatan') }}" @if(Request::is('produk-kesehatan')) class="active" @endif>Produk Kesehatan</a></li>
                        <li><a href="{{ route('alat-kecantikan') }}" @if(Request::is('alat-kecantikan')) class="active" @endif>Alat Kecantikan</a></li>
                        <li><a href="{{ route('elektronik') }}" @if(Request::is('elektronik')) class="active" @endif>Elektronik</a></li>
                        <li><a href="{{ route('perabot-rumah') }}" @if(Request::is('perabot-rumah')) class="active" @endif>Perabot rumah</a></li>
                        <li><a href="{{ route('ibu-dan-anak') }}" @if(Request::is('ibu-dan-anak')) class="active" @endif>Ibu dan Anak</a></li>
                        <li><a href="{{ route('fashion') }}" @if(Request::is('fashion')) class="active" @endif>Fashion</a></li>
                        <li><a href="{{ route('barang-unik') }}" @if(Request::is('barang-unik')) class="active" @endif>Barang unik</a></li>
                        <li><a href="{{ route('alat-tulis-kantor') }}" @if(Request::is('alat-tulis-kantor')) class="active" @endif>Alat tulis kantor</a></li>
                    </ul>
                    
                </div>
            </div>
            <script>
                document.addEventListener("DOMContentLoaded", function() {
                    var dropdownToggle = document.getElementById("dropdownToggle");
                    var categoryDropdown = document.getElementById("categoryDropdown");
                    
                    dropdownToggle.addEventListener("click", function() {
                        categoryDropdown.classList.toggle("show");
                    });
                });
            </script>
