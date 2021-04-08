<!DOCTYPE HTML>
<html lang="en">
<head>
    <title>Account Register Form Flat Responsive Widget Template :: w3layouts</title>
    <!-- Meta tag Keywords -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="Account Register Form Responsive Widget,Login form widgets, Sign up Web forms , Login signup Responsive web form,Flat Pricing table,Flat Drop downs,Registration Forms,News letter Forms,Elements" />
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
        function hideURLbar(){ window.scrollTo(0,1); } </script>
    <!-- Meta tag Keywords -->
    <!-- css files -->
    <link rel="stylesheet" href="{{ asset('register/css/style.css') }}" type="text/css" media="all" /> <!-- Style-CSS -->
    <link rel="stylesheet" href="{{ asset('register/css/font-awesome.css') }}"> <!-- Font-Awesome-Icons-CSS -->
    <link href="//fonts.googleapis.com/css?family=Noto+Sans:400,400i,700,700i&amp;subset=cyrillic,cyrillic-ext,devanagari,greek,greek-ext,latin-ext,vietnamese" rel="stylesheet">

    <!-- //css files -->
</head>
<body>
<!-- main -->
<div class="w3ls-header">
    <h1>Account Register form</h1>
    <div class="header-main">
        <h2>Create Account</h2>
        <div class="header-bottom">
            <div class="header-right w3agile">
                <div class="header-left-bottom agileinfo">
                    <form action="{{ route('storeRegister') }}" method="post">
                        @csrf
                        <div class="icon1">
                            <i class="fa fa-user" aria-hidden="true"></i>
                            <input  type="text" placeholder="Your Full Name" name="user"/>
                            @if($errors->any())
                                <div class="alert-danger">{{ $errors->first('user') }}</div>
                            @endif
                        </div>
                        <div class="icon1">
                            <i class="fa fa-envelope" aria-hidden="true"></i>
                            <input type="email" placeholder="Your Email" name="email"/>
                            @if($errors->any())
                                <div class="alert-danger">{{ $errors->first('email') }}</div>
                            @endif
                        </div>
                        <div class="icon1">
                            <i class="fa fa-phone" aria-hidden="true"></i>
                            <input type="tel" placeholder="Phone Number" name="phone"/>
                            @if($errors->any())
                                <div class="alert-danger">{{ $errors->first('phone') }}</div>
                            @endif
                        </div>
                        <div class="icon1">
                            <i class="fa fa-lock" aria-hidden="true"></i>
                            <input type="password" placeholder="Password" name="password"/>
                            @if($errors->any())
                                <div class="alert-danger">{{ $errors->first('password') }}</div>
                            @endif
                        </div>
                        <div class="icon1">
                            <svg xmlns="http://www.w3.org/2000/svg" style="color: forestgreen" width="16" height="16" fill="currentColor" class="bi bi-house-door-fill" viewBox="0 0 16 16">
                                <path d="M6.5 14.5v-3.505c0-.245.25-.495.5-.495h2c.25 0 .5.25.5.5v3.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5z"/>
                            </svg>
                            <i class="" aria-hidden="true"></i>
                            <input type="text" placeholder="Address " name="address"/>
                            @if($errors->any())
                                <div class="alert-danger">{{ $errors->first('address') }}</div>
                            @endif
                        </div>

                        <div class="login-check">
                            <label class="checkbox"><input type="checkbox" name="checkbox" checked=""><i> </i> I Accept to the <a href="#">Terms &amp; Conditions</a></label>
                        </div>
                        <div class="bottom">
                            <input type="submit" value="Create account" />
                        </div>
{{--                        <div class="social w3layouts">--}}
{{--                            <div class="heading">--}}
{{--                                <h5>Or signin with :</h5>--}}
{{--                                <div class="clear"></div>--}}
{{--                            </div>--}}
{{--                            <div class="icons">--}}
{{--                                <a href="#"><i class="fa fa-facebook-square" aria-hidden="true"></i></a>--}}
{{--                                <a href="#"><i class="fa fa-twitter-square" aria-hidden="true"></i></a>--}}
{{--                                <a href="#"><i class="fa fa-linkedin-square" aria-hidden="true"></i></a>--}}
{{--                                <a href="#"><i class="fa fa-google-plus-square" aria-hidden="true"></i></a>--}}

{{--                                <div class="clear"></div>--}}
{{--                            </div>--}}
{{--                            <div class="clear"></div>--}}
{{--                            <p>Already a member? <a href="#">Signin</a></p>--}}
{{--                        </div>--}}
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!--header end here-->
<!-- copyright start here -->
<div class="copyright">
    <p>© 2021 Account Register Form.</p>
</div>
<!--copyright end here-->
</body>
</html>
