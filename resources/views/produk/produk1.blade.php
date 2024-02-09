<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Product Detail</title>
<style>
body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
}

.container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 20px;
}

.header {
    background-color: #1c3f94;
    color: #fff;
    padding: 10px 0;
}

.header__logo {
    margin: 0;
    font-size: 24px;
}

.header__nav-list {
    list-style-type: none;
    padding: 0;
    margin: 0;
}

.header__nav-item {
    display: inline-block;
    margin-right: 20px;
}

.header__nav-link {
    color: #fff;
    text-decoration: none;
}

.main {
    padding: 20px 0;
}

.product {
    display: flex;
    align-items: center;
}

.product__image img {
    max-width: 300px;
    height: auto;
}

.product__info {
    margin-left: 50px;
}

.product__name {
    margin: 0;
    font-size: 24px;
}

.product__price {
    margin: 10px 0;
    font-size: 18px;
}

.product__button {
    padding: 10px 20px;
    background-color: #f80;
    color: #fff;
    border: none;
    cursor: pointer;
    font-size: 16px;
    margin-right: 10px;
}

.product__button--cart {
    background-color: #f80;
}

.product__button--buy {
    background-color: #3bb143;
}

.product__button:hover {
    background-color: #f60;
}

.product__description-title {
    font-size: 20px;
    margin-top: 20px;
}

.footer {
    background-color: #1c3f94;
    color: #fff;
    text-align: center;
    padding: 10px 0;
}

.footer__copyright {
    margin: 0;
}

</style>

</head>
<body>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Product Detail - Tokopedia Style</title>
<link rel="stylesheet" href="styles.css">
</head>
<body>

<header class="header">
    <div class="container">
        <h1 class="header__logo">Ayam Bakar Pak D</h1>
        <nav class="header__nav">
            <ul class="header__nav-list">
                <li class="header__nav-item"><a href="#" class="header__nav-link">Beranda</a></li>
                <li class="header__nav-item"><a href="#" class="header__nav-link">Produk</a></li>
                <li class="header__nav-item"><a href="#" class="header__nav-link">Kategori</a></li>
                <li class="header__nav-item"><a href="#" class="header__nav-link">Keranjang</a></li>
            </ul>
        </nav>
    </div>
</header>

<main class="main">
    <div class="container">
        <div class="product">
            <div class="product__image">
                <img src="img/produk/ayam.jpg" alt="Product Image">
            </div>
            <div class="product__info">
                <h1 class="product__name">Product Name</h1>
                <p class="product__price">Rp 100.000</p>
                <div class="product__description">
            <h2 class="product__description-title">Deskripsi Produk</h2>
            <p class="product__description-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla ultricies tortor in metus eleifend, ut molestie lorem pharetra. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Nam id arcu orci. Cras auctor euismod ex, in feugiat risus.</p>
            <button class="product__button">Tambah ke Keranjang</button>
                <button class="product__button product__button--buy">Beli</button>
        </div>
            </div>
        </div>
    </div>
</main>

<footer class="footer">
    <div class="container">
        <p class="footer__copyright">&copy; 2024 Tokopedia. All rights reserved.</p>
    </div>
</footer>

</body>
</html>
