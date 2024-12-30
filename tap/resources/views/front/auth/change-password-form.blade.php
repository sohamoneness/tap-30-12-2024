<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="target-densitydpi=device-dpi, initial-scale=1.0, user-scalable=no" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- <link rel="shortcut icon" href="./img/fav_icon.png"> -->
    <title>Change Password</title>

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
                <h2><a href="{{route('front.index')}}"><span>Copy</span>Writer</a></h2>
                <div class="inner">
                    <h3 class="heading">Hello :&#41;{{ request()->get('name') }}</h2>
                    
                    <p class="desc">To keep connected with us please put your personal information by email address to set a new password</p>
                    <form action="{{ route('front.user.save_password') }}" method="post">
                        @csrf
                        <input type="hidden" name="email" value="{{ request()->get('email') }}">
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
                            <img src="{{ asset('frontend/img/lock.svg') }}" alt="Password">
                            </div>
                            <div class="input-block">
                                <label>New Password</label>
                                <input type="password" name="new_password" class="form-control">
                                <div class="input-border"></div>
                                @error('new_password')
                                <p class="small text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row2" tabindex="1">
                            <div class="icon-block">
                                <img src="{{ asset('frontend/img/lock.svg') }}" alt="Password">
                            </div>
                            <div class="input-block">
                                <label>Confirm Password</label>
                                <input type="password" name="confirm_password" class="form-control">
                                <div class="input-border"></div>
                                @error('confirm_password')
                                <p class="small text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        
                        <button type="submit" class="login_btn">Submit</button>
                        <div class="register-block">
                            <a href="{{ route('front.user.login') }}">Login</a>
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

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="{{ asset('frontend/js/popper.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('frontend/js/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('frontend/js/custom.js') }}"></script>
</body>
</html>