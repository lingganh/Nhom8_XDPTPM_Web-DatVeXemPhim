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
</head>

<body>
<header id="site-header" class="w3l-header fixed-top">
    <!--/nav-->
    <nav class="navbar navbar-expand-lg navbar-light fill px-lg-0 py-0 px-3">
        <div class="container">
            <h1><a class="navbar-brand" href="index.html">
                    <img src="C:\Users\dell\Downloads\MyShowz-Movie-ticket-booking-website-master1\MyShowz-Movie-ticket-booking-website-master\.vs\MyShowz-Movie-ticket-booking-website-master\v17\img\logo.jpg.png"
                         alt="Five Star " style="height:120px;">

                </a></h1>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
            </div>
            <div class="DangNhap-DangKy" id="DangNhap">
                <!-- style="font-size: 2rem ; display: inline-block; position: relative;" -->
                <!-- <li class="nav-item"> -->
                <a class="nav-link" href=""><i class="fa fa-user-circle-o"></i></a>
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
    <div class="form-container sign-up-container">
        <form name="sign-up-form" action="#" onsubmit="return signUpValidateForm()">
            <h1>Create Account</h1>
            <div class="social-container">
                <a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
                <a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
                <a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
            </div>
            <span>Hoặc sử dụng email của bạn để đăng ký</span>
            <input name="sign-up-name" type="text" placeholder="Tên " />
            <input name="sign-up-email" type="email" placeholder="Email" />
            <input name="sign-up-passwd" type="password" placeholder="Password" />
            <button>Đăng ký</button>
        </form>
    </div>
    <div class="form-container sign-in-container">
        <form name="sign-in-form" style="color: var(--theme-title);" action="#"
              onsubmit="return signInValidateForm()">
            <h1>Đăng Nhập</h1>
            <div class="social-container">
                <a href="#" class="social" style="color: var(--theme-title);"><i class="fab fa-facebook-f"></i></a>
                <a href="#" class="social" style="color: var(--theme-title);"><i
                        class="fab fa-google-plus-g"></i></a>
                <a href="#" class="social" style="color: var(--theme-title);"><i class="fab fa-linkedin-in"></i></a>
            </div>
            <span>Hoặc sử dụng tài khoản của bạn</span>
            <input name="sign-in-email" type="email" placeholder="Email" />
            <input name="sign-in-passwd" type="password" placeholder="Mật Khẩu" />
            <a href="#">Quên mật khẩu?</a>
            <button>Đăng Ký</button>
        </form>
    </div>
    <div class="overlay-container">
        <div class="overlay">
            <div class="overlay-panel overlay-left">
                <h1>Chào mừng trở lại!</h1>
                <p>Để giữ kết nối với chúng tôi, vui lòng đăng nhập bằng thông tin đăng nhập của bạn</p>
                <button class="ghost" id="signIn">Đăng Ký</button>
            </div>
            <div class="overlay-panel overlay-right">
                <h1>Xin Chào Bạn</h1>
                <p>Đăng ký và đặt vé ngay bây giờ!!!</p>
                <button class="ghost" id="signUp">Đăng Ký</button>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript" src="assets/js/as-alert-message.min.js"></script>
<script src="assets/js/jquery-3.3.1.min.js"></script>
<!--/theme-change-->
<script src="assets/js/theme-change.js"></script>
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
<script src="assets/js/bootstrap.min.js"></script>

<script type="text/javascript" src="assets/js/sign-in.js"></script>

</body>

</html>
