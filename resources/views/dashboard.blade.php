<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Perpustakaan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
</head>
<body class="bg-light">

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4 shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/dashboard') }}"><i class="bi bi-book-half me-2"></i>Perpus Praktek</a>
            <div class="navbar-nav ms-auto">
                <a href="{{ url('/perpustakaan') }}" class="nav-link text-white btn btn-sm btn-outline-secondary px-3 me-2">Halaman Utama</a>
                <a href="{{ url('/test-accessor-scope') }}" class="nav-link text-white btn btn-sm btn-outline-secondary px-3">Test Accessor & Scope</a>
            </div>
        </div>
    </nav>

    <div class="container mb-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2>📊 Dashboard Perpustakaan</h2>
            <span class="badge bg-secondary p-2">Pertemuan 11 - Tugas Lengkap</span>
        </div>
        
        <!-- CARD STATISTIK TOTAL ANGGOTA -->
        <div class="row mt-4 mb-5 g-3">
            <div class="col-md-4">
                <div class="card bg-info text-white p-3 shadow-sm border-0">
                    <h5>Total Anggota</h5>
                    <h3>{{ $total_anggota }}</h3>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card bg-primary text-white p-3 shadow-sm border-0">
                    <h5>Anggota| Aktif</h5>
                    <h3>{{ $anggota_aktif }}</h3>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card bg-secondary text-white p-3 shadow-sm border-0">
                    <h5>Anggota Non-Aktif</h5>
                    <h3>{{ $anggota_nonaktif }}</h3>
                </div>
            </div>
        </div>

        <!-- FORM PENCARIAN ADVANCED (TUGAS 3) -->
        <div class="card mb-4 shadow-sm border-0">
            <div class="card-body bg-white rounded p-4">
                <h5 class="mb-3 text-dark"><i class="bi bi-search me-2"></i>Filter Pencarian Buku</h5>
                <form action="{{ route('dashboard.search') }}" method="GET" class="row g-3">
                    <div class="col-md-6">
                        <input type="text" name="keyword" class="form-control" placeholder="Cari judul, pengarang, atau penerbit..." value="{{ request('keyword') }}">
                    </div>
                    <div class="col-md-4">
                        <select name="stok_status" class="form-select">
                            <option value="">-- Semua Status Stok --</option>
                            <option value="tersedia" {{ request('stok_status') == 'tersedia' ? 'selected' : '' }}>Tersedia</option>
                            <option value="habis" {{ request('stok_status') == 'habis' ? 'selected' : '' }}>Habis</option>
                        </select>
                    </div>
                    <div class="col-md-2 d-grid">
                        <button type="submit" class="btn btn-primary"><i class="bi bi-funnel-fill"></i> Cari</button>
                    </div>
                </form>
            </div>
        </div>

        <div class="row">
            <!-- LIST BUKU TERBARU / HASIL CARI (Menggunakan Blade Component BukuCard) -->
            <div class="col-lg-7 mb-4">
                <h4 class="mb-3 text-dark"><i class="bi bi-star-fill text-warning me-2"></i>Daftar Buku</h4>
                <div class="row row-cols-1 row-cols-md-2 g-3">
                    @forelse($buku_terbaru as $buku)
                        <div class="col">
                            <!-- Memanggil Component BukuCard dengan Property showActions=true (Tugas 2) -->
                            <x-buku-card :buku="$buku" :showActions="true" />
                        </div>
                    @empty
                        <div class="col-12">
                            <div class="alert alert-warning">Buku yang kamu cari tidak ditemukan.</div>
                        </div>
                    @endforelse
                </div>
            </div>

            <!-- LIST 5 ANGGOTA TERBARU -->
            <div class="col-lg-5 mb-4">
                <h4 class="mb-3 text-dark"><i class="bi bi-person-plus-fill text-primary me-2"></i>5 Anggota Terbaru</h4>
                <div class="card shadow-sm border-0">
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-hover table-striped mb-0 align-middle">
                                <thead class="table-dark">
                                    <tr>
                                        <th>Nama</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($anggota_terbaru as $anggota)
                                        <tr>
                                            <td class="fw-bold text-secondary">{{ $anggota->nama }}</td>
                                            <td>{!! $anggota->status_badge !!}</td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="2" class="text-center p-3 text-muted">Belum ada data anggota.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/bootstrap.bundle.min.js"></script>
</body>
</html>