<div class="card h-100 shadow-sm">
    <div class="card-body d-flex flex-column">
        <div class="d-flex justify-content-between align-items-start mb-2">
            <span class="badge bg-secondary">{{ $buku->kategori->nama_kategori ?? 'Umum' }}</span>
            <span class="badge {{ str_contains($buku->tahun_label, 'Baru') ? 'bg-info text-dark' : 'bg-light text-muted' }}">
                {{ $buku->tahun_label }}
            </span>
        </div>
        
        <h5 class="card-title text-primary font-weight-bold mb-1">{{ $buku->judul }}</h5>
        <h6 class="card-subtitle mb-3 text-muted">Oleh: {{ $buku->penulis ?? $buku->pengarang }}</h6>
        
        <p class="card-text text-muted small flex-grow-1">
            Penerbit: {{ $buku->penerbit ?? '-' }} <br>
            Tahun Terbit: {{ $buku->tahun_terbit ?? $buku->tahun }}
        </p>

        <div class="mt-3 pt-2 border-top d-flex justify-content-between align-items-center">
            <small class="text-muted">Stok: <strong class="text-dark">{{ $buku->stok }}</strong></small>
            {!! $buku->status_stok_badge !!}
        </div>

        <!-- Tombol Action Sesuai Request Tugas 2 -->
        @if($showActions)
            <div class="d-grid gap-2 mt-3">
                <a href="{{ url('/buku/'.$buku->id) }}" class="btn btn-sm btn-outline-primary">
                    <i class="bi bi-eye"></i> Detail Buku
                </a>
            </div>
        @endif
    </div>
</div>