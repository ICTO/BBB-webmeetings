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
        @if ( Config::get('tracking.enable') )
            <!-- Piwik -->
            <script type="text/javascript">
              var _paq = _paq || [];
              _paq.push(["trackPageView"]);
              _paq.push(["enableLinkTracking"]);

              (function() {
                var u=(("https:" == document.location.protocol) ? "https" : "http") + "://{{ Config::get('tracking.url')  }}";
                _paq.push(["setTrackerUrl", u+"piwik.php"]);
                _paq.push(["setSiteId", "{{ Config::get('tracking.site_id') }}"]);
                var d=document, g=d.createElement("script"), s=d.getElementsByTagName("script")[0]; g.type="text/javascript";
                g.defer=true; g.async=true; g.src=u+"piwik.js"; s.parentNode.insertBefore(g,s);
              })();
            </script>
            <!-- End Piwik Code -->
    @endif
    </body>
</html>
