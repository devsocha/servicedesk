<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title> @yield('tittle')</title>
    @include('general.layout.scripts')
    @include('general.layout.style')
</head>
<body >
<div class="container-fluid">


    @include('general.layout.nav')
    @yield('content')
</div>
</body>
