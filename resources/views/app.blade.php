<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
{{--        <link href="https://fonts.googleapis.com/css2?family=Istok+Web&family=Josefin+Sans:wght@300&family=Urbanist:wght@600&family=Work+Sans:wght@300;600&display=swap" rel="stylesheet">--}}
        <link href="https://fonts.googleapis.com/css2?family=Cabin:wght@400;700&family=Martel+Sans&family=Overpass:wght@300;600&display=swap" rel="stylesheet">

        @routes
        @vite('resources/css/app.css')
        @vite('resources/js/app.js')
        @inertiaHead
    </head>
    <body>
        @inertia
    </body>

    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-9Z9RBQCYFD"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'G-9Z9RBQCYFD');
    </script>
</html>
