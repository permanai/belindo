<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Produk;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\Keranjang;

class WishlistController extends Controller
{
    public function addToWishlist($id)
    {
        if (Auth::check()) {
            $user = Auth::user();
            $existingWishlist = Wishlist::where('id_user', $user->id)
                ->where('id_produk', $id)
                ->first();
            if ($existingWishlist) {
                return new JsonResponse(['message' => 'Produk sudah ada dalam wishlist.']);
            }
            $produk = Produk::find($id);
            if (!$produk) {
                return new JsonResponse(['message' => 'Produk tidak ditemukan.'], 404);
            }
            Wishlist::create([
                'id_user' => $user->id,
                'id_produk' => $produk->id,
                'nama' => $produk->nama,
                'foto' => $produk->foto,
                'harga_retail' => $produk->harga_retail,
                'harga_reseller' => $produk->harga_reseller,
            ]);
            return new JsonResponse(['message' => 'Produk berhasil ditambahkan ke wishlist.']);
        } else {
            return new JsonResponse(['message' => 'Anda harus login terlebih dahulu untuk menambahkan produk ke wishlist.'], 401);
        }
    }

    // public function index()
    // {
    //     if (Auth::check()) {
    //         $wishlist = Wishlist::where('id_user', Auth::id())->get();
    //         $wishlistCount = $wishlist->count();
    //         Session::put('wishlistCount', $wishlistCount); // Simpan jumlah wishlist ke sesi
    //         return view('wishlist', compact('wishlist'));
    //     } else {
    //         return redirect('/login');
    //     }
    // }

    public function index()
    {
        if (Auth::check()) {
            $wishlist = Wishlist::where('id_user', Auth::id())->get();
            return view('wishlist', compact('wishlist'));
        } else {
            return redirect('/login');
        }
    }

    public function count()
    {
        if (Auth::check()) {
            $wishlistCount = Wishlist::where('id_user', Auth::id())->count();
            return response()->json(['count' => $wishlistCount]);
        }
        return response()->json(['count' => 0]);
    }





    public function removeFromWishlist($id)
    {
        if (Auth::check()) {
            Wishlist::where('id', $id)
                ->where('id_user', Auth::id())
                ->delete();
            return response()->json(['message' => 'Item berhasil dihapus dari wishlist.']);
        } else {
            return response()->json(['message' => 'Anda harus login terlebih dahulu.'], 401);
        }
    }
}
