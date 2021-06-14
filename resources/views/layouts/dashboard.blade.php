@extends('layouts.app')
@section('layout-content')
<div class="d-flex justify-content-end">
    <a class="nav-link dropdown-toggle" data-bs-toggle="offcanvas" href="#sidebar" role="button"
        aria-controls="sidebar">
        {{auth()->user()->name}}
    </a>
</div>
<nav aria-label="breadcrumb" class="bg-white rounded">
    <ol class="breadcrumb p-3">
        <li class="breadcrumb-item"><a href="{{ url('/') }}">@yield('nav-lead', 'Dashboard')</a></li>
        @stack('nav')
    </ol>
</nav>

@yield('content')
@endsection
