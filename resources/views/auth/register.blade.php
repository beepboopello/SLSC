<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Painted World of Aria</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <link rel="stylesheet" type="text/css" href="https://gambolthemes.net/workwise-new/css/animate.css">
    <link rel="stylesheet" type="text/css" href="https://gambolthemes.net/workwise-new/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://gambolthemes.net/workwise-new/css/line-awesome.css">
    <link rel="stylesheet" type="text/css" href="https://gambolthemes.net/workwise-new/css/line-awesome-font-awesome.min.css">
    <link href="https://gambolthemes.net/workwise-new/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="https://gambolthemes.net/workwise-new/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="https://gambolthemes.net/workwise-new/lib/slick/slick.css">
    <link rel="stylesheet" type="text/css" href="https://gambolthemes.net/workwise-new/lib/slick/slick-theme.css">
    <link rel="stylesheet" type="text/css" href="https://gambolthemes.net/workwise-new/css/responsive.css">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>

<body class="sign-in">
    <div class="wrapper" style="background-image: url('{{ asset('/assets/images/login-bg.jpg') }}');position: absolute;width: 100%;height: 100%;background-size: cover;">
        <div class="sign-in-page">
            <div class="signin-popup">
                <div class="signin-pop">
                    <div class="row" style="background-color: #fff">
                        <div class="col-lg-6">
                            <div class="cmp-info">
                                <div class="cm-logo" style="margin-bottom: 50px; padding-top: 20px">
                                    <img src="images/cm-logo.png" alt="">
                                    <h1>Welcome to the <del>lost grace</del> bonfire, Ashen One</h1>
                                </div>
                                <img src="https://c.tenor.com/drxH1lO9cfEAAAAi/dark-souls-bonfire.gif" alt="">
                            </div>
                        </div>
                        <div class="col-lg-6" style="padding-top: 10%">
                            <div class="login-sec">
                                <ul class="sign-control" style="margin-bottom: 5%">
                                    <li data-tab="tab-1" ><a href="login" title="">Sign in</a></li>
                                    <li data-tab="tab-2" class="current"><a href="register" title="">Sign up</a></li>
                                </ul>
                                <div class="sign_in_sec" id="tab-1">
                                    <h3>Sign in</h3>
                                    <form method="POST" action="{{ route('login') }}">
                                        @csrf
                                        <div class="row">
                                            <div class="col-lg-12 no-pdd">
                                                <div class="sn-field">
                                                    <input placeholder="example@something.com" id="email1" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                                    @error('email')
                                                        <p class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </p>
                                                    @enderror
                                                    <i class="la la-user"></i>
                                                </div>
                                            </div>
                                            <div class="col-lg-12 no-pdd">
                                                <div class="sn-field">
                                                    <input placeholder="yo password goes here" id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                                    @error('password')
                                                    <p class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </p>
                                                @enderror
                                                    <i class="la la-lock"></i>
                                                </div>
                                            </div>
                                            <div class="col-lg-12 no-pdd">
                                                <div class="checky-sec">
                                                    <div class="fgt-sec">
                                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                                        <label for="remember">
                                                            <span></span>
                                                        </label>
                                                        <small>Remember me</small>
                                                    </div>
                                                    <a href="#" title="">Forgot Password?</a>
                                                </div>
                                            </div>
                                            <div class="col-lg-12 no-pdd">
                                                <button type="submit" value="submit">Log in</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                    <div class="sign_in_sec  current" id="tab-2">
                                        <h3 style="margin-bottom: 5%">Sign up</h3>
                                        <form method="POST" action="{{ route('register') }}">
                                            @csrf
                                            <div class="row">
                                                <div class="col-lg-12 no-pdd">
                                                    <div class="sn-field" style="margin-bottom: 0%">
                                                        <label style="padding-left: 0%" for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>
                                                        <input placeholder="Johnny Silverhand" id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                                        @error('name')
                                                        <br>
                                                            <p class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </p>
                                                        @enderror
                                                        <i class="la la-globe"></i>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 no-pdd">
                                                    <div class="sn-field" style="margin-bottom: 0%">
                                                        <label style="padding-left: 0%" for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email') }}</label>
                                                        <input placeholder="example@something.com" id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                                                        @error('email')
                                                            <p class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </p>
                                                        @enderror
                                                        <i class="la la-globe"></i>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 no-pdd">
                                                    <div class="sn-field">
                                                        <label style="padding-left: 0%" for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>
                                                        <input placeholder="Yo password goes here" id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                                        @error('password')
                                                            <p class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </p>
                                                        @enderror
                                                        <i class="la la-lock"></i>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 no-pdd">
                                                    <div class="sn-field">
                                                        <input placeholder="Confirm password" id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                                        <i class="la la-lock"></i>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 no-pdd">
                                                    <div class="checky-sec st2">
                                                        <div class="fgt-sec">
                                                            <input type="checkbox" name="cc" id="c2">
                                                            <label for="c2">
                                                                <span></span>
                                                            </label>
                                                            <small>Yes, I understand that this check box does absolutely nothing and i'm wasting my time clicking on it.</small>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 no-pdd">
                                                    <button type="submit" value="submit">Sign up</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script data-cfasync="false" src="https://gambolthemes.net/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
    <script type="text/javascript" src="https://gambolthemes.net/workwise-new/js/jquery.min.js"></script>
    <script type="text/javascript" src="https://gambolthemes.net/workwise-new/js/popper.js"></script>
    <script type="text/javascript" src="https://gambolthemes.net/workwise-new/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="https://gambolthemes.net/workwise-new/lib/slick/slick.min.js"></script>
    <script type="text/javascript" src="https://gambolthemes.net/workwise-new/js/script.js"></script>
</body>

</html>
