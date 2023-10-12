<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Kos</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">
    @include('includes.home.style')
    
</head>
<body class="bg-white">
    @include('includes.home.navbar')
    @yield('content')
    @include('includes.backend.script')
    @include('includes.home.footer')
</body>