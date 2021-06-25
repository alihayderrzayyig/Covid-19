<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link href="{{ asset('admin/css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/css/all.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/css/adminStyle.css') }}" rel="stylesheet">
    @yield('css')

    <title>لوحة التحكم</title>
</head>

<body>

    <header>
        @yield('header')
    </header>


    <nav class="flex-row-reverse navbar navbar-light nav-secondary">
        <a class="navbar-brand" href="{{ route('home') }}">Covid-19</a>
        {{-- <a href="#"> --}}
            {{-- sssss --}}
            {{-- <i class="fas fa-bell @if (auth()->user()->unreadNotifications->count()) alert @endif"></i> --}}
            {{-- {{ auth()->user()->unreadNotifications->count() }} --}}
        {{-- </a> --}}
    </nav>


    <main>
        @yield('content')
    </main>

    <footer class="p-4 text-center footer">
        <h5 class="mt-4 mb-0 text-center">
            Covid-19 &copy; for University of Anbar
        </h5>
    </footer>



    <script src="{{ asset('js/jquery-3.5.1.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    @yield('js')

</body>

</html>
