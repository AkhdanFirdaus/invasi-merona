@extends('layouts.dashboard')

@push('nav')
<li class="breadcrumb-item active">Profil</li>
@endpush

@section('content')
<h1 class="text-center">Profil</h1>
<div class="row mb-4">
    <div class="col-md-4 offset-md-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Data Diri</h5>
                <ul>
                    <li>Nama: {{ auth()->user()->name }}</li>
                    <li>Alamat: {{ auth()->user()->address }}</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="row mb-4">
    <div class="col-md-4 offset-md-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Kontak</h5>
                <ul>
                    <li>Email: {{ auth()->user()->email }}</li>
                    <li>No Telp: {{ auth()->user()->no_telp }}</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="row mb-4">
    <div class="col-md-4 offset-md-4">
        <div class="d-grid">
            <a href="{{ url('/logout') }}" class="btn btn-danger">Logout</a>
        </div>
    </div>
</div>

@endsection
