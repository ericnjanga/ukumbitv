<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{asset('r/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('r/css/style.css')}}">
    <link>
</head>
<body>
@include('r.chunks._header_main')
<main>
    @yield('content')
</main>
@include('r.chunks._footer_main')

</body>

</html>