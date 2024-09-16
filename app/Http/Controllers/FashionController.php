<?php

namespace App\Http\Controllers;
use App\Models\Produk;
use App\Models\Kategori;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;

class FashionController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $kategori_id = $request->kategori_id;
    
            $fashions = Produk::with('kategori')
                ->whereHas('kategori', function($query) {
                    $query->where('kategori', 'fashion');
                })
                ->when($kategori_id, function($query) use ($kategori_id) {
                    $query->where('kategori_id', $kategori_id);
                })
                ->get();
    
            return response()->json($fashions);
        }
    
        // Jika bukan request ajax, maka tampilkan halaman index dengan data alat_kebersihan dan kategorinya
        $fashions = Produk::whereHas('kategori', function($query) {
                $query->where('kategori', 'fashion');
            })
            ->get();
        $kategoris = Kategori::where('kategori', 'fashion')->get();
        return view('admin.kategori.fashion.index', compact('fashions', 'kategoris'));
    }
    public function create()
    {
        $kategoris = Kategori::where('kategori', 'fashion')->get();
        return view('admin.kategori.fashion.create', compact('kategoris'));
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
    return redirect()->route('admin.kategori.fashion.index')->with('success', 'fashion berhasil ditambahkan.');
}
public function show($id)
{
    $fashion = Produk::findOrFail($id);
    return view('admin.kategori.fashion.show', compact('fashion'));
}
public function edit($id)
{
    $fashion = Produk::findOrFail($id);
    $kategoris = Kategori::where('kategori', 'fashion')->get();
    return view('admin.kategori.fashion.update', compact('fashion', 'kategoris'));
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

    $fashion = Produk::findOrFail($id);

    if ($request->hasFile('foto')) {
        $file = $request->file('foto');
        $fileName = time() . '_' . $file->getClientOriginalName();
        $filePath = $file->storeAs('images', $fileName, 'public');
        $fashion->foto = $fileName;
    }

    $fashion->id_produk = $request->id_produk;
    $fashion->nama = $request->nama;
    $fashion->kategori_id = $request->kategori_id;
    $fashion->harga_retail = $harga_retail;
    $fashion->harga_reseller = $harga_reseller;
    $fashion->jumlah = $request->jumlah;
    $fashion->tglbeli = $request->tglbeli;
    $fashion->deskripsi = $request->deskripsi;
    $fashion->berat = $beratGram;
    $fashion->save();

    return redirect()->route('admin.kategori.fashion.index')->with('success', 'fashion berhasil diperbarui.');
}
public function destroy($id)
{
    $fashion = Produk::findOrFail($id);
    $fashion->delete();

    return redirect()->route('admin.kategori.fashion.index')->with('success', 'fashion berhasil dihapus.');
}

public function tampiluser(Request $request)
{
    if ($request->ajax()) {
        $kategori_id = $request->kategori_id;

        $fashions = Produk::with('kategori')
            ->whereHas('kategori', function($query) {
                $query->where('kategori', 'fashion');
            })
            ->when($kategori_id, function($query) use ($kategori_id) {
                $query->where('kategori_id', $kategori_id);
            })
            ->get();

        return response()->json($fashions);
    }

    // Jika bukan request ajax, maka tampilkan halaman index dengan data alat_kebersihan dan kategorinya
    $fashions = Produk::whereHas('kategori', function($query) {
            $query->where('kategori', 'fashion');
        })
        ->get();
    $kategoris = Kategori::where('kategori', 'fashion')->get();
    return view('fashion', compact('fashions', 'kategoris'));
}

}
