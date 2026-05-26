@extends('layouts.app')

@section('title', 'Daftar Anggota')

@section('content')
<div class="card shadow-sm">
    <div class="card-header bg-primary text-white">
        <h4 class="mb-0">Daftar Anggota Perpustakaan</h4>
    </div>
    <div class="card-body">
        <table class="table table-striped table-hover">
            <thead class="table-dark">
                <tr>
                    <th>No</th>
                    <th>Kode Anggota</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($anggota_list as $agt)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td><span class="badge bg-secondary">{{ $agt['kode'] }}</span></td>
                    <td>{{ $agt['nama'] }}</td>
                    <td>{{ $agt['email'] }}</td>
                    <td>
                        <span class="badge bg-{{ $agt['status'] == 'Aktif' ? 'success' : 'danger' }}">
                            {{ $agt['status'] }}
                        </span>
                    </td>
                    <td>
                        <a href="{{ route('anggota.show', $agt['id']) }}" class="btn btn-sm btn-info text-white">Detail</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection