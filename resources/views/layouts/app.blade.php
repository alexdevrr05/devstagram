<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @vite('resources/css/app.css')

    <title>Devstagram | @yield('title')</title>


</head>

<body>
    <h1 class="text-4xl font-extrabold">Hello world</h1>
    <hr />
</body>

</html>