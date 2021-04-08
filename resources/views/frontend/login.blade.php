
<!--
Author: W3layouts
Author URL: http://w3layouts.com
-->
<!DOCTYPE html>
<html lang="zxx">

<head>
    <title>Report Login Form Responsive Widget Template :: W3layouts</title>
    <!-- Meta tag Keywords -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8" />
    <meta name="keywords"
          content="Report Login Form Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
    <!-- //Meta tag Keywords -->
    <link href="//fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@400;500;700;900&display=swap" rel="stylesheet">
    <!--/Style-CSS -->
    <link rel="stylesheet" href="{{asset('login/css/style.css')}}" type="text/css" media="all" />
    <!--//Style-CSS -->

    <link rel="stylesheet" href="{{asset('login/css/font-awesome.min.css')}}" type="text/css" media="all">

</head>

<body>

<!-- form section start -->
<section class="w3l-hotair-form">
    <h1>Report Login Form</h1>
    <div class="container">
        <!-- /form -->
        <div class="workinghny-form-grid">
            <div class="main-hotair">
                <div class="content-wthree">
                    <h2>Log In</h2>
                    @if(\Illuminate\Support\Facades\Session::has('error_login'))
                        <div class="alert-danger">{{ \Illuminate\Support\Facades\Session::get('error_login') }}</div>
                    @endif
                    <form action="{{ route('frontend.login') }}" method="post">
                        @csrf
                        <input type="email" class="text" name="email" placeholder="Email@..." required="" autofocus>
                        @if($errors->any())
                            <div class="alert-danger">{{ $errors->first('email') }}</div>
                        @endif
                        <input type="password" class="password" name="password" placeholder="User Password" required="" autofocus>
                        @if($errors->any())
                            <div class="alert-danger">{{ $errors->first('password') }}</div>
                        @endif
                        <button class="btn" type="submit">Log In</button>
                    </form>

                    <p class="account">Don't have an account? <a href="{{route('storeRegister')}}">Register</a></p>
                </div>
                <div class="w3l_form align-self">
                    <div class="left_grid_info">
                        <img src="{{asset('login/images/1.png')}}" alt="" class="img-fluid">
                    </div>
                </div>
            </div>
        </div>
        <!-- //form -->
    </div>
    <!-- copyright-->
    <div class="copyright text-center">
        <p class="copy-footer-29">© 2021 Report Login Form. All rights reserved | Design by <a
                href="https://w3layouts.com">W3layouts</a></p>
    </div>
    <!-- //copyright-->
</section>
<!-- //form section start -->
</body>

</html>
