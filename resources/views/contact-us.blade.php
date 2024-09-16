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
    <section class="breadcrumb-section set-bg" data-setbg="img/rumahh.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Contact Us</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="contact spad text-center">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-3 col-md-3 col-sm-6">
                <div class="contact__widget">
                    <span class="icon_phone"></span>
                    <h4>Phone</h4>
                    <p>+0888 1111 858</p>
                    <br>
                    <p>jam telepon</p>
                    <p>senin-jumat: 08.00 WIB - 17.00 WIB</p>
                </br>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6">
                <div class="contact__widget">
                    <span class="icon_mail_alt"></span>
                    <h4>Email</h4>
                    <p>admin@belindo.id</p>
                    <br>
                    <p>Kirim email dan kami akan segera menghubungi Anda kembali</p>
                    <br>
                    <p>jam email:</p>
                    <p>senin-jumat: 08.00 WIB - 17.00 WIB</p>
                </br>
                </div>
            </div>
        </div>
    </div>
</section>
    @include('layoutuser.footer') 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</body>
</html>
