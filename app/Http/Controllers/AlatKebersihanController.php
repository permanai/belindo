<?php

namespace App\Http\Controllers;
use App\Models\Produk;
use App\Models\Kategori;
use Illuminate\Http\Request;
use App\Models\alat_kebersihan;
use Illuminate\Routing\Controller;

class AlatKebersihanController extends Controller
{
    
    public function index(Request $request)
{
    if ($request->ajax()) {
        $kategori_id = $request->kategori_id;

        $alat_kebersihans = Produk::with('kategori')
            ->whereHas('kategori', function($query) {
                $query->where('kategori', 'alat kebersihan');
            })
            ->when($kategori_id, function($query) use ($kategori_id) {
                $query->where('kategori_id', $kategori_id);
            })
            ->get();
            

        return response()->json($alat_kebersihans);
    }
    $alat_kebersihans = Produk::whereHas('kategori', function($query) {
            $query->where('kategori', 'alat kebersihan');
        })
        ->get();
    $kategoris = Kategori::where('kategori', 'alat kebersihan')->get();
    return view('admin.kategori.alat_kebersihan.index', compact('alat_kebersihans', 'kategoris'));
}

public function create()
{
    $kategoris = Kategori::where('kategori', 'alat kebersihan')->get();
    return view('admin.kategori.alat_kebersihan.create', compact('kategoris'));
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

    

    $hargaRetail = str_replace('.', '', $request->harga_retail); 
    $hargaReseller = str_replace('.', '', $request->harga_reseller);

    $beratGram = $request->berat;
    $file = $request->file('foto');
    $fileName = time() . '_' . $file->getClientOriginalName();
    $filePath = $file->storeAs('images', $fileName, 'public');

    $produk = Produk::create([
        'id_produk' => $request->id_produk,
        'nama' => $request->nama,
        'foto' => $fileName,
        'kategori_id' => $request->kategori_id, 
        'harga_retail' => $hargaRetail,
        'harga_reseller' => $hargaReseller,
        'jumlah' => $request->jumlah,
        'tglbeli' => $request->tglbeli,
        'deskripsi' => $request->deskripsi,
        'berat' => $beratGram,
    ]);
    return redirect()->route('admin.kategori.alat_kebersihan.index')->with('success', 'Alat kebersihan berhasil ditambahkan.');
}



public function edit($id)
{
    $alat_kebersihan = Produk::findOrFail($id);
    $kategoris = Kategori::where('kategori', 'alat kebersihan')->get();
    return view('admin.kategori.alat_kebersihan.update', compact('alat_kebersihan', 'kategoris'));
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

    $hargaRetail = str_replace('.', '', $request->harga_retail); 
    $hargaReseller = str_replace('.', '', $request->harga_reseller);
    $beratGram = $request->berat;

    $alat_kebersihan = Produk::findOrFail($id);

    if ($request->hasFile('foto')) {
        $file = $request->file('foto');
        $fileName = time() . '_' . $file->getClientOriginalName();
        $filePath = $file->storeAs('images', $fileName, 'public');
        $alat_kebersihan->foto = $fileName;
    }

    $alat_kebersihan->id_produk = $request->id_produk;
    $alat_kebersihan->nama = $request->nama;
    $alat_kebersihan->kategori_id = $request->kategori_id;
    $alat_kebersihan->harga_retail = $hargaRetail;
    $alat_kebersihan->harga_reseller = $hargaReseller;
    $alat_kebersihan->jumlah = $request->jumlah;
    $alat_kebersihan->tglbeli = $request->tglbeli;
    $alat_kebersihan->deskripsi = $request->deskripsi;
    $alat_kebersihan->berat = $beratGram;
    $alat_kebersihan->save();

    return redirect()->route('admin.kategori.alat_kebersihan.index')->with('success', 'Alat kebersihan berhasil diperbarui.');
}
public function destroy($id)
{
    $alat_kebersihan = Produk::findOrFail($id);
    $alat_kebersihan->delete();

    return redirect()->route('admin.kategori.alat_kebersihan.index')->with('success', 'Alat kebersihan berhasil dihapus.');
}

public function tampiluser(Request $request)
{
    if ($request->ajax()) {
        $kategori_id = $request->kategori_id;

        $alat_kebersihans = Produk::with('kategori')
            ->whereHas('kategori', function($query) {
                $query->where('kategori', 'alat kebersihan');
            })
            ->when($kategori_id, function($query) use ($kategori_id) {
                $query->where('kategori_id', $kategori_id);
            })
            ->get();

        return response()->json($alat_kebersihans);
    }

    $alat_kebersihans = Produk::whereHas('kategori', function($query) {
            $query->where('kategori', 'alat kebersihan');
        })
        ->get();
    $kategoris = Kategori::where('kategori', 'alat_kebersihan')->get();
    return view('alat-kebersihan', compact('alat_kebersihans', 'kategoris'));
}

}
