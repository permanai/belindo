<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AlatKebersihanController;
use App\Http\Controllers\AlatKecantikanController;
use App\Http\Controllers\AlatTulisKantorController;
use App\Http\Controllers\BarangUnikController;
use App\Http\Controllers\ElektronikController;
use App\Http\Controllers\FashionController;
use App\Http\Controllers\IbuAnakController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\kategoriController;
use App\Http\Controllers\PerabotDapurController;
use App\Http\Controllers\PerabotRumahController;
use App\Http\Controllers\ProdukKesehatanController;
use App\Http\Controllers\TampilUserController;
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\shopdetailsController;
use App\Http\Controllers\KeranjangController;


Route::get('/', function () {
    return redirect()->route('index');
});

Route::middleware('auth')->group(function () {
    Route::get('/index', function () {
        return view('index'); 
    })->name('index');
});

Route::get('/login', function () {
    return view('auth.login');
})->name('login.index');


Route::get('/login', [AuthController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'authenticate'])->name('login-post')->middleware('guest');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

Route::get('/register', [AuthController::class, 'register'])->name('register')->middleware('guest');
Route::post('/register', [AuthController::class, 'store'])->name('register-post')->middleware('guest');

Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/produk', [ProdukController::class, 'index'])->name('produk.index');
    Route::get('/produk/create', [ProdukController::class, 'create'])->name('produk.create');
    Route::post('/produk/store', [ProdukController::class, 'store'])->name('produk.store');
    Route::get('/produk/{id}', [ProdukController::class, 'show'])->name('produk.show');
    Route::get('/produk/{id}/edit', [ProdukController::class, 'edit'])->name('produk.edit');
    Route::put('/produk/{id}/update', [ProdukController::class, 'update'])->name('produk.update');
    Route::delete('/produk/{id}/delete', [ProdukController::class, 'destroy'])->name('produk.destroy');
});
//kalo error di index coba ini dihidupkan tpi ini duplikat

// Route::get('/kategori', [kategoriController::class, 'index'])->name('kategori.index');
// Route::prefix('admin')->name('admin.')->group(function () {
//     Route::get('/kategori', [kategoriController::class, 'index'])->name('kategori.index');
//     Route::get('/kategori/create', [kategoriController::class, 'create'])->name('kategori.create');
//     Route::post('/kategori/store', [kategoriController::class, 'store'])->name('kategori.store');
//     Route::get('/kategori/{id}', [kategoriController::class, 'show'])->name('kategori.show');
//     Route::get('/kategori/{id}/edit', [kategoriController::class, 'edit'])->name('kategori.edit');
//     Route::put('/kategori/{id}/update', [kategoriController::class, 'update'])->name('kategori.update');
//     Route::delete('/kategori/{id}/delete', [kategoriController::class, 'destroy'])->name('kategori.destroy');
// });


Route::middleware('auth')->group(function () {
    Route::get('/produk', [ProdukController::class, 'index'])->name('produk.index');
});

Route::get('/kategori', [kategoriController::class, 'index'])->name('kategori.index');
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/kategori', [kategoriController::class, 'index'])->name('kategori.index');
    Route::get('/kategori/create', [kategoriController::class, 'create'])->name('kategori.create');
    Route::post('/kategori/store', [kategoriController::class, 'store'])->name('kategori.store');
    Route::get('/kategori/{id}', [kategoriController::class, 'show'])->name('kategori.show');
    Route::get('/kategori/{id}/edit', [kategoriController::class, 'edit'])->name('kategori.edit');
    Route::put('/kategori/{id}/update', [kategoriController::class, 'update'])->name('kategori.update');
    Route::delete('/kategori/{id}/delete', [kategoriController::class, 'destroy'])->name('kategori.destroy');
});


Route::prefix('admin/kategori')->name('admin.')->group(function () {
    Route::get('/kategori/alat_kebersihan', [AlatKebersihanController::class, 'index'])->name('kategori.alat_kebersihan.index');
    Route::get('/kategori/alat_kebersihan/create', [AlatKebersihanController::class, 'create'])->name('kategori.alat_kebersihan.create');
    Route::post('/kategori/alat_kebersihan/store', [AlatKebersihanController::class, 'store'])->name('kategori.alat_kebersihan.store');
    Route::get('/kategori/alat_kebersihan/{id}', [AlatKebersihanController::class, 'show'])->name('kategori.alat_kebersihan.show');
    Route::get('/kategori/alat_kebersihan/{id}/edit', [AlatKebersihanController::class, 'edit'])->name('kategori.alat_kebersihan.edit');
    Route::put('/kategori/alat_kebersihan/{id}/update', [AlatKebersihanController::class, 'update'])->name('kategori.alat_kebersihan.update');
    Route::delete('/kategori/alat_kebersihan/{id}/delete', [AlatKebersihanController::class, 'destroy'])->name('kategori.alat_kebersihan.destroy');
});
Route::prefix('admin/kategori')->name('admin.')->group(function () {
    Route::get('/kategori/alat_kecantikan', [AlatKecantikanController::class, 'index'])->name('kategori.alat_kecantikan.index');
    Route::get('/kategori/alat_kecantikan/create', [AlatKecantikanController::class, 'create'])->name('kategori.alat_kecantikan.create');
    Route::post('/kategori/alat_kecantikan/store', [AlatKecantikanController::class, 'store'])->name('kategori.alat_kecantikan.store');
    Route::get('/kategori/alat_kecantikan/{id}', [AlatKecantikanController::class, 'show'])->name('kategori.alat_kecantikan.show');
    Route::get('/kategori/alat_kecantikan/{id}/edit', [AlatKecantikanController::class, 'edit'])->name('kategori.alat_kecantikan.edit');
    Route::put('/kategori/alat_kecantikan/{id}/update', [AlatKecantikanController::class, 'update'])->name('kategori.alat_kecantikan.update');
    Route::delete('/kategori/alat_kecantikan/{id}/delete', [AlatKecantikanController::class, 'destroy'])->name('kategori.alat_kecantikan.destroy');
});
Route::prefix('admin/kategori')->name('admin.')->group(function () {
    Route::get('/kategori/alat_tulis_kantor', [AlatTulisKantorController::class, 'index'])->name('kategori.alat_tulis_kantor.index');
    Route::get('/kategori/alat_tulis_kantor/create', [AlatTulisKantorController::class, 'create'])->name('kategori.alat_tulis_kantor.create');
    Route::post('/kategori/alat_tulis_kantor/store', [AlatTulisKantorController::class, 'store'])->name('kategori.alat_tulis_kantor.store');
    Route::get('/kategori/alat_tulis_kantor/{id}', [AlatTulisKantorController::class, 'show'])->name('kategori.alat_tulis_kantor.show');
    Route::get('/kategori/alat_tulis_kantor/{id}/edit', [AlatTulisKantorController::class, 'edit'])->name('kategori.alat_tulis_kantor.edit');
    Route::put('/kategori/alat_tulis_kantor/{id}/update', [AlatTulisKantorController::class, 'update'])->name('kategori.alat_tulis_kantor.update');
    Route::delete('/kategori/alat_tulis_kantor/{id}/delete', [AlatTulisKantorController::class, 'destroy'])->name('kategori.alat_tulis_kantor.destroy');
});
Route::prefix('admin/kategori')->name('admin.')->group(function () {
    Route::get('/kategori/barang_unik', [BarangUnikController::class, 'index'])->name('kategori.barang_unik.index');
    Route::get('/kategori/barang_unik/create', [BarangUnikController::class, 'create'])->name('kategori.barang_unik.create');
    Route::post('/kategori/barang_unik/store', [BarangUnikController::class, 'store'])->name('kategori.barang_unik.store');
    Route::get('/kategori/barang_unik/{id}', [BarangUnikController::class, 'show'])->name('kategori.barang_unik.show');
    Route::get('/kategori/barang_unik/{id}/edit', [BarangUnikController::class, 'edit'])->name('kategori.barang_unik.edit');
    Route::put('/kategori/barang_unik/{id}/update', [BarangUnikController::class, 'update'])->name('kategori.barang_unik.update');
    Route::delete('/kategori/barang_unik/{id}/delete', [BarangUnikController::class, 'destroy'])->name('kategori.barang_unik.destroy');
});
Route::prefix('admin/kategori')->name('admin.')->group(function () {
    Route::get('/kategori/elektronik', [ElektronikController::class, 'index'])->name('kategori.elektronik.index');
    Route::get('/kategori/elektronik/create', [ElektronikController::class, 'create'])->name('kategori.elektronik.create');
    Route::post('/kategori/elektronik/store', [ElektronikController::class, 'store'])->name('kategori.elektronik.store');
    Route::get('/kategori/elektronik/{id}', [ElektronikController::class, 'show'])->name('kategori.elektronik.show');
    Route::get('/kategori/elektronik/{id}/edit', [ElektronikController::class, 'edit'])->name('kategori.elektronik.edit');
    Route::put('/kategori/elektronik/{id}/update', [ElektronikController::class, 'update'])->name('kategori.elektronik.update');
    Route::delete('/kategori/elektronik/{id}/delete', [ElektronikController::class, 'destroy'])->name('kategori.elektronik.destroy');
});
Route::prefix('admin/kategori')->name('admin.')->group(function () {
    Route::get('/kategori/fashion', [FashionController::class, 'index'])->name('kategori.fashion.index');
    Route::get('/kategori/fashion/create', [FashionController::class, 'create'])->name('kategori.fashion.create');
    Route::post('/kategori/fashion/store', [FashionController::class, 'store'])->name('kategori.fashion.store');
    Route::get('/kategori/fashion/{id}', [FashionController::class, 'show'])->name('kategori.fashion.show');
    Route::get('/kategori/fashion/{id}/edit', [FashionController::class, 'edit'])->name('kategori.fashion.edit');
    Route::put('/kategori/fashion/{id}/update', [FashionController::class, 'update'])->name('kategori.fashion.update');
    Route::delete('/kategori/fashion/{id}/delete', [FashionController::class, 'destroy'])->name('kategori.fashion.destroy');
});
Route::prefix('admin/kategori')->name('admin.')->group(function () {
    Route::get('/kategori/ibu_anak', [IbuAnakController::class, 'index'])->name('kategori.ibu_anak.index');
    Route::get('/kategori/ibu_anak/create', [IbuAnakController::class, 'create'])->name('kategori.ibu_anak.create');
    Route::post('/kategori/ibu_anak/store', [IbuAnakController::class, 'store'])->name('kategori.ibu_anak.store');
    Route::get('/kategori/ibu_anak/{id}', [IbuAnakController::class, 'show'])->name('kategori.ibu_anak.show');
    Route::get('/kategori/ibu_anak/{id}/edit', [IbuAnakController::class, 'edit'])->name('kategori.ibu_anak.edit');
    Route::put('/kategori/ibu_anak/{id}/update', [IbuAnakController::class, 'update'])->name('kategori.ibu_anak.update');
    Route::delete('/kategori/ibu_anak/{id}/delete', [IbuAnakController::class, 'destroy'])->name('kategori.ibu_anak.destroy');
});
Route::prefix('admin/kategori')->name('admin.')->group(function () {
    Route::get('/kategori/perabot_dapur', [PerabotDapurController::class, 'index'])->name('kategori.perabot_dapur.index');
    Route::get('/kategori/perabot_dapur/create', [PerabotDapurController::class, 'create'])->name('kategori.perabot_dapur.create');
    Route::post('/kategori/perabot_dapur/store', [PerabotDapurController::class, 'store'])->name('kategori.perabot_dapur.store');
    Route::get('/kategori/perabot_dapur/{id}', [PerabotDapurController::class, 'show'])->name('kategori.perabot_dapur.show');
    Route::get('/kategori/perabot_dapur/{id}/edit', [PerabotDapurController::class, 'edit'])->name('kategori.perabot_dapur.edit');
    Route::put('/kategori/perabot_dapur/{id}/update', [PerabotDapurController::class, 'update'])->name('kategori.perabot_dapur.update');
    Route::delete('/kategori/perabot_dapur/{id}/delete', [PerabotDapurController::class, 'destroy'])->name('kategori.perabot_dapur.destroy');
});
Route::prefix('admin/kategori')->name('admin.')->group(function () {
    Route::get('/kategori/perabot_rumah', [PerabotRumahController::class, 'index'])->name('kategori.perabot_rumah.index');
    Route::get('/kategori/perabot_rumah/create', [PerabotRumahController::class, 'create'])->name('kategori.perabot_rumah.create');
    Route::post('/kategori/perabot_rumah/store', [PerabotRumahController::class, 'store'])->name('kategori.perabot_rumah.store');
    Route::get('/kategori/perabot_rumah/{id}', [PerabotRumahController::class, 'show'])->name('kategori.perabot_rumah.show');
    Route::get('/kategori/perabot_rumah/{id}/edit', [PerabotRumahController::class, 'edit'])->name('kategori.perabot_rumah.edit');
    Route::put('/kategori/perabot_rumah/{id}/update', [PerabotRumahController::class, 'update'])->name('kategori.perabot_rumah.update');
    Route::delete('/kategori/perabot_rumah/{id}/delete', [PerabotRumahController::class, 'destroy'])->name('kategori.perabot_rumah.destroy');
});
Route::prefix('admin/kategori')->name('admin.')->group(function () {
    Route::get('/kategori/produk_kesehatan', [ProdukKesehatanController::class, 'index'])->name('kategori.produk_kesehatan.index');
    Route::get('/kategori/produk_kesehatan/create', [ProdukKesehatanController::class, 'create'])->name('kategori.produk_kesehatan.create');
    Route::post('/kategori/produk_kesehatan/store', [ProdukKesehatanController::class, 'store'])->name('kategori.produk_kesehatan.store');
    Route::get('/kategori/produk_kesehatan/{id}', [ProdukKesehatanController::class, 'show'])->name('kategori.produk_kesehatan.show');
    Route::get('/kategori/produk_kesehatan/{id}/edit', [ProdukKesehatanController::class, 'edit'])->name('kategori.produk_kesehatan.edit');
    Route::put('/kategori/produk_kesehatan/{id}/update', [ProdukKesehatanController::class, 'update'])->name('kategori.produk_kesehatan.update');
    Route::delete('/kategori/produk_kesehatan/{id}/delete', [ProdukKesehatanController::class, 'destroy'])->name('kategori.produk_kesehatan.destroy');
});

Route::get('/customers', [TampilUserController::class, 'index'])->name('admin.user');

Route::get('/perabot-dapur', [PerabotDapurController::class, 'tampiluser'])->name('perabot-dapur');
Route::get('/alat-kebersihan', [AlatKebersihanController::class, 'tampiluser'])->name('alat-kebersihan');
Route::get('/produk-kesehatan', [ProdukKesehatanController::class, 'tampiluser'])->name('produk-kesehatan');
Route::get('/alat-kecantikan', [AlatKecantikanController::class, 'tampiluser'])->name('alat-kecantikan');
Route::get('/elektronik', [ElektronikController::class, 'tampiluser'])->name('elektronik');
Route::get('/perabot-rumah', [PerabotRumahController::class, 'tampiluser'])->name('perabot-rumah');
Route::get('/ibu-dan-anak', [IbuAnakController::class, 'tampiluser'])->name('ibu-dan-anak');
Route::get('/fashion', [FashionController::class, 'tampiluser'])->name('fashion');
Route::get('/barang-unik', [BarangUnikController::class, 'tampiluser'])->name('barang-unik');
Route::get('/alat-tulis-kantor', [AlatTulisKantorController::class, 'tampiluser'])->name('alat-tulis-kantor');
Route::get('/shop-grid', [ProdukController::class, 'tampiluser'])->name('shop-grid');
Route::get('/add-to-wishlist/{id}', [WishlistController::class, 'addToWishlist'])->name('wishlist.add');

// Route::get('/wishlist', [WishlistController::class, 'index'])->name('wishlist');

Route::delete('/remove/{id}', [WishlistController::class, 'removeFromWishlist'])->name('wishlist.remove');
Route::get('/shop-details', [ShopDetailsController::class, 'show'])->name('shop-details');
Route::get('/shop-details', [ShopDetailsController::class, 'show'])->name('shop-details.show');

// Route::get('/shop-details/{id}', [ShopDetailsController::class, 'show'])->name('shop-details');
// kode dibawah ini bisa dihapus jika wishlist / keranjang bisa/tidak menampilkan detail produk
// Route::get('/shop-details/{id}', [ShopDetailsController::class, 'shows'])->name('shop-details.show');

// Route::get('/shop-details/{id}', 'ProductController@show')->name('shop-details.show');

Route::post('/index', [ProdukController::class, 'filter'])->name('index');
Route::get('/admin/index', [AuthController::class, 'diagram'])->name('admin.index');

Route::get('/add-to-keranjang/{id}', [KeranjangController::class, 'addTokeranjang'])->name('keranjang.add');

// Route::get('/keranjang', [KeranjangController::class, 'index'])->name('keranjang');

Route::delete('/keranjang/remove/{id}', [KeranjangController::class, 'removeFromKeranjang'])->name('keranjang.remove');

Route::get('/search', [ProdukController::class, 'search'])->name('search');

Route::get('/index', [ProdukController::class, 'tampilProduk'])->name('index');
Route::get('/produkterbaru', [ProdukController::class, 'produkterbaru'])->name('produkterbaru');

Route::get('/add-to-keranjangs/{id}', [KeranjangController::class, 'addToKeranjangdariwishlist'])->name('add-to-keranjangs');

Route::get('/shop-detailss', [ShopDetailsController::class, 'showWishlist'])->name('shop-details.showWishlist');
Route::get('/shop-detailsss', [ShopDetailsController::class, 'showKeranjang'])->name('shop-details.showKeranjang');
Route::get('/about-us', function () {return view('about-us');})->name('about-us');
Route::get('/contact-us', function () {return view('contact-us');})->name('contact-us');


Route::get('/wishlist/count', [WishlistController::class, 'count']);
Route::get('/keranjang/count', [KeranjangController::class, 'count']);
Route::get('/wishlist', [WishlistController::class, 'index'])->name('wishlist');
Route::get('/keranjang', [KeranjangController::class, 'index'])->name('keranjang');

