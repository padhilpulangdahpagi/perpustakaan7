<?php

use Illuminate\Support\Facades\Route;
use App\Models\Buku;
use App\Models\Anggota;

Route::get('/test-accessor-scope', function () {
    $semuaBuku = Buku::all();
    $bukuTerbaru = Buku::terbaru()->get();
    $bukuStokMenipis = Buku::stokMenipis()->get();
    
    $semuaAnggota = Anggota::all();
    $anggotaBulanIni = Anggota::terdaftarBulanIni()->get();

    $bukuRows = '';
    foreach($semuaBuku as $b) {
        $bukuRows .= "<tr><td>{$b->judul}</td><td>{$b->tahun_terbit}</td><td><span class='badge bg-dark'>{$b->tahun_label}</span></td><td>{$b->stok}</td><td>{$b->status_stok_badge}</td></tr>";
    }

    $bukuTerbaruList = '';
    foreach($bukuTerbaru as $bt) { 
        $bukuTerbaruList .= "<li class='list-group-item'>🟢 {$bt->judul} ({$bt->tahun_terbit})</li>"; 
    }

    $stokMenipisList = '';
    foreach($bukuStokMenipis as $bs) { 
        $stokMenipisList .= "<li class='list-group-item list-group-item-danger'>⚠️ {$bs->judul} (Stok: {$bs->stok})</li>"; 
    }

    $anggotaRows = '';
    foreach($semuaAnggota as $a) {
        $anggotaRows .= "<tr><td>{$a->nama}</td><td>{$a->tanggal_lahir}</td><td><span class='badge bg-info text-dark'>{$a->kategori_usia}</span></td><td>{$a->status_badge}</td></tr>";
    }

    $anggotaBulanIniList = '';
    foreach($anggotaBulanIni as $ab) { 
        $anggotaBulanIniList .= "<li class='list-group-item'>👤 {$ab->nama} (Join: {$ab->created_at->format('d M Y')})</li>"; 
    }

    return "
    <!DOCTYPE html>
    <html>
    <head>
        <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css' rel='stylesheet'>
    </head>
    <body class='p-5'>
        <div class='container'>
            <h1>Testing Accessor & Scope</h1>
            <h3>Buku</h3>
            <table class='table'>{$bukuRows}</table>
            <h3>Buku Terbaru</h3>
            <ul>{$bukuTerbaruList}</ul>
            <h3>Stok Menipis</h3>
            <ul>{$stokMenipisList}</ul>
            <h3>Anggota</h3>
            <table class='table'>{$anggotaRows}</table>
            <h3>Anggota Baru</h3>
            <ul>{$anggotaBulanIniList}</ul>
        </div>
    </body>
    </html>";
});