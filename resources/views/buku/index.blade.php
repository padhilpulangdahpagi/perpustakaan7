<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Koleksi Buku</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2>📚 Daftar Koleksi Buku Perpustakaan</h2>
            <a href="{{ route('buku-crud.create') }}" class="btn btn-primary">➕ Tambah Buku</a>
        </div>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        <!-- PERBAIKAN: Tambahkan garis miring di depan URL agar mengarah ke root -->
        <form action="{{ url('/buku-bulk-delete') }}" method="POST" onsubmit="return confirm('Yakin mau hapus buku-buku yang dicentang?');">
            @csrf
            <div class="card shadow-sm border-0">
                <div class="card-body p-0">
                    <table class="table table-striped table-hover mb-0 align-middle">
                        <thead class="table-dark">
                            <tr>
                                <th width="5%"><input type="checkbox" id="checkAll"></th>
                                <th>Kode Buku</th>
                                <th>Judul</th>
                                <th>Kategori</th>
                                <th>Pengarang</th>
                                <th>Stok</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($buku as $b)
                                <tr>
                                    <td><input type="checkbox" name="ids[]" value="{{ $b->id }}" class="sub_chk"></td>
                                    <td><span class="badge bg-secondary">{{ $b->kode_buku }}</span></td>
                                    <td class="fw-bold text-primary">{{ $b->judul }}</td>
                                    <td>{{ $b->kategori }}</td>
                                    <td>{{ $b->pengarang }}</td>
                                    <td>{{ $b->stok }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center p-4 text-muted">Belum ada data koleksi buku.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                @if($buku->count() > 0)
                    <div class="card-footer bg-white p-3">
                        <button type="submit" class="btn btn-danger btn-sm">🗑️ Hapus Buku yang Dipilih (Bulk Delete)</button>
                    </div>
                @endif
            </div>
        </form>
    </div>

    <script>
        document.getElementById('checkAll').onclick = function() {
            var checkboxes = document.getElementsByName('ids[]');
            for (var checkbox of checkboxes) {
                checkbox.checked = this.checked;
            }
        }
    </script>
</body>
</html>