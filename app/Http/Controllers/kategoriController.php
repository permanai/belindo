<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Spatie\FlareClient\View;

class kategoriController extends Controller
{
    public function index()
    {
        $kategoris = Kategori::all();
    return view('admin.kategori.index', compact('kategoris'));
    }

    public function create()
    {
        return view('admin.kategori.create');
    }

    public function store(Request $request)
    {
        // Validasi dan proses penyimpanan kategori
    
        $kategori = Kategori::create([
            'kategori' => $request->kategori,

        ]);
    

    
        // Redirect ke index kategori setelah membuat kategori baru
        return redirect()->route('kategori.index')->with('success', 'Kategori berhasil ditambahkan.');
    }
    
    

 
    public function show($id)
    {
        $kategori = Kategori::findOrFail($id);
        return view('admin.kategori.index', compact('kategori'));
    }

    public function edit($id)
    {
        $kategori = Kategori::findOrFail($id);
        return view('admin.kategori.update', compact('kategori'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'kategori' => 'required|string',
        ]);

        $kategori = Kategori::findOrFail($id);
        $kategori->update([
            'kategori' => $request->kategori,

        ]);

        return redirect()->route('admin.kategori.index')->with('success', 'kategori berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $kategori = Kategori::findOrFail($id);
        $kategori->delete();

        return redirect()->route('admin.kategori.index')->with('success', 'kategori berhasil dihapus.');
    }

    private function addSubcategoryToSidemenu($subcategoryName, $subcategoryRoute)
{
    // Mendapatkan akses ke view
    $view = view('partials.sidemenu');
    
    // Menyiapkan HTML untuk subkategori baru
    $subcategoryHtml = "<li class='menu-item'><a href='$subcategoryRoute' class='menu-link'><div>$subcategoryName</div></a></li>";

    // Sisipkan HTML subkategori baru ke dalam view
    $view->with('subcategoryHtml', $subcategoryHtml);

    // Render view untuk mendapatkan sidebar HTML yang sudah diperbarui
    $sidemenu = $view->render();

    return $sidemenu;
}
public function showAllCategories()
{
    $kategoris = Kategori::all(); 

    return view('index', compact('kategoris'));
}

}