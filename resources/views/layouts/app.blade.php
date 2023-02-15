<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>
            @yield('title', 'Dc Comics')
        </title>
        @vite('resources/js/app.js')
    </head>
    <body>
        @yield('main-app')

        @yield("scripts")
    </body>
</html>