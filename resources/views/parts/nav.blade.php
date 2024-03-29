
<!-- Navigation-->
<nav class="navbar navbar-expand-lg navbar-dark fixed-top " id="mainNav">
    <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="/"><img src="" alt="RHMS" /></a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            Menu
            <i class="fas fa-bars ml-1"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav text-uppercase ml-auto">
                <li class="nav-item"><a class="nav-link js-scroll-trigger" href="/projects-view">Projects</a></li>
                <li class="nav-item"><a class="nav-link js-scroll-trigger" href="/#Testimonials">Testimonials</a></li>
                <li class="nav-item"><a class="nav-link js-scroll-trigger" href="/#team">Team</a></li>
                <li class="nav-item"><a class="nav-link js-scroll-trigger" href="/#contact">Contact</a></li>
                <li class="nav-item"><a class="nav-link js-scroll-trigger" href="/#about">About</a></li>
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item ">
                        <a  class="nav-link " href="/home" role="button">
                            {{ Auth::user()->name }}
                        </a>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
