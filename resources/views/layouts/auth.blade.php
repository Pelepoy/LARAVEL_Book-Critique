<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <script src="//unpkg.com/alpinejs" defer></script>
</head>

<body>
    <x-success />
    <div>
        @yield('content')
    </div>
</body>
</html>
