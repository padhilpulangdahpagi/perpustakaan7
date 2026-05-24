<?php
 
namespace Database\Seeders;
 
use Illuminate\Database\Seeder;
use App\Models\Buku;
 
class BukuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $bukuList = [
            [
                'kode_buku' => 'BK-001',
                'judul' => 'Laravel 12 untuk Pemula',
                'kategori_id' => 1, // Connect ke ID 1 (Programming)
                'pengarang' => 'John Doe',
                'penerbit' => 'Tech Publisher',
                'tahun_terbit' => 2024,
                'isbn' => '978-602-1234-56-1',
                'harga' => 150000,
                'stok' => 20,
                'deskripsi' => 'Buku panduan lengkap Laravel 12 dari dasar hingga mahir',
                'bahasa' => 'Indonesia',
            ],
            [
                'kode_buku' => 'BK-002',
                'judul' => 'MySQL Advanced Techniques',
                'kategori_id' => 2, // Connect ke ID 2 (Database)
                'pengarang' => 'Jane Smith',
                'penerbit' => 'Data Press',
                'tahun_terbit' => 2023,
                'isbn' => '978-602-1234-56-2',
                'harga' => 175000,
                'stok' => 15,
                'deskripsi' => 'Teknik advanced untuk optimasi MySQL database',
                'bahasa' => 'Inggris',
            ],
            [
                'kode_buku' => 'BK-003',
                'judul' => 'Modern Web Design',
                'kategori_id' => 3, // Connect ke ID 3 (Web Design)
                'pengarang' => 'Ahmad Yani',
                'penerbit' => 'Creative Media',
                'tahun_terbit' => 2024,
                'isbn' => '978-602-1234-56-3',
                'harga' => 120000,
                'stok' => 25,
                'deskripsi' => 'Prinsip dan praktik desain web modern',
                'bahasa' => 'Indonesia',
            ],
            [
                'kode_buku' => 'BK-004',
                'judul' => 'Network Security Fundamentals',
                'kategori_id' => 4, // Connect ke ID 4 (Networking)
                'pengarang' => 'Robert Johnson',
                'penerbit' => 'Security Press',
                'tahun_terbit' => 2023,
                'isbn' => '978-602-1234-56-4',
                'harga' => 200000,
                'stok' => 10,
                'deskripsi' => 'Dasar-dasar keamanan jaringan komputer',
                'bahasa' => 'Inggris',
            ],
            [
                'kode_buku' => 'BK-005',
                'judul' => 'Data Science dengan Python',
                'kategori_id' => 5, // Connect ke ID 5 (Data Science)
                'pengarang' => 'Siti Nurhaliza',
                'penerbit' => 'Analytics Publisher',
                'tahun_terbit' => 2024,
                'isbn' => '978-602-1234-56-5',
                'harga' => 180000,
                'stok' => 18,
                'deskripsi' => 'Panduan praktis data science menggunakan Python',
                'bahasa' => 'Indonesia',
            ],
        ];
 
        foreach ($bukuList as $buku) {
            Buku::create($buku);
        }
    }
}