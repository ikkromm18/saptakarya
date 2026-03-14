<?php

namespace App\Http\Controllers;

use App\Models\Portfolio;
use App\Models\Produk;
use App\Models\Testimoni;

use App\Models\User;

class BerandaController extends Controller
{
    public function index()
    {
        $produks    = Produk::all();
        $portfolios = Portfolio::latest()->take(6)->get();
        $testimonis = Testimoni::displayed()->latest()->get();

        // Get admin phone number
        $adminPhone = User::where('role', 'admin')->value('no_hp') ?? '6281234567890';

        return view('frontend.beranda.index', compact('produks', 'portfolios', 'testimonis', 'adminPhone'));
    }
}
