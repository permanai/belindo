<?php

namespace App\Http\Controllers;

use App\Models\Keranjang;
use App\Models\Produk;
use App\Models\Wishlist;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Session;
use Illuminate\Routing\Controller;

class KeranjangController extends Controller
{
    public function addToKeranjang($id)
    {
        if (Auth::check()) {
            $user = Auth::user();
            $existingKeranjang = Keranjang::where('id_user', $user->id)
                ->where('id_produk', $id)
                ->first();
                if ($existingKeranjang) {
                    return response()->json(['message' => 'Produk sudah ada dalam Keranjang.']);
                }
            $produk = Produk::find($id);
            if (!$produk) {
                return new JsonResponse(['message' => 'Produk tidak ditemukan.'], 404);
            }
            Keranjang::create([
                'id_user' => $user->id,
                'id_produk' => $produk->id,
                'nama' => $produk->nama,
                'foto' => $produk->foto,
                'harga_retail' => $produk->harga_retail,
                'harga_reseller' => $produk->harga_reseller,
            ]);
            return new JsonResponse(['message' => 'Produk berhasil ditambahkan ke Keranjang.']);
        } else {
            return new JsonResponse(['message' => 'Anda harus login terlebih dahulu untuk menambahkan produk ke Keranjang.'], 401);
        }
    }

    public function addToKeranjangdariwishlist($id)
    {
        if (Auth::check()) {
            $user = Auth::user();
            $wishlist = Wishlist::find($id);
            if (!$wishlist) {
                return new JsonResponse(['message' => 'Produk tidak ditemukan dalam Wishlist.'], 404);
            }
            $produk = Produk::find($wishlist->id_produk);
            if (!$produk) {
                return new JsonResponse(['message' => 'Produk tidak ditemukan.'], 404);
            }
            $existingKeranjang = Keranjang::where('id_user', $user->id)
                ->where('id_produk', $produk->id)
                ->first();
            if ($existingKeranjang) {
                return new JsonResponse(['message' => 'Produk sudah ada dalam Keranjang.'], 400);
            }
            $keranjang = new Keranjang();
            $keranjang->id_user = $user->id;
            $keranjang->id_produk = $produk->id;
            $keranjang->nama = $produk->nama;
            $keranjang->foto = $produk->foto;
            $keranjang->harga_retail = $produk->harga_retail;
            $keranjang->harga_reseller = $produk->harga_reseller;
            $keranjang->save();

            return new JsonResponse(['message' => 'Produk berhasil ditambahkan ke Keranjang.']);
        } else {
            return new JsonResponse(['message' => 'Anda harus login terlebih dahulu untuk menambahkan produk ke Keranjang.'], 401);
        }
    }

    // public function index()
    // {
    //     if (Auth::check()) {
    //         $Keranjang = Keranjang::where('id_user', Auth::id())->get();
    //         $KeranjangCount = $Keranjang->count();
    //         Session::put('KeranjangCount', $KeranjangCount); 
    //         return view('Keranjang', compact('Keranjang'));
    //     } else {
    //         return redirect('/login');
    //     }
    // }
    public function index()
    {
        if (Auth::check()) {
            $keranjang = Keranjang::where('id_user', Auth::id())->get();
            return view('keranjang', compact('keranjang'));
        } else {
            return redirect('/login');
        }
    }
    
    public function count()
    {
        if (Auth::check()) {
            $keranjangCount = Keranjang::where('id_user', Auth::id())->count();
            return response()->json(['count' => $keranjangCount]);
        }
        return response()->json(['count' => 0]);
    }
    
    

    public function removeFromKeranjang($id)
    {
        if (Auth::check()) {
            Keranjang::where('id', $id)
                ->where('id_user', Auth::id())
                ->delete();
            return response()->json(['message' => 'Item berhasil dihapus dari Keranjang.']);
        } else {
            return response()->json(['message' => 'Anda harus login terlebih dahulu.'], 401);
        }
    }
}
