<!doctype html>
<html class="no-js">
    <head>
        <meta charset="utf-8">
        <title>
            @yield('title', 'Panel de ejemplo')
        </title>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

        <!-- Place favicon's in the root directory -->
        <link rel="shortcut icon" type="image/png" href="/favicon.png">

        <!-- styles -->
        <link href="/assets/css/bootstrap.css" rel="stylesheet" type="text/css" />

    </head>

    <body class="home">

        @yield('header', '')

        @yield('content', '')

        @yield('footer', '')

        <!-- scripts -->
        <script src="/assets/js/jquery.js"></script>
        <script src="/assets/js/bootstrap.js"></script>

    </body>
</html>
