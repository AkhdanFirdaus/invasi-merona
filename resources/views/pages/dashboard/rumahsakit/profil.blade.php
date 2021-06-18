@extends('layouts.dashboard')

@push('nav')
<li class="breadcrumb-item active">Profil Rumah Sakit</li>
@endpush

@section('content')
<h1 class="text-center">Profil</h1>
<div class="row mb-4">
    <div class="col-md-4 offset-md-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Data RS</h5>
                <ul>
                    <li>Nama: {{ $rs->name }}</li>
                    <li>Alamat: {{ $rs->address }}</li>
                    <li>Quota: {{ $rs->address }}</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="row mb-4">
    <div class="col-md-4 offset-md-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Jadwal RS</h5>
                <ul class="list-group">
                    @foreach ($jadwals as $jadwal)
                    <li class="list-group-item">
                        <ul>
                            <li>Hari: {{ $jadwal->day }}</li>
                            <li>Jam Buka: {{ $jadwal->start }}</li>
                            <li>Jam Tutup: {{ $jadwal->end }}</li>
                        </ul>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="row mb-4">
    <div class="col-md-4 offset-md-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Admin</h5>
                <ul>
                    <li>Nama: {{ auth()->user()->name }}</li>
                    <li>Alamat: {{ auth()->user()->address }}</li>
                    <li>Email: {{ auth()->user()->email }}</li>
                    <li>No Telp: {{ auth()->user()->no_telp }}</li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection
