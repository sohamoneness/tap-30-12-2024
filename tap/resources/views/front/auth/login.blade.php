<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="target-densitydpi=device-dpi, initial-scale=1.0, user-scalable=no" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- <link rel="shortcut icon" href="./img/fav_icon.png"> -->
    <title>Login</title>

    <link href="{{ asset('frontend/css/bootstrap.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('frontend/css/swiper-bundle.min.css') }}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css"
        integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="{{ asset('frontend/css/aos.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('frontend/css/style.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('frontend/css/responsive.css') }}" rel="stylesheet" type="text/css">
</head>
<body>

    <div class="login-wrapper">
        <div class="login-content">
            <div class="login-content-left">
                <h2><a href="{{route('front.index')}}/v2"><img src="{{ asset('frontend/img/logo (2).png') }}" width="130"></a></h2>
                <div class="inner">
                    <h3 class="heading">Welcome Back :&#41;</h2>
                    <p class="desc">To keep connected with us please login with your personal information by email address and password</p>
                    <form action="{{ route('front.user.login.check') }}" method="post">@csrf
                        <input type="hidden" name="back_url" value="{{$back_url}}">
                        @if (\Session::has('success'))
                            <div class="alert alert-success">
                                <ul>
                                    <li>{!! \Session::get('success') !!}</li>
                                </ul>
                            </div>
                        @endif
                        @if (\Session::has('failure'))
                            <div class="alert alert-danger">
                                <ul>
                                    <li>{!! \Session::get('failure') !!}</li>
                                </ul>
                            </div>
                        @endif
                        <div class="form-group row1" tabindex="0">
                            <div class="icon-block">
                                <img src="{{ asset('frontend/img/email.svg') }}" alt="Email">
                            </div>
                            <div class="input-block">
                                <label>Email</label>
                                <input type="email" name="email" class="form-control">
                                <div class="input-border"></div>
                                @error('email')
                                <p class="small text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row2" tabindex="1">
                            <div class="icon-block">
                                <img src="{{ asset('frontend/img/lock.svg') }}" alt="Email">
                            </div>
                            <div class="input-block">
                                <label>Password</label>
                                <input type="password" name="password" class="form-control">
                                <div class="input-border"></div>
                                @error('password')
                                <p class="small text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>                        
                        <div class="login-remember-me">
                            <label for="rememberMe">
                                <input type="checkbox" class="form-check" id="rememberMe">
                                <span class="checkmark">
                                    <img src="{{ asset('frontend/img/checked.svg') }}" alt="">
                                </span>
                                <span class="checktext">Remember Me</span>
                            </label>
                        </div>
                        <button type="submit" class="login_btn">Login Now</button>
                        <div class="register-block">
                            Don&apos;t have an account yet?
                            <a href="{{ route('front.user.register') }}">Register</a>
                        </div>
                        <div class="register-block">
                            Can&apos;t remember your password?
                            <a href="{{ route('front.user.forget_password_email') }}">Forget Password</a>
                        </div>
                    </form>
                </div>
            </div>
            <div class="login-content-right">
                <div class="bg-img">
                    <img src="{{ asset('frontend/img/login_bg.png') }}" alt="Login">
                </div>
            </div>
        </div>
    </div>

    <!-- <div class="login_bg">
        <div class="login_lg_box shadow-sm">
            <div class="login_left">
                <div class="login_text_box">
                    <h2>
                        <i class="fas fa-pencil-alt"></i>
                        Digital platform <br> for content <span>writing</span>
                    </h2>
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Odio, eligendi?
                    </p>
                </div>
            </div>
            <div class="login_right">
                <div class="login-content">
                    <h3>Log in</h3>
                    <form action="{{ route('front.user.login.check') }}" method="post">@csrf
                        <input type="hidden" name="back_url" value="{{$back_url}}">
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control">
                            <div class="input-border"></div>
                            @error('email')
                            <p class="small text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control">
                            <div class="input-border"></div>
                            @error('password')
                            <p class="small text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        @if (\Session::has('success'))
                                <div class="alert alert-success">
                                    <ul>
                                        <li>{!! \Session::get('success') !!}</li>
                                    </ul>
                                </div>
                            @endif
                            @if (\Session::has('failure'))
                                <div class="alert alert-danger">
                                    <ul>
                                        <li>{!! \Session::get('failure') !!}</li>
                                    </ul>
                                </div>
                            @endif
                        <div class="login-forgot-password">
                            <label>
                                <input type="checkbox" class="form-check">
                                <span>Keep me logged in</span>
                            </label>
                            <span class="forgot-pass">
                                New User?
                                <a href="{{ route('front.user.register') }}">Register</a>
                            </span>
                        </div>
                        <button type="submit" class="login__btn">Login</button>
                    </form>
                </div>
            </div>
        </div>
    </div> -->


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="{{ asset('frontend/js/popper.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('frontend/js/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('frontend/js/custom.js') }}"></script>
</body>
</html>