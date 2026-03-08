<?php

namespace App\Http\Controllers;

use App\Models\Portfolio;
use App\Models\Produk;
use App\Models\Testimoni;

class BerandaController extends Controller
{
    public function index()
    {
        $produks    = Produk::all();
        $portfolios = Portfolio::latest()->take(6)->get();
        $testimonis = Testimoni::all();

        return view('frontend.beranda.index', compact('produks', 'portfolios', 'testimonis'));
    }
}
