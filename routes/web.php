<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KategoriController;

// Halaman utama langsung tak redirect neng daftar anggota ben ra bingung
Route::get('/', function () {
    return redirect()->route('anggota.index');
});

// TUGAS 1
$anggota_list = [
    1 => [
        'id' => 1, 'kode' => 'AGT-001', 'nama' => 'Budi Santoso', 
        'email' => 'budi@email.com', 'telepon' => '081234567890', 
        'alamat' => 'Jakarta', 'status' => 'Aktif'
    ],
    2 => [
        'id' => 2, 'kode' => 'AGT-002', 'nama' => 'Siti Aminah', 
        'email' => 'siti@email.com', 'telepon' => '085712345678', 
        'alamat' => 'Pekalongan', 'status' => 'Aktif'
    ],
    3 => [
        'id' => 3, 'kode' => 'AGT-003', 'nama' => 'Fadhil Naja', 
        'email' => 'fadhil@email.com', 'telepon' => '089699887766', 
        'alamat' => 'Kajen', 'status' => 'Aktif'
    ],
    4 => [
        'id' => 4, 'kode' => 'AGT-004', 'nama' => 'Ahmad Rifa\'i', 
        'email' => 'rifai@email.com', 'telepon' => '082144332211', 
        'alamat' => 'Batang', 'status' => 'Non-Aktif'
    ],
    5 => [
        'id' => 5, 'kode' => 'AGT-005', 'nama' => 'Dewi Lestari', 
        'email' => 'dewi@email.com', 'telepon' => '081399881122', 
        'alamat' => 'Semarang', 'status' => 'Aktif'
    ],
];

// Route Daftar Anggota
Route::get('/anggota', function () use ($anggota_list) {
    return view('anggota.index', compact('anggota_list'));
})->name('anggota.index');

// Route Detail Anggota
Route::get('/anggota/{id}', function ($id) use ($anggota_list) {
    if (!array_key_exists($id, $anggota_list)) {
        abort(404, 'Anggota ora ketemu, Su!');
    }
    $anggota = $anggota_list[$id];
    return view('anggota.show', compact('anggota'));
})->name('anggota.show');


// ==================== TUGAS 2: ROUTING KATEGORI (MVC) ====================
Route::get('/kategori', [KategoriController::class, 'index'])->name('kategori.index');
Route::get('/kategori/{id}', [KategoriController::class, 'show'])->name('kategori.show');
Route::get('/kategori/search/{keyword}', [KategoriController::class, 'search'])->name('kategori.search');