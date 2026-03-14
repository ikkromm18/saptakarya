<?php

namespace App\Http\Controllers;

use App\Models\Produk;

use App\Models\User;

class ProdukController extends Controller
{
    public function index()
    {
        $produks = Produk::all();
        $adminPhone = User::where('role', 'admin')->value('no_hp') ?? '6281234567890';

        return view('frontend.produk.index', compact('produks', 'adminPhone'));
    }
}
