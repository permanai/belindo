<?php

namespace App\Http\Controllers;
use App\Models\Produk;
use App\Models\Kategori;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;

class AlatKecantikanController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $kategori_id = $request->kategori_id;
    
            $alat_kecantikans = Produk::with('kategori')
                ->whereHas('kategori', function($query) {
                    $query->where('kategori', 'alat kecantikan');
                })
                ->when($kategori_id, function($query) use ($kategori_id) {
                    $query->where('kategori_id', $kategori_id);
                })
                ->get();
    
            return response()->json($alat_kecantikans);
        }
        $alat_kecantikans = Produk::whereHas('kategori', function($query) {
                $query->where('kategori', 'alat kecantikan');
            })
            ->get();
        $kategoris = Kategori::where('kategori', 'alat kecantikan')->get();
        return view('admin.kategori.alat_kecantikan.index', compact('alat_kecantikans', 'kategoris'));
    }
    public function create()
{
    $kategoris = Kategori::where('kategori', 'alat kecantikan')->get();
    return view('admin.kategori.alat_kecantikan.create', compact('kategoris'));
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
    return redirect()->route('admin.kategori.alat_kecantikan.index')->with('success', 'Alat Kecantikan berhasil ditambahkan.');
}

public function show($id)
{
    $alat_kecantikan = Produk::findOrFail($id);
    return view('admin.kategori.alat_kecantikan.show', compact('alat_kecantikan'));
}
public function edit($id)
{
    $alat_kecantikan = Produk::findOrFail($id);
    $kategoris = Kategori::where('kategori', 'alat kecantikan')->get();
    return view('admin.kategori.alat_kecantikan.update', compact('alat_kecantikan', 'kategoris'));
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

    $alat_kecantikan = Produk::findOrFail($id);

    if ($request->hasFile('foto')) {
        $file = $request->file('foto');
        $fileName = time() . '_' . $file->getClientOriginalName();
        $filePath = $file->storeAs('images', $fileName, 'public');
        $alat_kecantikan->foto = $fileName;
    }

    $alat_kecantikan->id_produk = $request->id_produk;
    $alat_kecantikan->nama = $request->nama;
    $alat_kecantikan->kategori_id = $request->kategori_id;
    $alat_kecantikan->harga_retail = $harga_retail;
    $alat_kecantikan->harga_reseller = $harga_reseller;
    $alat_kecantikan->jumlah = $request->jumlah;
    $alat_kecantikan->tglbeli = $request->tglbeli;
    $alat_kecantikan->deskripsi = $request->deskripsi;
    $alat_kecantikan->berat = $beratGram;
    $alat_kecantikan->save();

    return redirect()->route('admin.kategori.alat_kecantikan.index')->with('success', 'Alat Kecantikan berhasil diperbarui.');
}
public function destroy($id)
{
    $alat_kecantikan = Produk::findOrFail($id);
    $alat_kecantikan->delete();

    return redirect()->route('admin.kategori.alat_kecantikan.index')->with('success', 'Alat kecantikan berhasil dihapus.');
}

public function tampiluser(Request $request)
{
    if ($request->ajax()) {
        $kategori_id = $request->kategori_id;

        $alat_kecantikans = Produk::with('kategori')
            ->whereHas('kategori', function($query) {
                $query->where('kategori', 'alat kecantikan');
            })
            ->when($kategori_id, function($query) use ($kategori_id) {
                $query->where('kategori_id', $kategori_id);
            })
            ->get();

        return response()->json($alat_kecantikans);
    }

    $alat_kecantikans = Produk::whereHas('kategori', function($query) {
            $query->where('kategori', 'alat kecantikan');
        })
        ->get();
    $kategoris = Kategori::where('kategori', 'alat_kecantikan')->get();
    return view('alat-kecantikan', compact('alat_kecantikans', 'kategoris'));
}

}
