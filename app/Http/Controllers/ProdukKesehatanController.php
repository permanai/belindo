<?php

namespace App\Http\Controllers;
use App\Models\Produk;
use App\Models\Kategori;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;

class ProdukKesehatanController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $kategori_id = $request->kategori_id;
    
            $produk_kesehatans = Produk::with('kategori')
                ->whereHas('kategori', function($query) {
                    $query->where('kategori', 'produk kesehatan');
                })
                ->when($kategori_id, function($query) use ($kategori_id) {
                    $query->where('kategori_id', $kategori_id);
                })
                ->get();
    
            return response()->json($produk_kesehatans);
        }
    
        // Jika bukan request ajax, maka tampilkan halaman index dengan data alat_kebersihan dan kategorinya
        $produk_kesehatans = Produk::whereHas('kategori', function($query) {
                $query->where('kategori', 'produk kesehatan');
            })
            ->get();
        $kategoris = Kategori::where('kategori', 'produk_kesehatan')->get();
        return view('admin.kategori.produk_kesehatan.index', compact('produk_kesehatans', 'kategoris'));
    }
    public function create()
    {
        $kategoris = Kategori::where('kategori', 'produk kesehatan')->get();
        return view('admin.kategori.produk_kesehatan.create', compact('kategoris'));
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
    return redirect()->route('admin.kategori.produk_kesehatan.index')->with('success', 'produk kesehatan berhasil ditambahkan.');
}
    public function show($id)
{
    $produk_kesehatan = Produk::findOrFail($id);
    return view('admin.kategori.produk_kesehatan.show', compact('produk_kesehatan'));
}
public function edit($id)
{
    $produk_kesehatan = Produk::findOrFail($id);
    $kategoris = Kategori::where('kategori', 'produk kesehatan')->get();
    return view('admin.kategori.produk_kesehatan.update', compact('produk_kesehatan', 'kategoris'));
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

    $produk_kesehatan = Produk::findOrFail($id);

    if ($request->hasFile('foto')) {
        $file = $request->file('foto');
        $fileName = time() . '_' . $file->getClientOriginalName();
        $filePath = $file->storeAs('images', $fileName, 'public');
        $produk_kesehatan->foto = $fileName;
    }

    $produk_kesehatan->id_produk = $request->id_produk;
    $produk_kesehatan->nama = $request->nama;
    $produk_kesehatan->kategori_id = $request->kategori_id;
    $produk_kesehatan->harga_retail = $harga_retail;
    $produk_kesehatan->harga_reseller = $harga_reseller;
    $produk_kesehatan->jumlah = $request->jumlah;
    $produk_kesehatan->tglbeli = $request->tglbeli;
    $produk_kesehatan->deskripsi = $request->deskripsi;
    $produk_kesehatan->berat = $beratGram;
    $produk_kesehatan->save();

    return redirect()->route('admin.kategori.produk_kesehatan.index')->with('success', 'produk kesehatan berhasil diperbarui.');
}
public function destroy($id)
{
    $produk_kesehatan = Produk::findOrFail($id);
    $produk_kesehatan->delete();

    return redirect()->route('admin.kategori.produk_kesehatan.index')->with('success', 'produk kesehatan berhasil dihapus.');
}

public function tampiluser(Request $request)
{
    if ($request->ajax()) {
        $kategori_id = $request->kategori_id;

        $produk_kesehatans = Produk::with('kategori')
            ->whereHas('kategori', function($query) {
                $query->where('kategori', 'produk kesehatan');
            })
            ->when($kategori_id, function($query) use ($kategori_id) {
                $query->where('kategori_id', $kategori_id);
            })
            ->get();

        return response()->json($produk_kesehatans);
    }

    // Jika bukan request ajax, maka tampilkan halaman index dengan data alat_kebersihan dan kategorinya
    $produk_kesehatans = Produk::whereHas('kategori', function($query) {
            $query->where('kategori', 'produk kesehatan');
        })
        ->get();
    $kategoris = Kategori::where('kategori', 'produk_kesehatan')->get();
    return view('produk-kesehatan', compact('produk_kesehatans', 'kategoris'));
}

}
