<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KategoriController extends Controller
{
    // Data Dummy Master Kategori & Buku (Manut spesifikasi Tugas 2)
    private function getKategoriData() {
        return [
            1 => [
                'id' => 1, 'nama' => 'Programming', 
                'deskripsi' => 'Buku pemrograman dan coding komputer.', 'jumlah_buku' => 25,
                'buku' => ['Belajar Laravel 10', 'Mastering JavaScript', 'Python untuk Data Science']
            ],
            2 => [
                'id' => 2, 'nama' => 'Basis Data', 
                'deskripsi' => 'Semua hal tentang MySQL, PostgreSQL, dan NoSQL.', 'jumlah_buku' => 12,
                'buku' => ['Desain Database Relasional', 'Optimasi Query MySQL']
            ],
            3 => [
                'id' => 3, 'nama' => 'Jaringan', 
                'deskripsi' => 'Buku seputar CCNA, Mikrotik, lan Cyber Security.', 'jumlah_buku' => 18,
                'buku' => ['Pengantar Jaringan Komputer', 'Konfigurasi Mikrotik RouterOS']
            ],
            4 => [
                'id' => 4, 'nama' => 'Agama Islam', 
                'deskripsi' => 'Buku Fiqih, Sejarah Islam, dan Ekonomi Syariah.', 'jumlah_buku' => 40,
                'buku' => ['Fiqih Muamalah', 'Sejarah Peradaban Islam']
            ],
            5 => [
                'id' => 5, 'nama' => 'Fiksi', 
                'deskripsi' => 'Novel, komik, lan cerita hiburan.', 'jumlah_buku' => 30,
                'buku' => ['Laskar Pelangi', 'Bumi Manusia']
            ],
        ];
    }

    // a. Method index() - Daftar Kategori
    public function index()
    {
        $kategori_list = $this->getKategoriData();
        return view('kategori.index', compact('kategori_list'));
    }

    // b. Method show($id) - Detail Kategori
    public function show($id)
    {
        $all_kategori = $this->getKategoriData();
        
        if (!array_key_exists($id, $all_kategori)) {
            abort(404, 'Kategori tidak ditemukan!');
        }

        $kategori = $all_kategori[$id];
        $buku_list = $kategori['buku']; 

        return view('kategori.show', compact('kategori', 'buku_list'));
    }

    // c. Method search($keyword) - Cari Kategori
    public function search($keyword)
    {
        $all_kategori = $this->getKategoriData();
        $hasil_pencarian = [];

        foreach ($all_kategori as $kat) {
            if (stripos($kat['nama'], $keyword) !== false || stripos($kat['deskripsi'], $keyword) !== false) {
                $hasil_pencarian[] = $kat;
            }
        }

        return view('kategori.search', compact('hasil_pencarian', 'keyword'));
    }
}