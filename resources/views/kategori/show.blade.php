@extends('layouts.app')

@section('title', 'Detail Kategori')

@section('content')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('kategori.index') }}">Kategori</a></li>
    <li class="breadcrumb-item active" aria-current="page">{{ $kategori['nama'] }}</li>
  </ol>
</nav>

<div class="card shadow-sm mb-4">
    <div class="card-body bg-light">
        <h4>Kategori: {{ $kategori['nama'] }}</h4>
        <p class="text-muted mb-0">{{ $kategori['deskripsi'] }}</p>
    </div>
</div>

<div class="card shadow-sm">
    <div class="card-header bg-secondary text-white">
        <h5 class="mb-0">Tabel Buku Dalam Kategori</h5>
    </div>
    <div class="card-body">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th width="10%">No</th>
                    <th>Judul Buku</th>
                </tr>
            </thead>
            <tbody>
                @foreach($buku_list as $buku)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td><strong>{{ $buku }}</strong></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection