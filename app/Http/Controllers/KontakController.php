<?php

namespace App\Http\Controllers;

use App\Models\User;

class KontakController extends Controller
{
    public function index()
    {
        $adminPhone = User::where('role', 'admin')->value('no_hp') ?? '6281234567890';
        return view('frontend.kontak.index', compact('adminPhone'));
    }
}
