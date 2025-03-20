<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
        <link rel="stylesheet" href={{ asset('css/style.css') }}>
        @vite(['resources/css/app.css','resources/js/app.js'])
    </head>
    <body class="bg-gray-50 h-fit overflow-x-hidden">
        <x-navbar />
        {{ $slot }}
        <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
        <script src={{ asset('js/index.js') }}></script>
    </body>
</html>