<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Required meta tags -->

    <title>Carbon Stock Admin</title>

    @stack('before-style')

    @include('includes.style')

    @stack('after-style')

</head>

<body>

    @yield('content')

    @stack('before-script')

    @include('includes.script')

    @stack('after-script')


</body>

</html>
