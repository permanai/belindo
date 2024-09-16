<?php

namespace App\Http\Controllers;
use App\Models\Produk;
use App\Models\Kategori;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;

class PerabotRumahController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $kategori_id = $request->kategori_id;
    
            $perabot_rumahs = Produk::with('kategori')
                ->whereHas('kategori', function($query) {
                    $query->where('kategori', 'perabot rumah');
                })
                ->when($kategori_id, function($query) use ($kategori_id) {
                    $query->where('kategori_id', $kategori_id);
                })
                ->get();
    
            return response()->json($perabot_rumahs);
        }
    
        // Jika bukan request ajax, maka tampilkan halaman index dengan data alat_kebersihan dan kategorinya
        $perabot_rumahs = Produk::whereHas('kategori', function($query) {
                $query->where('kategori', 'perabot rumah');
            })
            ->get();
        $kategoris = Kategori::where('kategori', 'perabot_rumah')->get();
        return view('admin.kategori.perabot_rumah.index', compact('perabot_rumahs', 'kategoris'));
    }
    public function create()
    {
        $kategoris = Kategori::where('kategori', 'perabot rumah')->get();
        return view('admin.kategori.perabot_rumah.create', compact('kategoris'));
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
    return redirect()->route('admin.kategori.perabot_rumah.index')->with('success', 'perabot rumah berhasil ditambahkan.');
}
    public function show($id)
{
    $perabot_rumah = Produk::findOrFail($id);
    return view('admin.kategori.perabot_rumah.show', compact('perabot_rumah'));
}
public function edit($id)
{
    $perabot_rumah = Produk::findOrFail($id);
    $kategoris = Kategori::where('kategori', 'perabot rumah')->get();
    return view('admin.kategori.perabot_rumah.update', compact('perabot_rumah', 'kategoris'));
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

    $perabot_rumah = Produk::findOrFail($id);

    if ($request->hasFile('foto')) {
        $file = $request->file('foto');
        $fileName = time() . '_' . $file->getClientOriginalName();
        $filePath = $file->storeAs('images', $fileName, 'public');
        $perabot_rumah->foto = $fileName;
    }

    $perabot_rumah->id_produk = $request->id_produk;
    $perabot_rumah->nama = $request->nama;
    $perabot_rumah->kategori_id = $request->kategori_id;
    $perabot_rumah->harga_retail = $harga_retail;
    $perabot_rumah->harga_reseller = $harga_reseller;
    $perabot_rumah->jumlah = $request->jumlah;
    $perabot_rumah->tglbeli = $request->tglbeli;
    $perabot_rumah->deskripsi = $request->deskripsi;
    $perabot_rumah->berat = $beratGram;
    $perabot_rumah->save();

    return redirect()->route('admin.kategori.perabot_rumah.index')->with('success', 'perabot rumah berhasil diperbarui.');
}
public function destroy($id)
{
    $perabot_rumah = Produk::findOrFail($id);
    $perabot_rumah->delete();

    return redirect()->route('admin.kategori.perabot_rumah.index')->with('success', 'perabot rumah berhasil dihapus.');
}

public function tampiluser(Request $request)
{
    if ($request->ajax()) {
        $kategori_id = $request->kategori_id;

        $perabot_rumahs = Produk::with('kategori')
            ->whereHas('kategori', function($query) {
                $query->where('kategori', 'perabot rumah');
            })
            ->when($kategori_id, function($query) use ($kategori_id) {
                $query->where('kategori_id', $kategori_id);
            })
            ->get();

        return response()->json($perabot_rumahs);
    }

    // Jika bukan request ajax, maka tampilkan halaman index dengan data alat_kebersihan dan kategorinya
    $perabot_rumahs = Produk::whereHas('kategori', function($query) {
            $query->where('kategori', 'perabot rumah');
        })
        ->get();
    $kategoris = Kategori::where('kategori', 'perabot_rumah')->get();
    return view('perabot-rumah', compact('perabot_rumahs', 'kategoris'));
}

}
