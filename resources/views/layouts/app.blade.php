<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Invasi Merona</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <style>
        body {
            background-color: #f5f5f5;
        }
    </style>
    @stack('style')
</head>

<body>
    @auth()
    @include('components.sidebar')
    @endauth
    <div class="container my-3">
        @yield('layout-content')
    </div>
    <script src="{{ mix('js/app.js') }}"></script>
    @stack('script')
</body>

</html>
