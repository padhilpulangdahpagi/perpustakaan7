@extends('layouts.app')

@section('title', 'Hasil Pencarian')

@section('content')
<div class="mb-4">
    <a href="{{ route('kategori.index') }}" class="btn btn-secondary btn-sm">← Kembali</a>
    <h4 class="mt-3">Hasil Pencarian Kategori untuk: <span class="text-danger">"{{ $keyword }}"</span></h4>
</div>

<div class="row">
    @forelse($hasil_pencarian as $kat)
    <div class="col-md-4 mb-4">
        <div class="card h-100 shadow-sm border-warning">
            <div class="card-body">
                <h5 class="card-title text-primary">
                    {!! str_ireplace($keyword, "<mark class='bg-warning'>$keyword</mark>", $kat['nama']) !!}
                </h5>
                <p class="card-text text-muted">
                    {!! str_ireplace($keyword, "<mark class='bg-warning'>$keyword</mark>", $kat['deskripsi']) !!}
                </p>
            </div>
            <div class="card-footer bg-white">
                <a href="{{ route('kategori.show', $kat['id']) }}" class="btn btn-sm btn-outline-primary w-100">Lihat Detail</a>
            </div>
        </div>
    </div>
    @empty
    <div class="col-12">
        <div class="alert alert-warning text-center">
            Kategori dengan kata kunci "{{ $keyword }}" tidak ditemukan!
        </div>
    </div>
    @endforelse
</div>
@endsection