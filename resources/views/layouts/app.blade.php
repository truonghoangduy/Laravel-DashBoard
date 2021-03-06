<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
    <meta name="author" content="Creative Tim">
    <title>Argon Dashboard - Free Dashboard for Bootstrap 4</title>
    <!-- Favicon -->
{{--    <link rel="icon" href={{asset("assets/img/brand/favicon.png)}} type="image/png">--}}
<!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
    <!-- Icons -->
    <link rel="stylesheet" href= {{asset("assets/vendor/nucleo/css/nucleo.css")}} type="text/css">
    <link rel="stylesheet" href={{asset("assets/vendor/@fortawesome/fontawesome-free/css/all.min.css")}} type="text/css">
    <!-- Page plugins -->
{{--    <link rel="stylesheet" href={{asset("assets/vendor/sweetalert2/dist/sweetalert2.min.css")}}>--}}

<!-- Argon CSS -->
    <link rel="stylesheet" href={{asset("assets/css/argon.css?v=1.2.0" )}}type="text/css">

</head>
<body>
@include('sweetalert::alert')

{{--<div id="app">--}}
@yield('content')

{{--</div>--}}
<!-- Argon Scripts -->
<!-- Core -->
<script src={{asset("assets/vendor/jquery/dist/jquery.min.js")}}></script>
<script src={{asset("assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js")}}></script>
<script src={{asset("assets/vendor/js-cookie/js.cookie.js")}}></script>
<script src={{asset("assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js")}}></script>
<script src={{asset("assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js")}}></script>
<!-- Optional JS -->
{{--<script src={{asset("assets/vendor/sweetalert2/dist/sweetalert2.min.js")}}></script>--}}
<script src={{asset("assets/vendor/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js")}}></script>
{{--<script src={{asset("assets/vendor/chartjs.js/dist/Chart.min.js")}}></script>--}}
{{--<script src={{asset("assets/vendor/chart.js/dist/Chart.extension.js")}}></script>--}}
<script src={{asset("assets/vendor/list.js/dist/list.min.js")}}></script>

{{--<script src={{asset("assets/vendor/dropzone/dist/dropzone.js")}}></script>--}}
{{--<script src={{asset("assets/vendor/dropzone/dist/dropzone.css")}}></script>--}}
{{--<script src={{asset("assets/js/dropzone.js")}}></script>--}}

<!-- Argon JS -->
<script src={{asset("assets/js/argon.js?v=1.2.0")}}></script>

<script>
    $('[data-toggle="popover-hover"]').popover({
        html: true,
        trigger: 'hover',
        placement: 'right',
        content: function () { return '<img class="img-fluid" src="' + $(this).data('img') + '" />'; }
    });
</script>

<footer>
</footer>
</body>
</html>
