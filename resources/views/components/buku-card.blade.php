<div class="card mb-3">
    <div class="card-body">
        <h5 class="card-title">{{ $buku->judul }}</h5>
        <p class="card-text">Pengarang: {{ $buku->pengarang }}</p>
        <!-- Nampilake status badge saka model Buku -->
        {!! $buku->status_stok_badge !!}
    </div>
</div>