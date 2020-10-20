@extends("layouts.app")

@section('title', trans('messages.home'))

@section('content')
    <!-- ======= Hero Section ======= -->
    <section id="hero" class="d-flex flex-column justify-content-end align-items-center">
        <div id="heroCarousel" class="container carousel carousel-fade" data-ride="carousel">

            <!-- Slide 1-->
            <div class="carousel-item active">
                <div class="carousel-container">
                    <h2 class="animate__animated animate__fadeInDown">{{ theme_config('header_link.0.title') }}</h2>
                    <p class="animate__animated fanimate__adeInUp">{{ theme_config("header_link.0.subTitle") ?? "test" }}</p>
                    <a href="{{ theme_config("header_link.0.btn.link") ?? "#test" }}" class="btn-get-started animate__animated animate__fadeInUp scrollto">{{ theme_config("header_link.0.btn.name") ?? "test" }}</a>
                </div>
            </div>
            @foreach(theme_config('header_link') ?? [] as $link)
                @if($link == theme_config('header_link.0'))

                @else
                    <div class="carousel-item">
                        <div class="carousel-container">
                            <h2 class="animate__animated animate__fadeInDown">{{ $link["title"] }}</h2>
                            <p class="animate__animated fanimate__adeInUp">{{ $link["subTitle"] ?? "test" }}</p>
                            <a href="{{ $link["btn"]["link"] ?? "#test" }}" class="btn-get-started animate__animated animate__fadeInUp scrollto">{{ $link["btn"]["name"] ?? "test" }}</a>
                        </div>
                    </div>
                @endif
            @endforeach

            <a class="carousel-control-prev" href="#heroCarousel" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon bx bx-chevron-left" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>

            <a class="carousel-control-next" href="#heroCarousel" role="button" data-slide="next">
                <span class="carousel-control-next-icon bx bx-chevron-right" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>

        </div>

        <svg class="hero-waves" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 24 150 28 " preserveAspectRatio="none">
            <defs>
                <path id="wave-path" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z">
            </defs>
            <g class="wave1">
                <use xlink:href="#wave-path" x="50" y="3" fill="rgba(255,255,255, .1)">
            </g>
            <g class="wave2">
                <use xlink:href="#wave-path" x="50" y="0" fill="rgba(255,255,255, .2)">
            </g>
            <g class="wave3">
                <use xlink:href="#wave-path" x="50" y="9" fill="#fff">
            </g>
        </svg>

    </section><!-- End Hero -->


    @include("elements.portfolio")

@endsection
