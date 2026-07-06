public function index() {
    return view('dashboard');
}

<div class="row mt-4">
    <div class="col-md-4">
        <div class="card bg-info text-white p-3">
            <h5>Total Anggota</h5>
            <h3>{{ $data['total_anggota'] }}</h3>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card bg-primary text-white p-3">
            <h5>Anggota Aktif</h5>
            <h3>{{ $data['anggota_aktif'] }}</h3>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card bg-secondary text-white p-3">
            <h5>Anggota Non-Aktif</h5>
            <h3>{{ $data['anggota_nonaktif'] }}</h3>
        </div>
    </div>
</div>