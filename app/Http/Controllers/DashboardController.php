<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Anggota;

class DashboardController extends Controller
{
    public function index()
    {
        $data = [
            'total_buku' => Buku::count(),
            'buku_tersedia' => Buku::where('stok', '>', 0)->count(),
            'buku_habis' => Buku::where('stok', 0)->count(),
            'total_anggota' => Anggota::count(),
        ];

        return view('dashboard', compact('data'));
    }
}