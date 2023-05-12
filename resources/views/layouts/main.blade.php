<!--
 * CoreUI - Open Source Bootstrap Admin Template
 * @version v1.0.0-alpha.4
 * @link http://coreui.io
 * Copyright (c) 2017 creativeLabs Łukasz Holeczek
 * @license MIT
 -->
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" href="{{ asset('img/favicon.png')}}">

    <title>SolarTherm UK</title>

    <!-- Icons -->
    <link href="{{ asset('css/font-awesome.min.css')}} " rel="stylesheet">
    <link href="{{ asset('css/simple-line-icons.css') }}" rel="stylesheet">

    <!-- Main styles for this application -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('bower_components/izitoast/dist/css/iziToast.min.css') }}">

    @yield('custom_styles')
</head>


<body class="app header-fixed sidebar-fixed aside-menu-fixed aside-menu-hidden">
@include('components.top_nav')

<div class="app-body" id="app">
    @include('components.side_nav')
    <!-- Main content -->
    <main class="main">

        <!-- Breadcrumb -->
        <ol class="breadcrumb"></ol>
        <div class="container-fluid">
            <div class="animated fadeIn" >
                @yield('content')
            </div>
        </div>
        <!-- /.conainer-fluid -->
    </main>
    @yield('modals')
</div>

<footer class="app-footer">
    <a href="http://panel.solarthermuk.co.uk">STUK CRM</a> © 2017 SolarTherm UK.
    <span class="float-right">Version 0.0.1
        </span>
</footer>

<!-- Bootstrap and necessary plugins -->
<script src="{{ asset('bower_components/jquery/dist/jquery.min.js') }}"></script>
<script src="{{ asset('bower_components/tether/dist/js/tether.min.js') }}"></script>
<script src="{{ asset('bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('bower_components/pace/pace.min.js') }}"></script>

<!-- Bootstrap Validation -->
<script src="{{ asset('bower_components/bootstrap-validator/dist/validator.min.js') }}"></script>

<!-- Plugins and scripts required by all views -->
<script src="{{ asset('bower_components/chart.js/dist/Chart.min.js') }}"></script>

<script src="https://unpkg.com/vue"></script>
<script src="{{ asset('bower_components/izitoast/dist/js/iziToast.min.js') }}"></script>
<script src="{{ asset('js/app.js') }}"></script>

<!-- Custom scripts required by this view -->
<script src="{{ asset('js/views/main.js') }}"></script>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>
@yield('custom_script')

</body>

</html>