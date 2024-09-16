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
    <style>
        .hero__categories__all {
            background-color: orange; 
        }
        .hero__search__form button.site-btn {
            background-color: orange; 
            color: #fff; 
        }
        .hero__search__phone {
    margin-top: -50px;
    margin-right: 50px;
}
.product__item__pic {
            cursor: pointer;
        }
    </style>
</head>
<body>
    <!-- Page Preloder -->
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
    <section class="product spad" style="margin-top: -110px;"> 
        <div class="container" style="padding-top: 20px;"> 
            <div class="row">
                <div class="col-lg-9 offset-lg-3">
                    <div class="row">
                        @foreach ($alat_tulis_kantors as $alat_tulis_kantor)
                        <div class="col-lg-4 col-md-4 col-sm-6">
                            <div class="product__item">
                                <div class="product__item__pic set-bg" data-setbg="{{ asset('storage/images/' . $alat_tulis_kantor->foto) }}" data-url="{{ route('shop-details.show', ['id' => $alat_tulis_kantor->id]) }}">
                                    <ul class="product__item__pic__hover">
                                        <li><a href="#" onclick="addToWishlist(event, '{{ $alat_tulis_kantor->id }}')"><i class="fa fa-heart"></i></a></li>
                                        <li><a href="#" onclick="addToKeranjang(event, '{{ $alat_tulis_kantor->id }}')"><i class="fa fa-shopping-cart"></i></a></li>
                                    </ul>
                                </div>
                                <div class="product__item__text">
                                    <h6><a href="{{ route('shop-details.show', ['id' => $alat_tulis_kantor->id]) }}" class="product__item">{{ $alat_tulis_kantor->nama }}</a></h6>
                                    <h5>Rp {{ number_format($alat_tulis_kantor->harga_retail, 0, ',', '.') }}</h5>
                                </div>
                            </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    @include('layoutuser.footer') 
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
    
</body>
</html>
