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
    <section class="about-us spad">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 text-center">
                    <div class="about__pic">
                        <img src="https://images.glints.com/unsafe/glints-dashboard.s3.amazonaws.com/company-logo/5e6a2fb0bbea356b56b3157f4ac93472.jpeg">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="about__text">
                        <div class="section-title">
                            <h2>About Us</h2>
                        </div>
                        <p>Berawal dari sebuah Depot Pak 'D' pada tahun 2008 dan berubah menjadi Ayam Bakar Pak 'D' kini telah berkembang menuju Industri Kuliner dengan jumlah cabang lebih dari 60 Cabang di Surabaya, Sidoarjo, Gresik, dan Malang. Ayam Bakar Pak 'D' sedang mengembangkan Bisnis barunya yaitu BELINDO.</p>
                        <p>Belindo ini adalah sejenis E-Commerce yang sedang dikembangkan oleh Ayam Bakar Pak 'D'. Bedanya, Belindo ini diprioritaskan untuk Re-seller. Dan juga yang berjualan pada Belindo ini hanya pihak Ayam Bakar Pak 'D'.</p>
                    </div>
                    <div class="section-title">
                        <h2>Visi Kami</h2>
                    </div>
                    <p>Mewujudkan platform e-commerce terdepan yang memberdayakan para reseller untuk mencapai kesuksesan melalui inovasi, dukungan tanpa batas, dan ekosistem bisnis yang solid.</p>
                    <div class="section-title">
                        <h2>Misi Kami</h2>
                    </div>
                    <p>Membakar semangat berjualan online dan menjadi peluncur para Reseller menuju puncak kesuksesan.</p>
                    <p>Kami bergelora untuk menciptakan ekosistem e-commerce yang ramah dan inovatif khusus para Reseller. Kami percaya bahwa semangat dan kegigihan Reseller adalah bahan bakar utama untuk memajukan bisnis bersama. Melalui platform yang simpel dan canggih, produk trendi yang melimpah, dan dukungan tanpa batas, kami ingin menjadi kawan seperjuangan yang handal, melontarkan para Reseller ke puncak kesuksesan e-commerce.</p>
                </div>
            </div>
        </div>
    </section>
    @include('layoutuser.footer') 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</body>
</html>
