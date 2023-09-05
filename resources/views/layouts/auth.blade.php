<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('assets/logo-eventplan-sm.png') }}" />
    <link rel="icon" type="image/png" href="{{ asset('assets/logo-eventplan-sm.png') }}" />
    <title>
        @yield('title')
    </title>
    @include('includes.auth.styles')
</head>

<body class="">
    @yield('content')
</body>

</html>