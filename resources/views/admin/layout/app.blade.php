<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title> @yield('tittle')</title>
    @include('admin.layout.scripts')
    @include('admin.layout.style')
</head>
<body >
    @include('admin.layout.nav')
    @yield('content')


</body>
</html>
