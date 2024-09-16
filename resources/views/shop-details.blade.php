<!DOCTYPE html>
<html lang="zxx">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ogani Template">
    <meta name="keywords" content="Ogani, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Belindo</title>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/elegant-icons.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/nice-select.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/jquery-ui.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/slicknav.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" type="text/css">
    <style>
        .hero__categories__all {
            background-color: orange;
        }
        .hero__search__form button.site-btn {
            background-color: orange;
            color: #fff;
        }
        .primary-btn {
            display: inline-block;
            padding: 10px 20px;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            border: 2px solid transparent;
            font-weight: bold;
        }
        .btn-keranjang {
            background-color: blue;
            border: 2px solid blue;
            margin-right: 10px;
        }
        .btn-beli {
            background-color: orange;
            border: 2px solid orange;
        }
        .hero__search__phone {
            margin-top: -50px;
            margin-right: 50px;
        }
    </style>
</head>
<body>
    <div id="preloder">
        <div class="loader"></div>
    </div>
    <!-- Humberger Begin -->
    <div class="humberger__menu__overlay"></div>
    <div class="humberger__menu__wrapper">
        <div class="humberger__menu__logo">
            <a href="#"><img src="img/logo.png" alt=""></a>
        </div>
        @include('layoutuser.navbar')
        <div class="humberger__open">
            <i class="fa fa-bars"></i>
        </div>
    </div>
</header>
@include('layoutuser.sidemenu1')
<div class="col-lg-9">
    <div class="hero__search">
        <div class="hero__search__container">
            <div class="hero__search__form">
                <form action="{{ route('search') }}" method="GET">
                    <input type="text" name="search" placeholder="Cari di Belindo">
                    <button type="submit" class="site-btn">Cari</button>
                </form>
            </div>
        </div>
        <div class="hero__search__phone">
            <div class="hero__search__phone__text">
                <h5>Cari Cuan</h5>
                <span>Sambil Rebahan!</span>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</section>
</section>
<section class="product-details spad">
    <div class="container">
        <div class="row">
            @if(isset($produk))
                <!-- Display product details -->
                <div class="col-lg-5 col-md-6">
                    <div class="product_details_pic">
                        <div class="product_detailspic_item">
                            <img class="product_detailspic_item--large"
                                 src="{{ asset('storage/images/' . $produk->foto) }}"
                                 alt="{{ $produk->nama }}"
                                 style="width: 100%; max-width: 300px;">
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 col-md-6">
                    <div class="product_details_text">
                        <h3>{{ $produk->nama }}</h3>
                        <div><b>Stok</b> <span>{{ $produk->jumlah }}</span></div>
                        <div><b>Berat</b> <span>{{ $produk->berat}}</span></div>
                        <div class="product_details_price">Rp. {{ number_format($produk->harga_retail, 0, ',', '.') }}</div>
                        <a href="#" class="primary-btn btn-keranjang" onclick="addToKeranjang('{{ $produk->id }}')">
                            <i></i> Masukkan Keranjang</a>
                        <a href="#" class="primary-btn btn-beli">Beli Langsung</a>
                    </div>
                </div>
            @else
                <div class="col-lg-12">
                    <p>Tidak ada produk yang ditemukan.</p>
                </div>
            @endif
        </div>
    </div>

    <div class="col-lg-12">
        <div class="product_details_tab">
            <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab" aria-selected="true">Deskripsi</a>
                </li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="tabs-1" role="tabpanel">
                    <div class="product_detailstab_desc">
                        <h6>{{ $produk->nama }}</h6>
                        <p>{{ $produk->deskripsi }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    
</section>

@include('layoutuser.footer')

<script>
    function addToKeranjang(productId) {
        @guest
            window.location.href = "{{ route('login') }}";
        @else
            $.ajax({
                url: '/add-to-keranjang/' + productId,
                type: 'GET',
                success: function(response) {
                    alert(response.message);
                },
                error: function(xhr) {
                    alert('Error: ' + xhr.responseText);
                }
            });
        @endguest
    }
</script>
</body>
</html>
