<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signin</title>
    <link rel="stylesheet" type="text/css" href="client/assets/css/as-alert-message.min.css">
    <link rel="stylesheet" type="text/css"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="client/assets/css/style-starter.css">
    <link rel="stylesheet" type="text/css" href="client/assets/css/sign-in.css">
    <link rel="stylesheet" type="text/css" href="client/style.css">
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
            <div class="DangNhap-DangKy" id="DangNhap">
                <!-- style="font-size: 2rem ; display: inline-block; position: relative;" -->
                <!-- <li class="nav-item"> -->
                 <!-- </li> -->
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
    <!-- ĐN -->
    <div class="form-container sign-in-container">
        <form name="sign-in-form" action="{{route('register')}}" method="post"
              class="sign-in-form"  >
            <h1>Đăng Ký</h1>

            @csrf
            <input name="name" type="text" placeholder="Tên " />
            <input name="email" type="email" placeholder="Email" />
            <input name="password" type="password" placeholder="Password" />
            <input name="password_confirmation" type="password" placeholder="Confirmation Password" />

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <button>Đăng ký </button>
        </form>

    </div>
    <div class="overlay-container">
        <div class="overlay">

            <!-- ĐN -->
            <div class="overlay-panel overlay-right">
                <h1>Nếu bạn đã có tài khoản</h1>
                <p>Đăng nhập và đặt vé ngay bây giờ!!!</p>

                <button class="ghost" id="signUp" onclick="window.location.href='{{ route('signin.index') }}'">Đăng Nhập</button>
            </div>
        </div>
    </div>
</div>

</div>




<script type="text/javascript" src="client/assets/js/as-alert-message.min.js"></script>
<script src="client/assets/js/jquery-3.3.1.min.js"></script>
<!--/theme-change-->
<script src="client/assets/js/theme-change.js"></script>
<!-- disable body scroll which navbar is in active -->
<script>
    $(function () {
        $('.navbar-toggler').click(function () {
            $('body').toggleClass('noscroll');
        })
    });
</script>
<!-- disable body scroll which navbar is in active -->
<!--/MENU-JS-->
<script>
    $(window).on("scroll", function () {
        var scroll = $(window).scrollTop();

        if (scroll >= 80) {
            $("#site-header").addClass("nav-fixed");
        } else {
            $("#site-header").removeClass("nav-fixed");
        }
    });

    //Main navigation Active Class Add Remove
    $(".navbar-toggler").on("click", function () {
        $("header").toggleClass("active");
    });
    $(document).on("ready", function () {
        if ($(window).width() > 991) {
            $("header").removeClass("active");
        }
        $(window).on("resize", function () {
            if ($(window).width() > 991) {
                $("header").removeClass("active");
            }
        });
    });
</script>

</body>

</html>
