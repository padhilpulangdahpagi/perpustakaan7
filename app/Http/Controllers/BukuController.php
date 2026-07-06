<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Buku;
use App\Rules\KodeBukuFormat;

class BukuController extends Controller
{
    // Menampilkan daftar buku lengkap dengan fitur Bulk Delete
    public function index()
    {
        $buku = Buku::latest()->get();
        return view('buku.index', compact('buku'));
    }

    public function create()
    {
        return view('buku.create');
    }

    public function store(Request $request)
    {
        // Tugas 1: Validasi Kompleks & Conditional Validation
        $validated = $request->validate([
            'kode_buku' => ['required', 'string', new KodeBukuFormat, 'unique:buku,kode_buku'],
            'judul' => 'required|string|max:200',
            'kategori' => 'required|in:Programming,Database,Web Design,Networking,Data Science',
            'pengarang' => 'required|string|max:100',
            'penerbit' => 'required|string|max:100',
            'tahun_terbit' => 'required|integer|min:1900|max:'.date('Y'),
            'bahasa' => 'required|string',
            'stok' => 'required|integer|min:0',
        ], [
            'kode_buku.required' => 'Kode buku wajib diisi, bro!',
            'kode_buku.unique' => 'Kode buku ini sudah terdaftar.',
            'judul.required' => 'Judul buku jangan dikosongin.',
            'kategori.required' => 'Pilih dulu kategori bukunya.',
        ]);

        // Spesifikasi Conditional Validation Tugas 1:
        // 1. Jika kategori "Programming", field bahasa harus "Inggris"
        if ($request->kategori === 'Programming' && strtolower($request->bahasa) !== 'inggris') {
            return redirect()->back()->withInput()->withErrors(['bahasa' => 'Khusus kategori Programming, bahasa harus berisi "Inggris"!']);
        }

        // 2. Jika tahun terbit < 2000, stok maksimal 5
        if ($request->tahun_terbit < 2000 && $request->stok > 5) {
            return redirect()->back()->withInput()->withErrors(['stok' => 'Buku jadul (di bawah tahun 2000) stok maksimal cuma boleh 5!']);
        }

        Buku::create($validated);
        return redirect()->route('buku-crud.index')->with('success', '🎉 Buku berhasil ditambahkan!');
    }

    // Tugas 2: Fitur Bulk Delete Operations
    public function bulkDelete(Request $request)
    {
        $ids = $request->ids;
        if (!$ids || count($ids) == 0) {
            return redirect()->back()->with('error', 'Pilih minimal satu buku yang mau dihapus!');
        }

        Buku::whereIn('id', $ids)->delete();
        return redirect()->route('buku-crud.index')->with('success', '🔥 Buku-buku yang dipilih berhasil dibumihanguskan!');
    }
}