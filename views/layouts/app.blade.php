<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" xmlns="http://www.w3.org/1999/html">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="@yield('description', setting('description', ''))">
    <meta name="theme-color" content="#3490DC">
    <meta name="author" content="Nather_">

    <meta property="og:title" content="@yield('title')">
    <meta property="og:type" content="@yield('type', 'website')">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:image" content="{{ favicon() }}">
    <meta property="og:description" content="@yield('description', setting('description', ''))">
    <meta property="og:site_name" content="{{ site_name() }}">
    @stack('meta')

    <title>@yield('title') | {{ site_name() }}</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ favicon() }}">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ theme_asset("vendor/bootstrap/css/bootstrap.min.css") }}" rel="stylesheet">
    <link href="{{ theme_asset("vendor/icofont/icofont.min.css") }}" rel="stylesheet">
    <link href="{{ theme_asset("vendor/boxicons/css/boxicons.min.css") }}" rel="stylesheet">
    <link href="{{ theme_asset("vendor/animate.css/animate.min.css") }}" rel="stylesheet">
    <link href="{{ theme_asset("vendor/remixicon/remixicon.css") }}" rel="stylesheet">
    <link href="{{ theme_asset("vendor/line-awesome/css/line-awesome.min.css") }}" rel="stylesheet">
    <link href="{{ theme_asset("vendor/venobox/venobox.css") }}" rel="stylesheet">
    <link href="{{ theme_asset("vendor/owl.carousel/assets/owl.carousel.min.css") }}" rel="stylesheet">
    <link href="{{ theme_asset("vendor/aos/aos.css") }}" rel="stylesheet">
    @stack('styles')

    <!-- Template Main CSS File -->
    <link href="{{theme_asset("css/style.css")}}" rel="stylesheet">
</head>

<body>

    @include('elements.navbar')

<main id="main">
    @if(!(route('home') == url()->current()))
        <section style="height: 50px"></section>
    @endif

    @yield("content")
</main><!-- End #main -->
    @if(!(route('home') == url()->current()))
        <section style="height: 50px"></section>
    @endif
<!-- ======= Footer ======= -->
<footer id="footer">

    @include('elements.footer')
</footer><!-- End Footer -->

<a href="#" class="back-to-top"><i class="ri-arrow-up-line"></i></a>

<!-- Vendor JS Files -->
<script src="{{ theme_asset("vendor/jquery/jquery.min.js") }}"></script>
<script src="{{ theme_asset("vendor/bootstrap/js/bootstrap.bundle.min.js") }}"></script>
<script src="{{ theme_asset("vendor/jquery.easing/jquery.easing.min.js") }}"></script>
<script src="{{ theme_asset("vendor/php-email-form/validate.js") }}"></script>
<script src="{{ theme_asset("vendor/isotope-layout/isotope.pkgd.min.js") }}"></script>
<script src="{{ theme_asset("vendor/venobox/venobox.min.js") }}"></script>
<script src="{{ theme_asset("vendor/owl.carousel/owl.carousel.min.js") }}"></script>
<script src="{{ theme_asset("vendor/aos/aos.js") }}"></script>
@stack('footer-scripts')

<!-- Template Main JS File -->
<script src="{{ theme_asset("js/main.js") }}"></script>

</body>

</html>
