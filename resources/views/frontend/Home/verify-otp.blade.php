<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signin</title>
    <link rel="stylesheet" type="text/css" href="frontend/assets/css/as-alert-message.min.css">
    <link rel="stylesheet" type="text/css"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="frontend/assets/css/style-starter.css">
    <link rel="stylesheet" type="text/css" href="frontend/assets/css/sign-in.css">
    <link rel="stylesheet" type="text/css" href="frontend/style.css">
</head>

<body>
<header id="site-header" class="w3l-header fixed-top">
    <!--/nav-->
    <nav class="navbar navbar-expand-lg navbar-light fill px-lg-0 py-0 px-3">
        <div class="container">
            <h1><a class="navbar-brand" href="index.html">
                    <img src="https://img.icons8.com/?size=100&id=f37TKteMvQFo&format=png&color=000000"
                         alt="Five Star " style="height:40px;">
                    <h1 data-text="Five Star" class="text0">
                        Five Star
                    </h1>


                </a></h1>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
            </div>
             <!-- toggle switch for light and dark theme -->
            <div class="mobile-position">
                <nav class="navigation">
                    <div class="theme-switch-wrapper">
                        <label class="theme-switch" for="checkbox">
                            <input type="checkbox" id="checkbox">
                            <div class="mode-container">
                                <i class="gg-sun"></i>
                                <i class="gg-moon"></i>
                            </div>
                        </label>
                    </div>
                </nav>
            </div>
        </div>
    </nav>
</header>

<div class="container_signup_signin" id="container_signup_signin">
    <form action="{{ route('verify') }}" method="post">
        <input type="hidden" name="email" value="{{ $email }}">
        <br><br>
        <label for="otp">OTP</label>
        <input type="text" name="otp" id="otp" placeholder="Enter OTP" required>
        @csrf
        <button type="submit">Verify</button>
        <a href ="{{route('resend-otp')}}"> Resend OTP </a>
    </form>


</div>

<script type="text/javascript" src="frontend/assets/js/as-alert-message.min.js"></script>
<script src="frontend/assets/js/jquery-3.3.1.min.js"></script>
<!--/theme-change-->
<script src="frontend/assets/js/theme-change.js"></script>

<!-- disable body scroll which navbar is in active -->
<!--/MENU-JS-->

<script src="frontend/assets/js/bootstrap.min.js"></script>

<script type="text/javascript" src="frontend/assets/js/sign-in.js"></script>

</body>

</html>
