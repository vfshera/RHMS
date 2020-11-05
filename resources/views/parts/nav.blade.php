
<!-- Navigation-->
<nav class="navbar navbar-expand-lg navbar-dark fixed-top " id="mainNav">
    <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="#page-top"><img src="" alt="RHMS" /></a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            Menu
            <i class="fas fa-bars ml-1"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav text-uppercase ml-auto">
{{--                <li class="nav-item"><a class="nav-link " href="/register">Register</a></li>--}}
{{--                <li class="nav-item"><a class="nav-link js-scroll-trigger" href="/login">LogIn</a></li>--}}
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
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
