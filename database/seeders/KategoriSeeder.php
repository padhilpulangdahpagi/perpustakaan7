<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Kategori;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $kategoriList = [
            ['nama_kategori' => 'Programming', 'deskripsi' => 'Buku seputar pemrograman komputer dan software'],
            ['nama_kategori' => 'Database', 'deskripsi' => 'Buku optimasi dan administrasi basis data'],
            ['nama_kategori' => 'Web Design', 'deskripsi' => 'Buku panduan desain dan antarmuka website modern'],
            ['nama_kategori' => 'Networking', 'deskripsi' => 'Buku fundamental jaringan dan keamanan komputer'],
            ['nama_kategori' => 'Data Science', 'deskripsi' => 'Buku analisis data menggunakan Python dan R'],
        ];

        foreach ($kategoriList as $kategori) {
            Kategori::create($kategori);
        }
    }
}