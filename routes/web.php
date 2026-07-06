<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PerpustakaanController;
use App\Http\Controllers\DashboardController; 
use Illuminate\Support\Facades\DB;
use App\Models\Buku;
use App\Models\Anggota;

// ==========================================
// 1. ROUTE DEFAULT & TESTING BASIC
// ==========================================

Route::get('/', function () {
    return view('welcome');
});

Route::get('/hello', function () {
    return 'Hello dari Laravel!';
});

Route::get('/info', function () {
    return '<h1>Sistem Perpustakaan</h1><p>Selamat datang!</p>';
});

Route::get('/buku-json', function () { 
    return [
        'judul' => 'Laravel Programming',
        'pengarang' => 'John Doe',
        'harga' => 150000
    ];
});

// ==========================================
// 2. ROUTE DENGAN PARAMETER
// ==========================================

Route::get('/buku/{id}', [PerpustakaanController::class, 'show']);

Route::get('/kategori/{nama?}', function ($nama = 'Semua Kategori') {
    return "Menampilkan kategori: " . $nama;
});

Route::get('/search/{kategori}/{keyword}', function ($kategori, $keyword) {
    return "Cari buku kategori: $kategori dengan keyword: $keyword";
});

// ==========================================
// 3. ROUTE UTAMA PERPUSTAKAAN (MENGGUNAKAN CONTROLLER)
// ==========================================

Route::get('/perpustakaan', [PerpustakaanController::class, 'index'])->name('perpus.home');
Route::get('/about', [PerpustakaanController::class, 'about']);

// ==========================================
// 4. TESTING ROUTE & DATABASE
// ==========================================

Route::get('/test-route', function () {
    $url = route('perpus.home');
    return "URL perpustakaan: " . $url;
});

Route::get('/test-db', function () {
    try {
        DB::connection()->getPdo();
        $dbName = DB::connection()->getDatabaseName();
        
        return "Koneksi database berhasil!<br />Database: <strong>{$dbName}</strong>";
    } catch (\Exception $e) {
        return "Koneksi database gagal!<br />Error: " . $e->getMessage();
    }
});

// ==========================================
// 5. TUGAS PERTEMUAN 10: TESTING ACCESSOR & SCOPE
// ==========================================
Route::get('/test-accessor-scope', function () {
    $html = '<title>Testing Accessor & Scope</title>';
    $html .= '<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">';
    $html .= '<div class="container mt-4"><h1>Testing Accessor & Scope</h1><hr>';
    
    $html .= '<h2>1. Buku dengan Status Stok & Label</h2><ul class="list-group mb-4">';
    foreach (Buku::all() as $buku) {
        $html .= "<li class='list-group-item'>Judul: <strong>{$buku->judul}</strong> | Stok: {$buku->stok} | Status: {$buku->status_stok_badge} | Label: <span class='badge bg-dark'>{$buku->tahun_label}</span></li>";
    }
    $html .= '</ul>';
    
    $html .= '<h2>2. Buku Terbaru (Scope)</h2><ul class="list-group mb-4">';
    foreach (Buku::terbaru()->get() as $buku) {
        $html .= "<li class='list-group-item'>Judul: <strong>{$buku->judul}</strong> | Tahun: {$buku->tahun_terbit}</li>";
    }
    $html .= '</ul>';
    
    $html .= '<h2>3. Buku Stok Menipis (Scope)</h2><ul class="list-group mb-4">';
    foreach (Buku::stokMenipis()->get() as $buku) {
        $html .= "<li class='list-group-item'>Judul: <strong>{$buku->judul}</strong> | Stok: {$buku->stok}</li>";
    }
    $html .= '</ul>';
    
    $html .= '<h2>4. Anggota dengan Status & Kategori Usia</h2><ul class="list-group mb-4">';
    foreach (Anggota::all() as $anggota) {
        $html .= "<li class='list-group-item'>Nama: <strong>{$anggota->nama}</strong> | Status: {$anggota->status_badge} | Kategori Usia: <span class='badge bg-primary'>{$anggota->kategori_usia}</span> (Umur: {$anggota->umur})</li>";
    }
    $html .= '</ul>';
    
    $html .= '<h2>5. Anggota Terdaftar Bulan Ini (Scope)</h2><ul class="list-group mb-4">';
    foreach (Anggota::terdaftarBulanIni()->get() as $anggota) {
        $html .= "<li class='list-group-item'>Nama: <strong>{$anggota->nama}</strong> | Daftar: " . $anggota->tanggal_daftar->format('Y-m-d') . "</li>";
    }
    $html .= '</ul></div>';
    
    return $html;
});

// ==========================================
// 6. TUGAS PERTEMUAN 11: DASHBOARD UTAMA
// ==========================================
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/dashboard/search', [DashboardController::class, 'search'])->name('dashboard.search');
Route::resource('buku-crud', \App\Http\Controllers\BukuController::class);
Route::post('buku-bulk-delete', [\App\Http\Controllers\BukuController::class, 'bulkDelete']);