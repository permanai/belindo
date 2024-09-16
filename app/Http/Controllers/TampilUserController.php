<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class TampilUserController extends Controller
{
    /**
     * Menampilkan daftar pelanggan.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $customers = User::where('role_id', 2)->get();

       
        return view('admin.user', compact('customers'));
    }
}
