<?php

namespace App\Http\Controllers;
use App\Models\Produk;
use App\Models\Kategori;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;

class BarangUnikController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $kategori_id = $request->kategori_id;
    
            $barang_uniks = Produk::with('kategori')
                ->whereHas('kategori', function($query) {
                    $query->where('kategori', 'barang unik');
                })
                ->when($kategori_id, function($query) use ($kategori_id) {
                    $query->where('kategori_id', $kategori_id);
                })
                ->get();
    
            return response()->json($barang_uniks);
        }
    
        // Jika bukan request ajax, maka tampilkan halaman index dengan data alat_kebersihan dan kategorinya
        $barang_uniks = Produk::whereHas('kategori', function($query) {
                $query->where('kategori', 'barang unik');
            })
            ->get();
        $kategoris = Kategori::where('kategori', 'barang unik')->get();
        return view('admin.kategori.barang_unik.index', compact('barang_uniks', 'kategoris'));
    }
    public function create()
    {
        $kategoris = Kategori::where('kategori', 'barang unik')->get();
        return view('admin.kategori.barang_unik.create', compact('kategoris'));
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
    return redirect()->route('admin.kategori.barang_unik.index')->with('success', 'Barang Unik berhasil ditambahkan.');
}

public function show($id)
{
    $barang_unik = Produk::findOrFail($id);
    return view('admin.kategori.barang_unik.show', compact('barang_unik'));
}
public function edit($id)
{
    $barang_unik = Produk::findOrFail($id);
    $kategoris = Kategori::where('kategori', 'barang unik')->get();
    return view('admin.kategori.barang_unik.update', compact('barang_unik', 'kategoris'));
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

    $barang_unik = Produk::findOrFail($id);

    if ($request->hasFile('foto')) {
        $file = $request->file('foto');
        $fileName = time() . '_' . $file->getClientOriginalName();
        $filePath = $file->storeAs('images', $fileName, 'public');
        $barang_unik->foto = $fileName;
    }

    $barang_unik->id_produk = $request->id_produk;
    $barang_unik->nama = $request->nama;
    $barang_unik->kategori_id = $request->kategori_id;
    $barang_unik->harga_retail = $harga_retail;
    $barang_unik->harga_reseller = $harga_reseller;
    $barang_unik->jumlah = $request->jumlah;
    $barang_unik->tglbeli = $request->tglbeli;
    $barang_unik->deskripsi = $request->deskripsi;
    $barang_unik->berat = $beratGram;
    $barang_unik->save();

    return redirect()->route('admin.kategori.barang_unik.index')->with('success', 'Barang Unik berhasil diperbarui.');
}
public function destroy($id)
{
    $barang_unik = Produk::findOrFail($id);
    $barang_unik->delete();

    return redirect()->route('admin.kategori.barang_unik.index')->with('success', 'barang unik berhasil dihapus.');
}

public function tampiluser(Request $request)
{
    if ($request->ajax()) {
        $kategori_id = $request->kategori_id;

        $barang_uniks = Produk::with('kategori')
            ->whereHas('kategori', function($query) {
                $query->where('kategori', 'barang unik');
            })
            ->when($kategori_id, function($query) use ($kategori_id) {
                $query->where('kategori_id', $kategori_id);
            })
            ->get();

        return response()->json($barang_uniks);
    }

    // Jika bukan request ajax, maka tampilkan halaman index dengan data alat_kebersihan dan kategorinya
    $barang_uniks = Produk::whereHas('kategori', function($query) {
            $query->where('kategori', 'barang unik');
        })
        ->get();
    $kategoris = Kategori::where('kategori', 'barang_unik')->get();
    return view('barang-unik', compact('barang_uniks', 'kategoris'));
}

}
