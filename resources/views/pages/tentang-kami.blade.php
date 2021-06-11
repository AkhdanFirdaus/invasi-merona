@php
$teams = [
    [
        'name' => 'Akhdan MF',
        'nim' => '1197050010'
    ],
    [
        'name' => 'Aliman',
        'nim' => '1197050010'
    ],
    [
        'name' => 'Fakhri',
        'nim' => '1197050010'
    ],
    [
        'name' => 'Haruna',
        'nim' => '1197050010'
    ],
    [
        'name' => 'Reyhan',
        'nim' => '1197050010'
    ],
]
@endphp

@extends('layouts.app')
@section('content')
<div class="p-5 mb-4 bg-white rounded-3 my-3">
    <div class="container-fluid py-5">
        {{-- <div class="row">
            <div class="col-md-9"> --}}
        <h1 class="display-5 fw-bold">Our Team</h1>
        {{-- </div> --}}
        {{-- <div class="col-md-3">
                <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="https://picsum.photos/seed/picsum/200" class="img-fluid rounded-circle" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="https://picsum.photos/200?grayscale" class="img-fluid rounded-circle" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="https://picsum.photos/200?blur" class="img-fluid rounded-circle" alt="...">
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
        <div class="row row-cols-1 row-cols-md-3 g-4 mt-4">
            @foreach ($teams as $team)
            <div class="col">
                <div class="card"">
                    <img src="https://picsum.photos/200?grayscale" class="card-img-top" alt="...">
                    <div class="card-body">
                        <div class="card-title">{{ $team['name'] }}</div>
                        <div class="card-text">{{ $team['nim'] }}</div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
