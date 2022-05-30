<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="Tincan Island Container Terminal Export Arrival Notification">
        <meta name="author" content="Tict Nerds">

        <title>TICT Export Arrival Notification</title>
        <link rel="icon" href="{{ asset('img/favicon.ico') }}" type="image/x-icon" />
        <!-- vendor css -->
        <link href="{{asset('lib/font-awesome/css/font-awesome.css')}}" rel="stylesheet">
        <link href="{{asset('lib/Ionicons/css/ionicons.css')}}" rel="stylesheet">
        <link href="{{asset('lib/SpinKit/css/spinkit.css')}}" rel="stylesheet">
        <link rel="stylesheet" href="{{asset('css/slim.css')}}">
        @yield('style')
    </head>
    <body>
        @yield('content')
        <script src="{{ asset('lib/jquery/js/jquery.js')}}"></script>
        <script src="{{ asset('lib/popper.js/js/popper.js')}}"></script>
        <script src="{{ asset('lib/bootstrap/js/bootstrap.js')}}"></script>
        <script src="{{ asset('js/slim.js')}}"></script>
        @yield('innerscript')
        <script src="{{ asset('js/script.js')}}"></script>

    </body>
</html>
