@extends('layouts.dashboard')
@push('nav')
<li class="breadcrumb-item"><a href="{{ route('vaksin.index') }}">vaksin</a></li>
<li class="breadcrumb-item active">@if(isset($vaksin)) Edit @else Tambah @endif</li>
@endpush

@section('content')
<div class="mt-4">
    <form action="@if(isset($vaksin)){{ route('vaksin.update', $vaksin->id) }}@else{{ route('vaksin.store') }}@endif"
        method="POST">
        @csrf
        @if (isset($vaksin))
        <input type="hidden" name="_method" value="PUT">
        @endif
        <div class="form-group">
            <label for="name">Nama Vaksin</label>
            <input type="text" class="form-control" name="name" value="@if(isset($vaksin)){{ $vaksin->name }}@endif">
        </div>
        <div class="form-group">
            <label for="description">Deskripsi Vaksin</label>
            <textarea name="description" id="mytextarea" cols="30" rows="10"
                class="form-control">@if(isset($vaksin)){!! $vaksin->description !!}@endif</textarea>
        </div>
        <div class="mt-4 d-grid gap-2 d-md-flex justify-content-md-end">
            <button class="btn btn-danger" type="reset">Reset</button>
            <button class="btn btn-primary" type="submit">Submit</button>
        </div>
    </form>
</div>

@endsection
