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
                        <h1>20+</h1>
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
                        <h1>20+</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('components.form-vaksin')
@endsection