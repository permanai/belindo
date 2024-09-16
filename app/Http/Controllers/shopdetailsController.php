<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Keranjang;
use App\Models\Wishlist;
use App\Models\Kategori;
use Illuminate\Http\Request;

class shopdetailsController extends Controller
{
    


    public function show(Request $request)
    {
        $id = $request->id;
        $produk = Produk::findOrFail($id);
        
        return view('shop-details', compact('produk'));
    }
    public function showWishlist(Request $request)
{
    $id = $request->id;
    $wishlist = Wishlist::findOrFail($id);
    $produk = $wishlist->produk;
    return view('shop-details', compact('produk'));
}
    public function showKeranjang(Request $request)
{
    $id = $request->id;
    $keranjang = Keranjang::findOrFail($id);
    $produk = $keranjang->produk;
    return view('shop-details', compact('produk'));
}

}
