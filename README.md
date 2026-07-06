# 📚 Tugas Pertemuan 10 - Pemrograman Web 2 (Informatika UIN Gusdur)

Implementasi Database dengan Migration, Model, Seeder, serta Penerapan Eloquent Accessor & Query Scope.

## Identitas
- Nama:Fadhil Naja
- Prodi:Informatika
- Fakultas:Ekonomi dan Bisnis Islam (FEBI)

---

## 🛠️ Fitur & Cakupan Tugas

### Tugas 1: Database Migration & Seeder Kategori (40%)
* **Migration & Seeder:** Membuat database `perpustakaan_praktek` beserta tabel `kategori`, lalu mengisinya dengan data default (Programming, Database, Web Design, Networking, Data Science) menggunakan `KategoriSeeder`.

### Tugas 2: Eloquent Model, Accessor, & Query Scope (60%)
* **Model Buku (`Buku.php`):**
  * Accessor `status_stok_badge`: Menampilkan badge Bootstrap (Aman/Sedang/Menipis/Habis) sesuai jumlah stok.
  * Accessor `tahun_label`: Memberikan label "Buku Baru" ($\ge$ 2024) atau "Buku Lama".
  * Query Scope: `scopeStokMenipis()`, `scopeHargaRange()`, dan `scopeTerbaru()`.
* **Model Anggota (`Anggota.php`):**
  * Accessor `status_badge`: Menampilkan badge "Aktif" atau "Nonaktif".
  * Accessor `kategori_usia`: Mengelompokkan umur anggota menjadi Remaja, Dewasa, atau Senior.
  * Query Scope: `scopeJenisKelamin()` dan `scopeTerdaftarBulanIni()`.

---

## Dokumentasi Bukti Hasil Praktikum

### 1. Struktur Data & Seeder Kategori di phpMyAdmin (Tugas 1)
Berikut adalah bukti data kategori yang berhasil masuk ke database melalui proses migration dan seeding:
![Bukti Database](tugasP10bkti_database.png)

### 2. Output Pengujian Accessor & Scope di Browser (Tugas 2)
Berikut adalah hasil render route `/test-accessor-scope` yang menampilkan manipulasi data menggunakan Accessor dan pemfilteran query menggunakan Scope:
![Bukti Route](tugas_pertemuan10_route.png)