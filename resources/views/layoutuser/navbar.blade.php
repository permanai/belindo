<style>
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
        box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.2);
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
    }

    .show {
        display: block !important;
    }

    .header__cart {
        float: left;
    }

    .header__top__right__user {
        float: right;
        margin-left: 20px;
    }

    .dropdown .dropbtn img {
        border-radius: 50%;
    }

    .dropdown .dropbtn {
        border-radius: 50%;
        width: 40px;
        height: 40px;
        padding: 0;
        background-color: transparent;
        border: none;
        cursor: pointer;
    }

    .header__menu {
        text-align: center;
        /* Menengahkan item-menu */
    }
</style>

<nav class="humberger__menu__nav mobile-menu">
    <ul>
        <li class="active"><a href="./index">Home</a></li>
        <li><a href="./shop-grid">Shop</a></li>
        {{-- <li><a href="#">Pages</a>
            <ul class="header__menu__dropdown">
                <li><a href="./shop-details">Shop Details</a></li>
                <li><a href="./shoping-cart">Shoping Cart</a></li>
                <li><a href="./checkout">Check Out</a></li>
                <li><a href="./blog-details">Blog Details</a></li>
            </ul>
        </li>
        <li><a href="./blog">Blog</a></li> --}}
        <li><a href="./contact">Contact</a></li>
    </ul>
</nav>
<div id="mobile-menu-wrap"></div>
<div class="header__top__right__social">
    <a href="#"><i class="fa fa-facebook"></i></a>
    <a href="#"><i class="fa fa-twitter"></i></a>
    <a href="#"><i class="fa fa-linkedin"></i></a>
    <a href="#"><i class="fa fa-pinterest-p"></i></a>
</div>
<div class="humberger__menu__contact">
    <ul>
        <li><i class="fa fa-envelope"></i> hello@colorlib.com</li>
        <li>Free Shipping for all Order of $99</li>
    </ul>
</div>
</div>

<header class="header">
    <div class="header__top">
        <div class="container">
            <div class="row">


            </div>
        </div>
    </div>
    </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="header__logo">
                    <a href="/index"><img src="img/logo belindo.png" alt=""></a>
                </div>
            </div>
            <div class="col-lg-6">
                <nav class="header__menu">
                    <ul>
                        <li class="{{ Request::is('index') ? 'active' : '' }}"><a href="./index">Home</a></li>
                        <li class="{{ Request::is('shop-grid') ? 'active' : '' }}"><a href="./shop-grid">Shop</a></li>
                        {{-- <li>
                        <a href="#">Pages</a>
                        <ul class="header__menu__dropdown">
                            <li class="{{ Request::is('shop-details') ? 'active' : '' }}"><a href="./shop-details">Shop Details</a></li>
                            <li class="{{ Request::is('shoping-cart') ? 'active' : '' }}"><a href="./shoping-cart">Shoping Cart</a></li>
                            <li class="{{ Request::is('checkout') ? 'active' : '' }}"><a href="./checkout">Check Out</a></li>
                            <li class="{{ Request::is('blog-details') ? 'active' : '' }}"><a href="./blog-details">Blog Details</a></li>
                        </ul>
                    </li> --}}
                        {{-- <li class="{{ Request::is('blog') ? 'active' : '' }}"><a href="./blog">Blog</a></li> --}}
                        <li class="{{ Request::is('contact-us') ? 'active' : '' }}"><a href="./contact-us">Contact</a>
                        </li>
                    </ul>
                </nav>

            </div>
            <div class="col-lg-3">
                <div class="header__cart" style="float: left;margin-right: 20px;">
                    <ul>
                        <li><a href="{{ route('wishlist') }}"><i class="fa fa-heart"></i> <span
                                    id="wishlistCount">0</span></a></li>
                        <li><a href="{{ route('keranjang') }}"><i class="fa fa-shopping-bag"></i> <span
                                    id="keranjangCount">0</span></a></li>
                    </ul>
                    <div class="header__cart__price">item: <span>Rp150.00</span></div>
                </div>



                <div class="header__top__right__user" style="float: right; margin-top: 20px;">
                    @guest
                        <a href="{{ route('login') }}" style="color: red; font-size: 23px;">Login</a>
                    @else
                        <?php $userName = explode(' ', Auth::user()->name)[0]; ?>
                        <div class="dropdown" id="profileDropdown">
                            <button class="dropbtn" onclick="toggleDropdown(event)">
                                <img src="{{ asset('img/user belindo.png') }}" alt="User Image"
                                    style="width: 40px; height: 40px;">
                            </button>
                            <div class="dropdown-content" id="dropdownContent">
                                <a href="#">{{ Auth::user()->name }}</a>
                                {{-- <a href="#">Profile</a>
                            <a href="#">Settings</a> --}}
                                <a href="{{ route('logout') }}"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                            </div>
                        </div>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    @endguest
                </div>

                <script>
                    function toggleDropdown(event) {
                        event.stopPropagation();
                        var dropdownContent = document.getElementById("dropdownContent");
                        dropdownContent.classList.toggle("show");
                    }
                    window.onclick = function(event) {
                        if (!event.target.matches('.dropbtn')) {
                            var dropdowns = document.getElementsByClassName("dropdown-content");
                            var i;
                            for (i = 0; i < dropdowns.length; i++) {
                                var openDropdown = dropdowns[i];
                                if (openDropdown.classList.contains('show')) {
                                    openDropdown.classList.remove('show');
                                }
                            }
                        }
                    }
                    document.addEventListener("DOMContentLoaded", function() {
                        // Fetch Wishlist Count
                        fetch('/wishlist/count')
                            .then(response => response.json())
                            .then(data => {
                                document.getElementById('wishlistCount').innerText = data.count;
                            });

                        // Fetch Keranjang Count
                        fetch('/keranjang/count')
                            .then(response => response.json())
                            .then(data => {
                                document.getElementById('keranjangCount').innerText = data.count;
                            });
                    });
                </script>
