@extends('layouts.app')
@section('layout-content')
@if(url()->current() !== url('/login'))
@include('components.navbar')
@endif
@yield('content')
@endsection
