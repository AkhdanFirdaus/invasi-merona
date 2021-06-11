@extends('layouts.app')

@section('content')
<div class="p-5 mb-4 my-3">
    <div class="container-fluid py-5 text-center">
        <h1 class="display-5 fw-bold">Article</h1>
        <p class="fs-4">Cari artikel seputar Vaksin dan Covid 19.</p>
        <div class="card mt-3 shadow border-0 w-50 mx-auto">
            <div class="card-body">
                <div class="input-group">
                    <input type="text" class="form-control" />
                    <div class="mx-2"></div>
                    <button class="btn btn-primary px-3" type="button" id="inputGroupFileAddon04">Cari</button>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row row-cols-1 row-cols-md-3 g-4 my-3">
    @for ($i = 1; $i <= 6; $i++)
    <div class="col">
        <div class="card">
            <img src="https://picsum.photos/seed/picsum/400/200" class="card-img-top" alt="img">
            <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <a href="{{ url("/artikel/$i") }}" class="card-link btn btn-primary stretched-link">See Detail</a>
                <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
            </div>
        </div>
    </div>
    @endfor
</div>
@endsection
