<!-- ======= Header ======= -->
<header id="header" class="fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center">

        <div class="logo mr-auto">

            <!-- Uncomment below if you prefer to use an image logo -->
            <!--<a href="{{ route('home') }}"><img src="{{ site_logo() }}" alt="" class="img-fluid"></a>-->
            @if(!($server && $server->isOnline()))
                <h1 class="text-light mr-2 mt-0"><a href="{{ route('home') }}">{{ site_name() }}</a></h1>
            @else
                <h1 class="text-light mr-2 mt-3"><a href="{{ route('home') }}">{{ site_name() }}</a></h1>
                <p class="text-light font-weight-lighter">{{ trans_choice('messages.server.online', $server->getOnlinePlayers()) }}</p>
            @endif

        </div>

        <nav class="nav-menu d-none d-lg-block">
            <ul>
                @foreach($navbar as $element)
                    @if(!$element->isDropdown())
                        <li class="@if($element->isCurrent()) active @endif">
                            <a href="{{ $element->getLink() }}" @if($element->new_tab) target="_blank" rel="noopener" @endif>{{ $element->name }}</a>
                        </li>
                    @else
                        <li class="drop-down"><a href="{{ $element->getLink() }}">{{ $element->name }}</a>
                            <ul>
                                @foreach($element->elements as $childElement)
                                    <li>
                                        <a class="@if($childElement->isCurrent()) active @endif" href="{{ $childElement->getLink() }}" @if($childElement->new_tab) target="_blank" rel="noopener" @endif>{{ $childElement->name }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </li>
                    @endif
                @endforeach
                @auth
                    <li class="drop-down">
                        <a>{{ Auth::user()->name }}</span></a>
                        <ul>
                            <li><a href="{{ route('profile.index') }}">{{ trans('messages.nav.profile') }}</a></li>
                            @if(Auth::user()->hasAdminAccess())
                                <li><a href="{{ route('admin.dashboard') }}">{{ trans('messages.nav.admin') }}</a></li>
                            @endif
                            <li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ trans('auth.logout') }}</a></li>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </ul>
                    </li>
                @else
                    <li>
                        @if(Route::has('register'))
                            <a class="btn btn-outline-light btn-rounded" href="{{ route('register') }}">{{ trans('auth.register') }}</a>
                        @endif
                    </li>
                    <li><a class="btn btn-outline-light btn-rounded" href="{{ route('login') }}">{{ trans('auth.login') }}</a></li>
                @endauth
            </ul>
        </nav><!-- .nav-menu -->

    </div>
</header><!-- End Header -->
