<div class="row">
    @foreach($daftar_buku as $buku)
        <div class="col-md-4">
            {{-- Iki cara manggil komponen BukuCard --}}
            <x-buku-card :buku="$buku" />
        </div>
    @endforeach
</div>