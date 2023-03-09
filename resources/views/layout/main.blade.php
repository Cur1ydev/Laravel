<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Autima - Car Accessories Shop HTML Template </title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/img/favicon.ico')}}">
    @include('layout.css')
</head>
<body>
@include('layout.header')
@yield('content')
@include('layout.footer')
@include('layout.js')
</body>
</html>
