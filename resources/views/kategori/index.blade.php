@extends('layouts.app')

@section('title', 'Daftar Kategori')

@section('content')
<div class="row mb-4 align-items-center">
    <div class="col-md-6">
        <h3>Daftar Kategori Buku</h3>
    </div>
    <div class="col-md-6 text-end">
        <div class="input-group">
            <input type="text" id="keyword" class="form-control" placeholder="Ketik keyword (misal: Programming)...">
            <button class="btn btn-primary" onclick="keHalamanSearch()">Cari</button>
        </div>
    </div>
</div>

<div class="row">
    @foreach($kategori_list as $kat)
    <div class="col-md-4 mb-4">
        <div class="card h-100 shadow-sm">
            <div class="card-body">
                <h5 class="card-title text-primary">{{ $kat['nama'] }}</h5>
                <p class="card-text text-muted">{{ $kat['deskripsi'] }}</p>
                <p class="mb-0"><span class="badge bg-secondary">Jumlah: {{ $kat['jumlah_buku'] }} Buku</span></p>
            </div>
            <div class="card-footer bg-white">
                <a href="{{ route('kategori.show', $kat['id']) }}" class="btn btn-sm btn-outline-primary w-100">Lihat Detail</a>
            </div>
        </div>
    </div>
    @endforeach
</div>

<script>
    function keHalamanSearch() {
        let kw = document.getElementById('keyword').value;
        if(kw) {
            window.location.href = "{{ url('/kategori/search') }}/" + kw;
        }
    }
</script>
@endsection