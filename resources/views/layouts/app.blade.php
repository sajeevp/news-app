<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="{{ asset('js/app.js') }}"></script>
    <title>News app</title>
</head>

<body class="bg-gray-100">

    @include('layouts.header')
    <div class="container mx-auto px-4">
        @yield('content')
    </div> 
    
</body>

</html>
