<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>
        @php
        echo App\Config::first()->name
        @endphp
    </title>

    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <!-- Web Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap">
</head>

<body>
    <div id="app">
        <router-view></router-view>

    </div>

    <script src="{{asset('js/app.js')}}"></script>
</body>

</html>