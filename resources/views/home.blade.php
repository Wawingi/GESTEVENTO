<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
        <meta name="author" content="Coderthemes">

        <link rel="shortcut icon" href="{{ url('images/favicon.ico') }}">

        <title>GESTEVENTO</title>
        
        <link href="{{ url('plugins/switchery/switchery.min.css') }}" rel="stylesheet" type="text/css"/>
        <link href="{{ url('plugins/jquery-circliful/css/jquery.circliful.css') }} " rel="stylesheet" type="text/css"/>
        <link href="{{ url('plugins/switchery/switchery.min.css') }}" rel="stylesheet" type="text/css"/>
        <link href="{{ url('css/bootstrap.min.css') }}" rel="stylesheet" type="text/css"/>
		<link href="{{ url('css/icons.css') }}" rel="stylesheet" type="text/css"/>
		<link href="{{ url('css/style.css') }}" rel="stylesheet" type="text/css"/>
        <link href="{{ asset('css/all.css') }}" rel="stylesheet" type="text/css"/> 
        <link href="{{ asset('css/fontawesome.css') }}" rel="stylesheet" type="text/css"/> 
    </head>

    <body class="fixed-left">

        <!-- Begin page -->
        <div id="wrapper">

            <!-- ========== Inclusão do menu Bar ========== -->
            @include('menubar')
            <!-- ========== Inclusão do menu lateral ====== -->
            @include('menulateral')
            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->                      
            @yield('content')
            
            <!-- end content -->
            <footer class="footer">
                2019 © GESTEVENTO
            </footer>
        </div>
    </div>
    <!-- END wrapper -->
    <script>
        var resizefunc = [];
    </script>
    <!-- Plugins  -->
    
    <script src="{{ url('js/modernizr.min.js') }}" type="text/javascript"></script>       
    <script src="{{ url('js/jquery.min.js') }}"></script>
    <script src="{{ url('js/popper.min.js') }}"></script><!-- Popper for Bootstrap -->
    <script src="{{ url('js/bootstrap.min.js') }}"></script>
    <script src="{{ url('js/detect.js') }}"></script>
    <script src="{{ url('js/fastclick.js') }}"></script>
    <script src="{{ url('js/jquery.slimscroll.js') }}"></script>
    <script src="{{ url('js/jquery.blockUI.js') }}"></script>
    <script src="{{ url('js/waves.js') }}"></script>
    <script src="{{ url('js/wow.min.js') }}"></script>
    <script src="{{ url('js/jquery.nicescroll.js') }}"></script>
    <script src="{{ url('js/jquery.scrollTo.min.js') }}"></script>

    <!-- Counter Up  -->
    <script src="{{ url('plugins/waypoints/lib/jquery.waypoints.min.js') }}" type="text/javascript"></script>
    <script src="{{ url('plugins/counterup/jquery.counterup.min.js') }}" type="text/javascript"></script>

    <!-- circliful Chart -->
    <script src="{{ url('plugins/jquery-circliful/js/jquery.circliful.min.js') }}" type="text/javascript"></script>
    <script src="{{ url('plugins/jquery-sparkline/jquery.sparkline.min.js') }}" type="text/javascript"></script>

    <!-- skycons -->
    <script src="{{ url('plugins/skyicons/skycons.min.js') }}" type="text/javascript"></script>

    <!-- Page js  -->
    <script src="{{ url('pages/jquery.dashboard.js') }}" type="text/javascript"></script>        

    <!-- Custom main Js -->
    <script src="{{ url('js/jquery.core.js') }}" type="text/javascript"></script>
    <script src="{{ url('js/jquery.app.js') }}" type="text/javascript"></script>

    <script type="text/javascript">
        jQuery(document).ready(function ($) {
            $('.counter').counterUp({
                delay: 100,
                time: 1200
            });
            $('.circliful-chart').circliful();
        });

        // BEGIN SVG WEATHER ICON
        if (typeof Skycons !== 'undefined') {
            var icons = new Skycons(
                    {"color": "#3bafda"},
                    {"resizeClear": true}
            ),
                    list = [
                        "clear-day", "clear-night", "partly-cloudy-day",
                        "partly-cloudy-night", "cloudy", "rain", "sleet", "snow", "wind",
                        "fog"
                    ],
                    i;

            for (i = list.length; i--; )
                icons.set(list[i], list[i]);
            icons.play();
        }
        ;

    </script>
</body>
</html>