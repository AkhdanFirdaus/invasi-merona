@extends('layouts.home')


@section('content')
<div class="row row-cols-1 row-cols-md-2 g-4 mt-2">
    <div class="col">
        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="flex-shrink-0">
                        <i class="fas fa-list fa-4x"></i>
                    </div>
                    <div class="flex-grow-1 ms-3">
                        <h5>Jenis Vaksin</h5>
                        <h1>{{ count($vaksins) }}</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="flex-shrink-0">
                        <i class="fas fa-user-friends fa-4x"></i>
                    </div>
                    <div class="flex-grow-1 ms-3">
                        <h5>Jumlah Tervaksin</h5>
                        <h1>10</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<hr class="my-4 border-top">
<h3>Daftar Vaksin</h3>

<div class="row row-cols-1 row-cols-md-3 g-4 my-3">
    @if (count($vaksins) > 0)
    @foreach ($vaksins as $vaksin)
    <div class="col">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{ $vaksin->name }}</h5>
                <p class="card-text">{{ $vaksin->description }}</p>
            </div>
        </div>
    </div>
    @endforeach
    @else
    <div class="col">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Tidak ada data vaksin</h5>
            </div>
        </div>
    </div>
    @endif

    @include('components.form-vaksin')
    @endsection
