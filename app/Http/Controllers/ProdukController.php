<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Kategori;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    public function index(Request $request)
    {
        $produks = Produk::with('kategori')->get();
        $kategoris = Kategori::all();

        return view('admin.produk.index', compact('produks', 'kategoris'));
    }
    public function create()
    {
        $kategoris = Kategori::all();

        return view('admin.produk.create', compact('kategoris'));
    }

    public function store(Request $request)
{
    $request->validate([
        'nama' => 'required|string|max:255',
        'foto' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        'id_produk' => 'required|string|unique:produks,id_produk',
        'kategori_id' => 'required|exists:kategori,id',
        'harga_retail' => 'required|string',
        'harga_reseller' => 'required|string',
        'jumlah' => 'required|integer',
        'tglbeli' => 'required|date',
        'deskripsi' => 'required|string|max:3000',
        'berat' => 'required|numeric',
    ]);

    $harga_retail = str_replace('.', '', $request->harga_retail); 
    $harga_reseller = str_replace('.', '', $request->harga_reseller);

    $beratGram = $request->berat;
    $file = $request->file('foto');
    $fileName = time() . '_' . $file->getClientOriginalName();
    $filePath = $file->storeAs('images', $fileName, 'public');

    $produk = Produk::create([
        'id_produk' => $request->id_produk,
        'nama' => $request->nama,
        'foto' => $fileName,
        'kategori_id' => $request->kategori_id, 
        'harga_retail' => $harga_retail,
        'harga_reseller' => $harga_reseller,
        'jumlah' => $request->jumlah,
        'tglbeli' => $request->tglbeli,
        'deskripsi' => $request->deskripsi,
        'berat' => $beratGram,
    ]);
    return redirect()->route('admin.produk.index')->with('success', 'produk berhasil ditambahkan.');
}

    public function show($id)
    {
        $produk = Produk::findOrFail($id);
        return view('admin.produk.show', compact('produk'));
    }

    public function edit($id)
    {
        $produk = Produk::findOrFail($id);
        $kategoris = Kategori::all();
        return view('admin.produk.update', compact('produk', 'kategoris'));
    }

    public function update(Request $request, $id)
{
    $request->validate([
        'id_produk' => 'required|string|unique:produks,id_produk,' . $id,
        'nama' => 'required|string|max:255',
        'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        'kategori_id' => 'required|exists:kategori,id',
        'harga_retail' => 'required|string',
        'harga_reseller' => 'required|string',
        'jumlah' => 'required|integer',
        'tglbeli' => 'required|date',
        'deskripsi' => 'required|string|max:3000',
        'berat' => 'required|numeric',
    ]);

    $harga_retail = str_replace('.', '', $request->harga_retail); 
    $harga_reseller = str_replace('.', '', $request->harga_reseller);
    $beratGram = $request->berat;

    $produk = Produk::findOrFail($id);

    if ($request->hasFile('foto')) {
        $file = $request->file('foto');
        $fileName = time() . '_' . $file->getClientOriginalName();
        $filePath = $file->storeAs('images', $fileName, 'public');
        $produk->foto = $fileName;
    }

    $produk->id_produk = $request->id_produk;
    $produk->nama = $request->nama;
    $produk->kategori_id = $request->kategori_id;
    $produk->harga_retail = $harga_retail;
    $produk->harga_reseller = $harga_reseller;
    $produk->jumlah = $request->jumlah;
    $produk->tglbeli = $request->tglbeli;
    $produk->deskripsi = $request->deskripsi;
    $produk->berat = $beratGram;
    $produk->save();

    return redirect()->route('admin.produk.index')->with('success', 'produk berhasil diperbarui.');
}
    public function destroy($id)
    {
        $produk = Produk::findOrFail($id);
        $produk->delete();

        return redirect()->route('admin.produk.index')->with('success', 'Produk berhasil dihapus.');
    }
    public function tampiluser(Request $request)
    {
        $produks = Produk::with('kategori')->get();
        $kategoris = Kategori::all();

        return view('shop-grid', compact('produks', 'kategoris'));
    }
    public function search(Request $request)
    {
        $search = $request->input('search'); 

        $produks = Produk::with('kategori')
            ->where('nama', 'like', '%' . $search . '%')  
            ->orWhereHas('kategori', function($query) use ($search){
                $query->where('kategori', 'like', '%' . $search . '%');
            })
            ->get();
        $kategoris = Kategori::all();

        return view('shop-grid', compact('produks', 'kategoris'));
    }
    
public function tampilProduk()
{
    $produksTerbaru = Produk::with('kategori')->orderBy('created_at', 'desc')->take(4)->get();
    $produkKami = Produk::with('kategori')->take(4)->get();

    return view('index', compact('produksTerbaru', 'produkKami'));
}
public function produkterbaru(Request $request)
{
    $produks = Produk::with('kategori')
        ->orderBy('created_at', 'desc')
        ->get();

    return view('produkterbaru', compact('produks'));
}
// public function showrelated($id)
// {
//     $produk = Produk::find($id);
//     $relatedProducts = Produk::where('kategori_id', $produk->kategori_id)
//     ->where('id', '!=', $id)
//     ->get();
//     dd($relatedProducts);
                             
//     return view('shop-details', compact('produk', 'relatedProducts'));
// }




}
