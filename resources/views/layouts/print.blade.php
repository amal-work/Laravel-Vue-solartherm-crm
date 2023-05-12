<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>SolarTherm UK</title>

    <!-- Icons -->
    <link href="{{ asset('css/font-awesome.min.css')}} " rel="stylesheet">
    <link href="{{ asset('css/simple-line-icons.css') }}" rel="stylesheet">

    <!-- Main styles for this application -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
    <link href="{{ asset('css/pure-grid.css') }}" rel="stylesheet">

    @yield('custom_styles')
</head>


<body>

<div>
<!-- Main content -->
    <main>

        <!-- Breadcrumb -->
        <div class="container-fluid">
            @yield('content')
        </div>
        <!-- /.conainer-fluid -->
    </main>
    @yield('modals')
</div>

@yield('custom_script')

</body>

</html>