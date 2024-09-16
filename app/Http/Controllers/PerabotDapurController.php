<?php

namespace App\Http\Controllers;
use App\Models\Produk;
use App\Models\Kategori;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;

class PerabotDapurController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $kategori_id = $request->kategori_id;
    
            $perabot_dapurs = Produk::with('kategori')
                ->whereHas('kategori', function($query) {
                    $query->where('kategori', 'perabot dapur');
                })
                ->when($kategori_id, function($query) use ($kategori_id) {
                    $query->where('kategori_id', $kategori_id);
                })
                ->get();
    
            return response()->json($perabot_dapurs);
        }
    
        // Jika bukan request ajax, maka tampilkan halaman index dengan data alat_kebersihan dan kategorinya
        $perabot_dapurs = Produk::whereHas('kategori', function($query) {
                $query->where('kategori', 'perabot dapur');
            })
            ->get();
        $kategoris = Kategori::where('kategori', 'perabot_dapur')->get();
        return view('admin.kategori.perabot_dapur.index', compact('perabot_dapurs', 'kategoris'));
    }
    public function create()
    {
        $kategoris = Kategori::where('kategori', 'perabot dapur')->get();
        return view('admin.kategori.perabot_dapur.create', compact('kategoris'));
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
    return redirect()->route('admin.kategori.perabot_dapur.index')->with('success', 'perabot dapur berhasil ditambahkan.');
}
    public function show($id)
{
    $perabot_dapur = Produk::findOrFail($id);
    return view('admin.kategori.perabot_dapur.show', compact('perabot_dapur'));
}
public function edit($id)
{
    $perabot_dapur = Produk::findOrFail($id);
    $kategoris = Kategori::where('kategori', 'perabot dapur')->get();
    return view('admin.kategori.perabot_dapur.update', compact('perabot_dapur', 'kategoris'));
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

    $perabot_dapur = Produk::findOrFail($id);

    if ($request->hasFile('foto')) {
        $file = $request->file('foto');
        $fileName = time() . '_' . $file->getClientOriginalName();
        $filePath = $file->storeAs('images', $fileName, 'public');
        $perabot_dapur->foto = $fileName;
    }

    $perabot_dapur->id_produk = $request->id_produk;
    $perabot_dapur->nama = $request->nama;
    $perabot_dapur->kategori_id = $request->kategori_id;
    $perabot_dapur->harga_retail = $harga_retail;
    $perabot_dapur->harga_reseller = $harga_reseller;
    $perabot_dapur->jumlah = $request->jumlah;
    $perabot_dapur->tglbeli = $request->tglbeli;
    $perabot_dapur->deskripsi = $request->deskripsi;
    $perabot_dapur->berat = $beratGram;
    $perabot_dapur->save();

    return redirect()->route('admin.kategori.perabot_dapur.index')->with('success', 'perabot dapur berhasil diperbarui.');
}
public function destroy($id)
{
    $perabot_dapur = Produk::findOrFail($id);
    $perabot_dapur->delete();

    return redirect()->route('admin.kategori.perabot_dapur.index')->with('success', 'perabot dapur berhasil dihapus.');
}
public function tampiluser(Request $request)
{
    if ($request->ajax()) {
        $kategori_id = $request->kategori_id;

        $perabot_dapurs = Produk::with('kategori')
            ->whereHas('kategori', function($query) {
                $query->where('kategori', 'perabot dapur');
            })
            ->when($kategori_id, function($query) use ($kategori_id) {
                $query->where('kategori_id', $kategori_id);
            })
            ->get();

        return response()->json($perabot_dapurs);
    }

    // Jika bukan request ajax, maka tampilkan halaman index dengan data alat_kebersihan dan kategorinya
    $perabot_dapurs = Produk::whereHas('kategori', function($query) {
            $query->where('kategori', 'perabot dapur');
        })
        ->get();
    $kategoris = Kategori::where('kategori', 'perabot_dapur')->get();
    return view('perabot-dapur', compact('perabot_dapurs', 'kategoris'));
}
}