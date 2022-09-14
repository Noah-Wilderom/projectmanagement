<!DOCTYPE html>
<html class="h-full" lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="icon" href="{{ asset('images/logo.png') }}" type="image/png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <title>{{ config('app.name') }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/sass/_app.scss'])
    @stack('styles')
</head>

<body class="h-full">
    <div id="app">
        <div id="app-container">
            <div>
                {{-- <div class="fixed top-0 left-0 w-1/2 h-full bg-white" aria-hidden="true"></div>
                <div class="fixed top-0 right-0 w-1/2 h-full bg-gray-50" aria-hidden="true"></div> --}}
                <div class="relative min-h-full flex flex-col">
                    <!-- Navbar -->
                    <navigation ></navigation>
                    @yield('content')
                </div>
            </div>
        </div>

        @include ('layouts.partials.notifications')
    </div>




    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    @stack('scripts')
</body>

</html>
