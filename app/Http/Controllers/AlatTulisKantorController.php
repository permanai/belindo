<?php

namespace App\Http\Controllers;
use App\Models\Produk;
use App\Models\Kategori;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;

class AlatTulisKantorController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $kategori_id = $request->kategori_id;
    
            $alat_tulis_kantors = Produk::with('kategori')
                ->whereHas('kategori', function($query) {
                    $query->where('kategori', 'alat tulis kantor');
                })
                ->when($kategori_id, function($query) use ($kategori_id) {
                    $query->where('kategori_id', $kategori_id);
                })
                ->get();
    
            return response()->json($alat_tulis_kantors);
        }
    
        // Jika bukan request ajax, maka tampilkan halaman index dengan data alat_kebersihan dan kategorinya
        $alat_tulis_kantors = Produk::whereHas('kategori', function($query) {
                $query->where('kategori', 'alat tulis kantor');
            })
            ->get();
        $kategoris = Kategori::where('kategori', 'alat tulis kantor')->get();
        return view('admin.kategori.alat_tulis_kantor.index', compact('alat_tulis_kantors', 'kategoris'));
    }
    public function create()
    {
        $kategoris = Kategori::where('kategori', 'alat tulis kantor')->get();
        return view('admin.kategori.alat_tulis_kantor.create', compact('kategoris'));
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
    return redirect()->route('admin.kategori.alat_tulis_kantor.index')->with('success', 'Alat Tulis Kantor berhasil ditambahkan.');
}

public function show($id)
{
    $alat_tulis_kantor = Produk::findOrFail($id);
    return view('admin.kategori.alat_tulis_kantor.show', compact('alat_tulis_kantor'));
}
public function edit($id)
{
    $alat_tulis_kantor = Produk::findOrFail($id);
    $kategoris = Kategori::where('kategori', 'alat tulis kantor')->get();
    return view('admin.kategori.alat_tulis_kantor.update', compact('alat_tulis_kantor', 'kategoris'));
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

    $alat_tulis_kantor = Produk::findOrFail($id);

    if ($request->hasFile('foto')) {
        $file = $request->file('foto');
        $fileName = time() . '_' . $file->getClientOriginalName();
        $filePath = $file->storeAs('images', $fileName, 'public');
        $alat_tulis_kantor->foto = $fileName;
    }

    $alat_tulis_kantor->id_produk = $request->id_produk;
    $alat_tulis_kantor->nama = $request->nama;
    $alat_tulis_kantor->kategori_id = $request->kategori_id;
    $alat_tulis_kantor->harga_retail = $harga_retail;
    $alat_tulis_kantor->harga_reseller = $harga_reseller;
    $alat_tulis_kantor->jumlah = $request->jumlah;
    $alat_tulis_kantor->tglbeli = $request->tglbeli;
    $alat_tulis_kantor->deskripsi = $request->deskripsi;
    $alat_tulis_kantor->berat = $beratGram;
    $alat_tulis_kantor->save();

    return redirect()->route('admin.kategori.alat_tulis_kantor.index')->with('success', 'Alat Tulis Kantor berhasil diperbarui.');
}
public function destroy($id)
{
    $alat_tulis_kantor = Produk::findOrFail($id);
    $alat_tulis_kantor->delete();

    return redirect()->route('admin.kategori.alat_tulis_kantor.index')->with('success', 'Alat tulis kantor berhasil dihapus.');
}

public function tampiluser(Request $request)
{
    if ($request->ajax()) {
        $kategori_id = $request->kategori_id;

        $alat_tulis_kantors = Produk::with('kategori')
            ->whereHas('kategori', function($query) {
                $query->where('kategori', 'alat tulis kantor');
            })
            ->when($kategori_id, function($query) use ($kategori_id) {
                $query->where('kategori_id', $kategori_id);
            })
            ->get();

        return response()->json($alat_tulis_kantors);
    }

    // Jika bukan request ajax, maka tampilkan halaman index dengan data alat_kebersihan dan kategorinya
    $alat_tulis_kantors = Produk::whereHas('kategori', function($query) {
            $query->where('kategori', 'alat tulis kantor');
        })
        ->get();
    $kategoris = Kategori::where('kategori', 'alat_tulis_kantor')->get();
    return view('alat-tulis-kantor', compact('alat_tulis_kantors', 'kategoris'));
}

}
