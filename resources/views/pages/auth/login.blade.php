@extends('layouts.app')

@push('style')
<style>
    html,
    body {
        height: 100%;
    }

    body {
        display: flex;
        align-items: center;
        padding-top: 40px;
        padding-bottom: 40px;
    }

    .form-signin {
        width: 100%;
        max-width: 330px;
        padding: 15px;
        margin: auto;
    }

    .form-signin .checkbox {
        font-weight: 400;
    }

    .form-signin .form-floating:focus-within {
        z-index: 2;
    }

    .form-signin input[type="email"] {
        margin-bottom: -1px;
        border-bottom-right-radius: 0;
        border-bottom-left-radius: 0;
    }

    .form-signin input[type="password"] {
        margin-bottom: 10px;
        border-top-left-radius: 0;
        border-top-right-radius: 0;
    }
</style>
@endpush

@section('layout-content')
<main class="form-signin text-center card">
    <form class="card-body" method="POST" action="{{ url('/login') }}">
        @if (session('errors'))
        <div class="mb-4 alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Login Gagal</strong>
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <h1 class="h3 mb-3 fw-normal">Sign in</h1>
        @csrf
        <div class="form-floating">
            <input type="email" class="form-control" id="floatingInput" placeholder="name@email.com" name="email">
            <label for="floatingInput">Email address</label>
        </div>
        <div class="form-floating">
            <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password">
            <label for="floatingPassword">Password</label>
        </div>

        <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
    </form>
</main>
@endsection
