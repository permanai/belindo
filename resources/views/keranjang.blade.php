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
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" type="text/css">
    <style>
        .shoping__product,
        .shoping__cart__quantity,
        .shoping__cart__item__close {
            text-align: left;
        }

        .checklist {
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .checklist input[type="checkbox"] {
            margin-right: 5px;
        }

        .checklist label {
            margin-left: 5px;
        }

        .hero__categories__all {
            background-color: orange;
        }

        .hero__search__form button.site-btn {
            background-color: orange;
            color: #fff;
        }

        .shoping_cart_table th,
        .shoping_cart_table td {
            padding: 10px;
            vertical-align: middle;
        }

        .shoping__cart__table th,
        .shoping__cart__table td {
            padding: 10px;
            text-align: left;
        }

        .add-to-cart-btn {
            background-color: #4CAF50;
            border: none;
            color: white;
            padding: 8px 16px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            transition-duration: 0.4s;
            cursor: pointer;
            border-radius: 4px;
        }

        .add-to-cart-btn:hover {
            background-color: #45a049;
        }

        .add-to-cart-btn i {
            margin-right: 5px;
        }

        .delete-button {
            background-color: #f44336;
            border: none;
            color: white;
            padding: 8px 16px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 14px;
            margin: 4px 2px;
            transition-duration: 0.4s;
            cursor: pointer;
            border-radius: 4px;
        }

        .delete-button:hover {
            background-color: #dd3333;
        }

        .delete-button i {
            margin-right: 5px;
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
    <section class="breadcrumb-section set-bg" data-setbg="img/rumah.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Keranjang</h2>
                        <div class="breadcrumb__option">
                            <a href="/index">Home</a>
                            <span>Keranjang</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="shoping-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="shoping__cart__table">
                        <table>
                            <thead>
                                <tr>
                                    <th class="shoping__product">Produk</th>
                                    <th>Nama Produk</th>
                                    <th>Harga</th>
                                    <th>Jumlah</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $urutan = 1;
                                @endphp
                                @foreach ($keranjang as $produk)
                                    <tr>
                                        <td class="shoping__product">
                                            <input type="checkbox" id="product-{{ $produk->id }}">
                                            <img class="product__item__pic set-bg"
                                                src="{{ asset('storage/images/' . $produk->foto) }}"
                                                alt="{{ $produk->nama }}"
                                                data-setbg="{{ asset('storage/images/' . $produk->foto) }}"
                                                data-url="{{ route('shop-details.showKeranjang', ['id' => $produk->id]) }}"
                                                onclick="window.location.href='{{ route('shop-details.showKeranjang', ['id' => $produk->id]) }}'">
                                        </td>
                                        <td class="shoping__cart__item__title">{{ $produk->nama }}</td>
                                        <td class="shoping__cart__item__title">Rp
                                            {{ number_format($produk->harga_retail, 0, ',', '.') }}</td>
                                        <td class="shoping__cart__quantity">
                                            <div class="quantity">
                                                <div class="pro-qty">
                                                    <!-- Mengganti tipe input menjadi "text" -->
                                                    <input type="text" id="qty-{{ $produk->id }}" value="1"
                                                        min="1" step="1"
                                                        data-harga="{{ $produk->harga_retail }}">
                                                </div>
                                            </div>
                                        </td>
                                        <td class="shoping__cart__item__close">
                                            <span class="icon_close" data-id="{{ $produk->id }}"></span>
                                        </td>
                                    </tr>
                                    @php
                                        $urutan++;
                                    @endphp
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12"></div>
                <div class="col-lg-6">
                    <div class="shoping__continue">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="shoping__checkout">
                        <h5>Ringkasan Belanja</h5>
                        <ul>
                            @foreach ($keranjang as $produk)
                                <li>
                                    <span>{{ $produk->nama }} x{{ $produk->jumlah }}</span>
                                    <span class="price">Rp {{ number_format($produk->harga, 0, ',', '.') }}</span>
                                    <!-- Harga ditampilkan di sebelah kanan -->
                                </li>
                            @endforeach
                        </ul>
                        <div class="total-price"></div> <!-- Elemen untuk menampilkan total -->
                        <a href="#" class="primary-btn">Beli</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @include('layoutuser.footer')
    <script>
        function formatCurrency(amount) {
            return new Intl.NumberFormat('id-ID', {
                style: 'currency',
                currency: 'IDR',
                minimumFractionDigits: 0
            }).format(amount);
        }

        window.addEventListener('DOMContentLoaded', () => {
            updateCheckout();
        });

        function updateCheckout() {
            const checkoutList = document.querySelector('.shoping__checkout ul');
            const totalElement = document.querySelector('.shoping__checkout .total-price');
            checkoutList.innerHTML = '';
            let totalPrice = 0;
            document.querySelectorAll('.shoping__cart__table tbody input[type="checkbox"]').forEach(checkbox => {
                if (checkbox.checked) {
                    const productRow = checkbox.closest('tr');
                    const productName = productRow.querySelector('.shoping__product img').alt;
                    const productQuantity = parseInt(productRow.querySelector('.pro-qty input').value);
                    const productPrice = parseFloat(productRow.querySelector('.shoping__cart__quantity input')
                        .getAttribute('data-harga'));
                    const productTotalPrice = productQuantity * productPrice;
                    totalPrice += productTotalPrice;

                    const li = document.createElement('li');
                    li.textContent = `${productName} x${productQuantity} ${formatCurrency(productPrice)}`;
                    checkoutList.appendChild(li);
                }
            });

            totalElement.textContent = `Total: ${formatCurrency(totalPrice)}`;
        }

        document.querySelectorAll('.shoping__cart__table tbody input[type="checkbox"]').forEach(checkbox => {
            checkbox.addEventListener('change', updateCheckout);
        });

        document.querySelectorAll('.icon_close').forEach(icon => {
            icon.addEventListener('click', function() {
                const id = this.getAttribute('data-id');
                fetch(`/keranjang/remove/${id}`, {
                        method: 'DELETE',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        }
                    })
                    .then(response => response.json())
                    .then(data => {
                        window.location.reload();
                    })
                    .catch(error => console.error('Error:', error));
            });
        });

        $(document).ready(function() {
            $('.product__item__pic').on('click', function() {
                var url = $(this).data('url');
                window.location.href = url;
            });
        });
    </script>

</body>

</html>
