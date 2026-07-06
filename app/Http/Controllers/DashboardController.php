<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Buku;
use App\Models\Anggota;

class DashboardController extends Controller
{
    public function index()
    {
        // Statistik Utama
        $total_buku = Buku::count();
        $buku_tersedia = Buku::where('stok', '>', 0)->count();
        $buku_habis = Buku::where('stok', '=', 0)->count();
        $total_anggota = Anggota::count();
        $anggota_aktif = Anggota::where('status', 'aktif')->count();
        $anggota_nonaktif = Anggota::where('status', 'nonaktif')->count();

        // Data Terbaru
        $buku_terbaru = Buku::latest()->take(5)->get();
        $anggota_terbaru = Anggota::latest()->take(5)->get();

        return view('dashboard', compact(
            'total_buku', 'buku_tersedia', 'buku_habis',
            'total_anggota', 'anggota_aktif', 'anggota_nonaktif',
            'buku_terbaru', 'anggota_terbaru'
        ));
    }

    // Fungsi Baru untuk Pencarian Advanced (Tugas 3)
    public function search(Request $request)
    {
        $query = Buku::query();

        // Filter 1: Berdasarkan Keyword (Judul, Pengarang, Penerbit)
        if ($request->has('keyword') && $request->keyword != '') {
            $query->where(function($q) use ($request) {
                $q->where('judul', 'like', '%' . $request->keyword . '%')
                  ->orWhere('pengarang', 'like', '%' . $request->keyword . '%')
                  ->orWhere('penerbit', 'like', '%' . $request->keyword . '%');
            });
        }

        // Filter 2: Berdasarkan Status Ketersediaan Stok
        if ($request->has('stok_status') && $request->stok_status != '') {
            if ($request->stok_status == 'tersedia') {
                $query->where('stok', '>', 0);
            } elseif ($request->stok_status == 'habis') {
                $query->where('stok', '=', 0);
            }
        }

        // Ambil hasil filter buku terbaru
        $buku_terbaru = $query->latest()->get();
        
        // Tetap ambil data pendukung statistik dashboard agar tidak error saat render view
        $total_buku = Buku::count();
        $buku_tersedia = Buku::where('stok', '>', 0)->count();
        $buku_habis = Buku::where('stok', '=', 0)->count();
        $total_anggota = Anggota::count();
        $anggota_aktif = Anggota::where('status', 'aktif')->count();
        $anggota_nonaktif = Anggota::where('status', 'nonaktif')->count();
        $anggota_terbaru = Anggota::latest()->take(5)->get();

        return view('dashboard', compact(
            'total_buku', 'buku_tersedia', 'buku_habis',
            'total_anggota', 'anggota_aktif', 'anggota_nonaktif',
            'buku_terbaru', 'anggota_terbaru'
        ));
    }
}