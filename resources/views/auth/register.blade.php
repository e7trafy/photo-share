<!DOCTYPE html>
<html>

<head>
    <title> Photo Share </title>
    <meta charset="UTF-8" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="author" content="RoQaY">
    <meta name="robots" content="index, follow">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content=" Photo Share website">
    <meta name="keywords" content=" Photo Share ">
    <meta name="csrf-token" content="V2G8zLS7dL5HzdfwxaBDewvJvAKCyeThQE4NBtJv">
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <link rel="stylesheet" type="text/css" media="screen" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" media="screen" href="css/fontawesome.min.css">
    <link rel="stylesheet" type="text/css" media="screen" href="css/animate.css">
    <link rel="stylesheet" type="text/css" media="screen" href="css/all.min.css">
    <link rel="stylesheet" type="text/css" media="screen" href="css/style.css">
    <link rel="stylesheet" type="text/css" media="screen" href="css/responsive.css">
</head>

<body>

<div class="body_wrapper">
    <div class="preloader">
        <div class="preloader-loading">
            <img src="{{ asset('images/logo-m.png') }}" data-src="{{ asset('images/logo-m.png') }}" class="lazyload">
        </div>
    </div>

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
    <div class="logo text-center">
        <a class="navbar-brand" href="{{route('home')}}"><img src="{{ asset('images/logo-m.png') }}" data-src="{{ asset('images/logo-m.png') }}"
                                                       class="lazyload"></a>
    </div>
    <section class="contact-us bg-light">
        <div class="container">
            <h3 class="text-center">Sign Up To Join Us</h3>

            <div class="row justify-content-center">
                <div class="col-md-7 col-sm-10">
                    <div class="contact-form">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="form-group ">
                                <label for="inputName">Write Your Name</label>


                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Write Your Name">

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="inputEmail">Your Email Addrss</label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Write Your Email">

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="inputPassword">Enter Password </label>

                                <input id="inputPassword" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder=" Write Your password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="inputConfirmPassword">Confirm Password </label>
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm Your password">

                            </div>

                            <div class="text-center p-2">
                                <button type="submit" class="btn btn-gradiant">
Sign Up
                                </button>
                            </div>

                            <div >
                                <b> <span>Have An Account ?</span> <a href="{{route('login')}}" class="main-color ">Login</a></b>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <footer class="pt-0">
        <div class="copyrights">
            <p>© All Rights reserved to Photo Share website 2017</p>
        </div>
    </footer>
    <span class="scroll-top"> <a href="#"><i class="fas fa-chevron-up"></i></a> </span>


</div>

<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/lazysizes.min.js"></script>
<script src="js/fontawesome.min.js"></script>
<script src="js/all.min.js"></script>
<script src="js/wow.min.js"></script>
<script src="js/main.js"></script>
</body>

</html>
