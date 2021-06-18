@extends('layouts.home')

@section('content')
<div class="mt-4">
    <h1>{{ $artikel->title }}</h1>
    <hr>
    <div class="bg-white p-5">
        {!! $artikel->content !!}
    </div>
</div>
@endsection
