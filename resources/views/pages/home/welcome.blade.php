@extends('layouts.home')
@section('content')
<div class="row row-cols-1 row-cols-md-2 g-4 my-3">
    <div class="col">
        <div class="card shadow-sm">
            <div class="card-body">
                <h2 class="card-title">Daftar Vaksin</h2>
                <p class="card-text">Daftar vaksin sebagai langkah pencegahan penyebaran virus Covid 19</p>
                <a href="{{ url('/daftar') }}" class="btn btn-primary">Daftar
                    Sekarang</a>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card shadow-sm">
            <div class="card-body">
                <h2 class="card-title">Cek Jadwal</h2>
                <p class="card-text">Lihat jadwal pendaftaran Anda.</p>
                <div class="input-group">
                    <input type="text" class="form-control" id="kode-daftar" />
                    <button class="btn btn-outline-secondary" type="submit" id="cari-daftar">Cari</button>
                </div>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card shadow-sm">
            <div class="card-body">
                <h2 class="card-title"><i class="fas fa-info-circle"></i> Informasi Covid</h2>
                <p class="card-title small">Dimuat pada: <div id="load-time"></div>
                </p>
                <div class="row row-cols-1 row-cols-md-2 g-2 my-3">
                    <div class="col">
                        <div class="card bg-warning">
                            <div class="card-body text-center">
                                <h5 class="card-title">Positif</h5>
                                <h2 id="covid-positif">Loading</h2>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card text-white bg-primary">
                            <div class="card-body text-center">
                                <h5 class="card-title">Sembuh</h5>
                                <h2 id="covid-sembuh">Loading</h2>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card text-white bg-danger">
                            <div class="card-body text-center">
                                <h5 class="card-title">Meninggal</h5>
                                <h2 id="covid-meninggal">Loading</h2>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card bg-light">
                            <div class="card-body text-center">
                                <h5 class="card-title">Dirawat</h5>
                                <h2 id="covid-dirawat">Loading</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card shadow-sm">
            <div class="card-body">
                <h2 class="card-title">Informasi</h2>
                <ul class="list-group my-3">
                    @if (count($artikels) > 0)
                    @foreach ($artikels as $artikel)
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <div class="me-auto">
                            <strong class="d-block">{{ $artikel->title }}</strong>
                            <small>Author: {{ $artikel->name }}</small>
                        </div>
                        <a href="{{ url('/artikel', $artikel->id) }}" class="btn btn-link">See</a>
                    </li>
                    @endforeach
                    @else
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        Tidak ada artikel
                    </li>
                    @endif
                </ul>
                <div class="d-grid">
                    <a href="{{ url('/artikel') }}" class="btn btn-primary">Lihat Selengkapnya</a>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- @include('components.form-daftar') --}}
@push('script')
<script>
    axios.get('/api/covid-summary').then(function(response) {
            console.log(response.data);
            document.getElementById('covid-positif').innerHTML = response.data[0]['positif'];
            document.getElementById('covid-sembuh').innerHTML = response.data[0]['sembuh'];
            document.getElementById('covid-meninggal').innerHTML = response.data[0]['meninggal'];
            document.getElementById('covid-dirawat').innerHTML = response.data[0]['dirawat'];
            document.getElementById('load-time').innerHTML = Date();
        });

    document.getElementById('cari-daftar').addEventListener('click', function() {
        let kode = document.getElementById('kode-daftar').value;
        window.location.href = `/daftar/${kode}/berhasil`;
    })
</script>
@endpush
@endsection
