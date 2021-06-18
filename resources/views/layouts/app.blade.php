<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />

    {{-- <link
      href="https://fonts.googleapis.com/css?family=Work+Sans:100,200,300,400,500,600,700,800,900"
      rel="stylesheet"
    /> --}}


    {{-- fontawesome --}}
    <link rel="stylesheet" href="{{ asset('css/all.css') }}" />
    {{-- <link rel="stylesheet" href="{{ asset('css/normalize.css') }}" /> --}}
    {{-- bootstrap5 --}}
    <link rel="stylesheet" href="{{ asset('css/app.css') }}" />
    {{-- my css --}}
    <link rel="stylesheet" href="{{ asset('css/myStyle.css') }}" />
    {{-- <link rel="shortcut icon" href="img/favicon.png" type="image/png" /> --}}

    @yield('css')

    <title>Covid-19</title>
  </head>
  <body>

    @yield('content')

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <!-- <script src="style/js/jquery/jquery-3.4.1.js"></script> -->

    <script src="{{ asset('style/js/popper.js') }}"></script>
    <script src="{{ asset('style/js/bootstrap-js/bootstrap.min.js') }}"></script>
    <!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script> -->

    <script src="{{ asset('style/js/myjs.js') }}"></script>
    @yield('js')

    <!-- <script src="style/js/functions.js"></script> -->
  </body>
</html>
