<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('Judul')</title>
    <link rel="shortcut icon" href="{{ asset('assets/gambar/produksi.png') }}">
    {{-- Bootstrap 4.6 --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
        integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous">
    </script>

    {{-- bootstrap 5 --}}
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous">
    </script> --}}

    {{-- CSS manual --}}
    <link rel="stylesheet" href="/assets/css/home.css">
</head>

<body>

    <nav class="navbar navbar-light bg-light" style="margin-bottom: 1em">
        <a class="navbar-brand" href="{{ route('home') }}">
            <img src="{{ asset('assets/gambar/produksi.png') }}" width="30" height="30"
                class="d-inline-block align-top" alt="">
            Production
        </a>
        <a href="{{ route('produksi.index') }}" class="nav-link">
            Produksi
        </a>
        <a href="{{ route('keuangan') }}" class="nav-link">
            Keuangan
        </a>
        <a href="{{ route('karyawan') }}" class="nav-link">
            Karyawan
        </a>
        <a href="#">
            <span class="navbar-text">
                About us
            </span>
        </a>
    </nav>

    <div class="container h-100">
        @yield('Konten')
    </div>

</body>

</html>
