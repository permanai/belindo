<?php

namespace App\Http\Controllers;
use App\Models\Produk;
use App\Models\Kategori;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;

class ElektronikController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $kategori_id = $request->kategori_id;
    
            $elektroniks = Produk::with('kategori')
                ->whereHas('kategori', function($query) {
                    $query->where('kategori', 'elektronik');
                })
                ->when($kategori_id, function($query) use ($kategori_id) {
                    $query->where('kategori_id', $kategori_id);
                })
                ->get();
    
            return response()->json($elektroniks);
        }
    
        // Jika bukan request ajax, maka tampilkan halaman index dengan data alat_kebersihan dan kategorinya
        $elektroniks = Produk::whereHas('kategori', function($query) {
                $query->where('kategori', 'elektronik');
            })
            ->get();
        $kategoris = Kategori::where('kategori', 'elektronik')->get();
        return view('admin.kategori.elektronik.index', compact('elektroniks', 'kategoris'));
    }
    public function create()
    {
        $kategoris = Kategori::where('kategori', 'elektronik')->get();
        return view('admin.kategori.elektronik.create', compact('kategoris'));
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
    return redirect()->route('admin.kategori.elektronik.index')->with('success', 'elektronik berhasil ditambahkan.');
}

public function show($id)
{
    $elektronik = Produk::findOrFail($id);
    return view('admin.kategori.elektronik.show', compact('elektronik'));
}
public function edit($id)
{
    $elektronik = Produk::findOrFail($id);
    $kategoris = Kategori::where('kategori', 'elektronik')->get();
    return view('admin.kategori.elektronik.update', compact('elektronik', 'kategoris'));
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

    $elektronik = Produk::findOrFail($id);

    if ($request->hasFile('foto')) {
        $file = $request->file('foto');
        $fileName = time() . '_' . $file->getClientOriginalName();
        $filePath = $file->storeAs('images', $fileName, 'public');
        $elektronik->foto = $fileName;
    }

    $elektronik->id_produk = $request->id_produk;
    $elektronik->nama = $request->nama;
    $elektronik->kategori_id = $request->kategori_id;
    $elektronik->harga_retail = $harga_retail;
    $elektronik->harga_reseller = $harga_reseller;
    $elektronik->jumlah = $request->jumlah;
    $elektronik->tglbeli = $request->tglbeli;
    $elektronik->deskripsi = $request->deskripsi;
    $elektronik->berat = $beratGram;
    $elektronik->save();

    return redirect()->route('admin.kategori.elektronik.index')->with('success', 'elektronik berhasil diperbarui.');
}
public function destroy($id)
{
    $elektronik = Produk::findOrFail($id);
    $elektronik->delete();

    return redirect()->route('admin.kategori.elektronik.index')->with('success', 'elektronik berhasil dihapus.');
}

public function tampiluser(Request $request)
{
    if ($request->ajax()) {
        $kategori_id = $request->kategori_id;

        $elektroniks = Produk::with('kategori')
            ->whereHas('kategori', function($query) {
                $query->where('kategori', 'elektronik');
            })
            ->when($kategori_id, function($query) use ($kategori_id) {
                $query->where('kategori_id', $kategori_id);
            })
            ->get();

        return response()->json($elektroniks);
    }

    // Jika bukan request ajax, maka tampilkan halaman index dengan data alat_kebersihan dan kategorinya
    $elektroniks = Produk::whereHas('kategori', function($query) {
            $query->where('kategori', 'elektronik');
        })
        ->get();
    $kategoris = Kategori::where('kategori', 'elektronik')->get();
    return view('elektronik', compact('elektroniks', 'kategoris'));
}

}
