<?php

namespace App\Http\Controllers;
use App\Models\Produk;
use App\Models\Kategori;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;

class IbuAnakController extends Controller
{
    
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $kategori_id = $request->kategori_id;
    
            $ibu_anaks = Produk::with('kategori')
                ->whereHas('kategori', function($query) {
                    $query->where('kategori', 'ibu dan anak');
                })
                ->when($kategori_id, function($query) use ($kategori_id) {
                    $query->where('kategori_id', $kategori_id);
                })
                ->get();
    
            return response()->json($ibu_anaks);
        }
    
        // Jika bukan request ajax, maka tampilkan halaman index dengan data alat_kebersihan dan kategorinya
        $ibu_anaks = Produk::whereHas('kategori', function($query) {
                $query->where('kategori', 'ibu dan anak');
            })
            ->get();
        $kategoris = Kategori::where('kategori', 'ibu_anak')->get();
        return view('admin.kategori.ibu_anak.index', compact('ibu_anaks', 'kategoris'));
    }
    public function create()
    {
        $kategoris = Kategori::where('kategori', 'ibu dan anak')->get();
        return view('admin.kategori.ibu_anak.create', compact('kategoris'));
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
    return redirect()->route('admin.kategori.ibu_anak.index')->with('success', 'ibu dan anak berhasil ditambahkan.');
}
    public function show($id)
{
    $ibu_anak = Produk::findOrFail($id);
    return view('admin.kategori.ibu_anak.show', compact('ibu_anak'));
}
public function edit($id)
{
    $ibu_anak = Produk::findOrFail($id);
    $kategoris = Kategori::where('kategori', 'ibu dan anak')->get();
    return view('admin.kategori.ibu_anak.update', compact('ibu_anak', 'kategoris'));
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

    $ibu_anak = Produk::findOrFail($id);

    if ($request->hasFile('foto')) {
        $file = $request->file('foto');
        $fileName = time() . '_' . $file->getClientOriginalName();
        $filePath = $file->storeAs('images', $fileName, 'public');
        $ibu_anak->foto = $fileName;
    }

    $ibu_anak->id_produk = $request->id_produk;
    $ibu_anak->nama = $request->nama;
    $ibu_anak->kategori_id = $request->kategori_id;
    $ibu_anak->harga_retail = $harga_retail;
    $ibu_anak->harga_reseller = $harga_reseller;
    $ibu_anak->jumlah = $request->jumlah;
    $ibu_anak->tglbeli = $request->tglbeli;
    $ibu_anak->deskripsi = $request->deskripsi;
    $ibu_anak->berat = $beratGram;
    $ibu_anak->save();

    return redirect()->route('admin.kategori.ibu_anak.index')->with('success', 'ibu dan anak berhasil diperbarui.');
}
public function destroy($id)
{
    $ibu_anak = Produk::findOrFail($id);
    $ibu_anak->delete();

    return redirect()->route('admin.kategori.ibu_anak.index')->with('success', 'ibu_anak berhasil dihapus.');
}

public function tampiluser(Request $request)
{
    if ($request->ajax()) {
        $kategori_id = $request->kategori_id;

        $ibu_anaks = Produk::with('kategori')
            ->whereHas('kategori', function($query) {
                $query->where('kategori', 'ibu dan anak');
            })
            ->when($kategori_id, function($query) use ($kategori_id) {
                $query->where('kategori_id', $kategori_id);
            })
            ->get();

        return response()->json($ibu_anaks);
    }

    // Jika bukan request ajax, maka tampilkan halaman index dengan data alat_kebersihan dan kategorinya
    $ibu_anaks = Produk::whereHas('kategori', function($query) {
            $query->where('kategori', 'ibu dan anak');
        })
        ->get();
    $kategoris = Kategori::where('kategori', 'ibu_anak')->get();
    return view('ibu-dan-anak', compact('ibu_anaks', 'kategoris'));
}

}
