<div class="top_nav">
    <div class="container">
        <div class="row">
            <div class="col-sm-8">
                <ul class="d-flex about-site">
                    <li><a href="#">Questions</a></li>
                    <li><a href="#">Team</a></li>
                    <li><a href="#">Blog</a></li>
                    <li><a href="#">Terms Of Privacy</a></li>
                </ul>
            </div>
            <div class="col-sm-4">
                <ul class="d-flex social ">
                    <li> <a href="#"> <i class="fab fa-facebook-f"></i> </a></li>
                    <li> <a href="#"> <i class="fab fa-twitter"></i> </a></li>
                    <li> <a href="#"> <i class="fab fa-instagram"></i> </a></li>
                    <li> <a href="#"> <i class="fab fa-snapchat-ghost"></i> </a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<nav class="navbar navbar-expand-lg navbar-light ">
    <div class="container">
        <a class="navbar-brand" href="{{route('home')}}"><img src="images/logo-m.png" data-src="images/logo-m.png"
                                                       class="lazyload"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon">
                        <ul class="menu-bars">
                            <li><span></span></li>
                            <li><span></span></li>
                            <li><span></span></li>
                        </ul>
                    </span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">About Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"> Movies Demos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"> Packages</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Contact Us</a>
                </li>

                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    @guest

                        <li class="nav-item">
                            <button class="btn btn-gradiant">
                                <a  href="{{ route('login') }}">{{ __('Login') }}</a>
                            </button>
                        </li>
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <button class="btn btn-gradiant">
                                    <a class="" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </button>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest

                </ul>
        </div>
    </div>
</nav>
