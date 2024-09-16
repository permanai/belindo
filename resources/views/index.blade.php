
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
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <link rel="icon" type="image/png" href="img/favicon.ico" />

    <style>
        .hero__search__container {
    margin-bottom: 25px;
   
}
.hero__search__phone {
    margin-top: -25px;
    margin-bottom: 25px;
    margin-right: 50px;
}
        .hero__categories__all {
            background-color: orange; 
        }
        .hero__search__form button.site-btn {
            background-color: orange; 
            color: #fff; 
        }

        .hero__text .primary-btn {
            background-color: orange;
        }
        .header__top__right__auth {
    position: absolute;
    top: 0;
    right: 0;
}
.dropdown-content {
    display: none;
    position: absolute;
    background-color: #f9f9f9;
    min-width: 160px;
    box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
    z-index: 1;
    right: 0; 
}

.dropdown-content a {
    color: #333; 
    padding: 10px 15px; 
    display: block;
    text-decoration: none;
}

.dropdown-content a:hover {
    background-color: #f5f5f5; 

.show {
    display: block !important;
    .header__cart {
    float: left; 
}

.header__top__right__user {
    float: right;
    margin-left: 20px;
   
}

}
#categoryList {
            overflow-x: auto;
            white-space: nowrap; 
            max-width: 500px; 
        }
        .filterItem {
            display: inline-block;
            margin-right: 10px; 
        }
        .product__item__pic {
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div id="preloder">
        <div class="loader"></div>
    </div>
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
   @include('layoutuser.sidemenu')
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
                <div class="hero__item set-bg" data-setbg="https://ceklist.id/wp-content/uploads/2023/02/Peralatan-Dapur-Lengkap-300x200@2x.jpg">
                    <div class="hero__text" style="color: white;">
                        <span></span>
                        <h2 style="color: white;">Tambahkan sentuhan gaya <br>ke dapur Anda <br /> dengan koleksi peralatan yang stylish dan elegan.</h2>
                        {{-- <p style="color: white;">Free Pickup and Delivery Available</p> --}}
                        <a href="{{ route('shop-grid') }}" class="primary-btn">SHOP NOW</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

    <section class="product spad">
        <div class="container">
            <div class="section-title">
                <h2>Produk Terbaru</h2>
                <a href="{{ route('produkterbaru') }}" class="float-right" style="color: orange;"><i class="fa fa-arrow-right"></i> Lihat Semua</a>
                <div class="clearfix"></div> 
            </div>
        <div class="row product__filter">
            @foreach($produksTerbaru as $produk)
            <div class="col-lg-3 col-md-4 col-sm-6 mix {{ $produk->kategori->kategori }}">
                <div class="product__item">
                    <div class="product__item__pic set-bg" data-setbg="{{ asset('storage/images/' . $produk->foto) }}" data-url="{{ route('shop-details.show', ['id' => $produk->id]) }}">
                        <ul class="product__item__pic__hover">
                            <li><a href="#" onclick="addToWishlist(event, '{{ $produk->id }}')"><i class="fa fa-heart"></i></a></li>
                            <li><a href="#" onclick="addToKeranjang(event, '{{ $produk->id }}')"><i class="fa fa-shopping-cart"></i></a></li>
                        </ul>
                    </div>
                    <div class="product__item__text">
                        <h6><a href="{{ route('shop-details.show', ['id' => $produk->id]) }}" class="product__item">{{ $produk->nama }}</a></h6>
                        <h5>Rp {{ number_format($produk->harga_retail, 0, ',', '.') }}</h5>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <div class="container">
    <div class="section-title">
        <h2>Produk Kami</h2>
        <a href="{{ route('shop-grid') }}" class="float-right" style="color: orange;"><i class="fa fa-arrow-right"></i> Lihat Semua</a>
                <div class="clearfix"></div>
    </div>
    <div class="row">
        @foreach ($produkKami as $produk)
        <div class="col-lg-3 col-md-4 col-sm-6 mix">
            <div class="product__item">
                <div class="product__item__pic set-bg" data-setbg="{{ asset('storage/images/' . $produk->foto) }}" data-url="{{ route('shop-details.show', ['id' => $produk->id]) }}">
                    <ul class="product__item__pic__hover">
                        <li><a href="#" onclick="addToWishlist(event, '{{ $produk->id }}')"><i class="fa fa-heart"></i></a></li>
                        <li><a href="#" onclick="addToKeranjang(event, '{{ $produk->id }}')"><i class="fa fa-shopping-cart"></i></a></li>
                    </ul>
                </div>
                <div class="product__item__text">
                    <h6><a href="{{ route('shop-details.show', ['id' => $produk->id]) }}" class="product__item">{{ $produk->nama }}</a></h6>
                    <h5>Rp {{ number_format($produk->harga_retail, 0, ',', '.') }}</h5>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script>
            function addToWishlist(event, productId) {
                    event.stopPropagation();
                    @guest
                        window.location.href = "{{ route('login') }}";
                    @else
                    $.ajax({
                        url: '/add-to-wishlist/' + productId,
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
        
                function addToKeranjang(event, productId) {
                    event.stopPropagation();
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
        
                $(document).ready(function() {
                    $('.product__item__pic').on('click', function() {
                        var url = $(this).data('url');
                        window.location.href = url;
                    });
                });
        
        </script>
    </section>
    @include('layoutuser.footer') 
</body>
</html>