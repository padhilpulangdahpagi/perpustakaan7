@extends('layouts.app')

@section('title', 'Detail Anggota')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card shadow-sm">
            <div class="card-header bg-info text-white">
                <h5 class="mb-0">Detail Lengkap Anggota</h5>
            </div>
            <div class="card-body">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><strong>Kode Anggota:</strong> <span class="badge bg-secondary">{{ $anggota['kode'] }}</span></li>
                    <li class="list-group-item"><strong>Nama Lengkap:</strong> {{ $anggota['nama'] }}</li>
                    <li class="list-group-item"><strong>Email:</strong> {{ $anggota['email'] }}</li>
                    <li class="list-group-item"><strong>Telepon:</strong> {{ $anggota['telepon'] }}</li>
                    <li class="list-group-item"><strong>Alamat:</strong> {{ $anggota['alamat'] }}</li>
                    <li class="list-group-item"><strong>Status:</strong> 
                        <span class="badge bg-{{ $anggota['status'] == 'Aktif' ? 'success' : 'danger' }}">
                            {{ $anggota['status'] }}
                        </span>
                    </li>
                </ul>
            </div>
            <div class="card-footer bg-light text-end">
                <a href="{{ route('anggota.index') }}" class="btn btn-secondary">Kembali ke Daftar</a>
            </div>
        </div>
    </div>
</div>
@endsection