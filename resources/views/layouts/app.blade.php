<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Statist</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('bootadmin/css/bootadmin.css') }}">
    <link rel="stylesheet" href="{{ asset('bootadmin/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('bootadmin/css/fontawesome-all.css') }}">
    <link rel="stylesheet" href="{{ asset('bootadmin/css/datatables.css') }}">
    <link rel="stylesheet" href="{{ asset('bootadmin/css/fullcalendar.css') }}">
    <link rel="stylesheet" href="{{ asset('bootadmin/css/bootadmin.css') }}">
</head>
<body>

@include('layouts.header')

@auth
    @include('layouts.flash-message')

    <div class="d-flex">

        @auth
            @include('layouts.menu')
        @endauth

        @yield('content')

    </div>
@else
    @yield('content')
@endauth

<script src="{{ asset('bootadmin/js/jquery.min.js') }}"></script>
<script src="{{ asset('bootadmin/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('bootadmin/js/datatables.min.js') }}"></script>
<script src="{{ asset('bootadmin/js/moment.min.js') }}"></script>
<script src="{{ asset('bootadmin/js/fullcalendar.min.js') }}"></script>
<script src="{{ asset('bootadmin/js/bootadmin.min.js') }}"></script>

</body>
</html>
