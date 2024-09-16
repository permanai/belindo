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
        .hero__categories__all {
            background-color: orange; 
        }
        .hero__search__form button.site-btn {
            background-color: orange; 
            color: #fff; 
        }
        .shoping_cart_table th,.shoping_cart_table td {
        padding: 10px;
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
                    <input type="text" name="search" placeholder="Cari di Belindo" value="{{ request('search') }}">
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
<section class="breadcrumb-section set-bg" data-setbg="img/heading2.png">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>Wishlist</h2>
                    <div class="breadcrumb__option">
                        <a href="/index">Home</a>
                        <span>Wishlist</span>
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
                <div class="shoping_cart_table">
                    <table>
                        <thead>
                            <tr>
                                <th class="shoping__product">Produk</th>
                                <th>Nama Produk</th>
                                <th>Harga</th>
                                <th>Hapus</th>
                                <th>Masukkan Ke Keranjang</th>
                            </tr>
                            
                        </thead>
                      
                            <tbody>
                                @foreach ($wishlist as $produk)
                                <tr>
                                    <td class="shoping__product">
                                        <a href="{{ route('shop-details.showWishlist', ['id' => $produk->id]) }}">
                                            <img src="{{ asset('storage/images/' . $produk->foto) }}" alt="{{ $produk->nama }}">
                                        </a>
                                    </td>
                                    <td>
                                        <a href="{{ route('shop-details.showWishlist', ['id' => $produk->id]) }}" class="product__item" style="color: black; text-decoration: none;">{{ $produk->nama }}</a>
                                    </td>
                                    
                                    
                                    <td>Rp {{ number_format($produk->harga_retail, 0, ',', '.') }}</td>
                                    <td>
                                        <form id="deleteForm{{ $produk->id }}" action="{{ route('wishlist.remove', ['id' => $produk->id]) }}" method="POST">
                                            {{-- <form id="deleteForm{{ $produk->id }}" action="{{ route('remove', ['id' => $produk->id]) }}" method="POST"> --}}

                                            @csrf
                                            @method('DELETE')
                                            <button class="delete-button" onclick="deleteItem('{{ $produk->id }}')"><i class="fa fa-trash"></i> Hapus</button>
                                        </form>
                                    </td>
                                    <td>
                                        <button type="button" class="add-to-cart-btn" onclick="addToKeranjangdariwishlist('{{ $produk->id }}')">
                                            <i class="fa fa-shopping-cart"></i> Tambah ke Keranjang
                                        </button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script>
        function deleteItem(id) {
            fetch('{{ url("/remove") }}/' + id, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            })
            .then(response => {
                if (!response.ok) {
                    throw new Error('Terjadi kesalahan saat menghapus item dari wishlist.');
                }
                location.reload();
            })
            .catch(error => {
                console.error('Error:', error);
                alert(error.message); 
            });
        }

        function addToKeranjangdariwishlist(productId) {
            @guest
                window.location.href = "{{ route('login') }}";
            @else
                fetch('{{ url("/add-to-keranjangs") }}/' + productId, {
                    method: 'GET',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    }
                })
                .then(response => response.json())
                .then(data => {
                    if (data.message) {
                        alert(data.message);
                    } else {
                        alert('Terdapat kesalahan saat menambahkan produk ke keranjang.');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('Terdapat kesalahan saat menambahkan produk ke keranjang.');
                });
            @endguest
        }
    </script>
</section>
@include('layoutuser.footer') 
</body>
</html>
