<!doctype html>
<html lang="{{ str_replace('_', '-p', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>TASK</title>

    <!-- Styles -->
    <link href="{{asset('css/app.css') }}" rel="stylesheet">
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">
</head>
<body>

@yield('content')

<script type="text/javascript" src="{{asset('js/app.js')}}"></script>
</body>
</html>
