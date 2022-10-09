<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <title>READY</title>
        @viteReactRefresh
        @vite(["resources/js/app.tsx", "resources/sass/app.scss"])
        @inertiaHead
    </head>
    <body>
        @inertia
    </body>
</html>
