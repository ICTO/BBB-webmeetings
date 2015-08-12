<!DOCTYPE html>
<html>
    <head>
        <title>Webmeetings</title>

        <link href="//fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
        <link href="{{ elixir('css/app.css') }}" rel="stylesheet" type="text/css"></script>

        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body id="page-top" data-spy="scroll" data-target=".navbar-custom">
        @include('header')
        <div class="container meeting-container">
            @include('flash::message')
            @yield('content')
        </div>
        @include('footer')
        <script src="{{ elixir('js/vendor.js') }}"></script>
        <script src="{{ elixir('js/app.js') }}"></script>
    </body>
</html>
