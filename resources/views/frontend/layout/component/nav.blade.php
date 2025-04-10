<header id="site-header" class="w3l-header fixed-top">

    <nav class="navbar navbar-expand-lg navbar-light fill px-lg-0 py-0 px-3">
        <div class="container">
            <h1><a class="navbar-brand" href="index.html">

                    <img src="https://img.icons8.com/?size=100&id=f37TKteMvQFo&format=png&color=000000"
                         alt="Five Star " style="height:30px;"><a data-text="Five Star" class="text0">
                        Five Star
                    </a>
                </a></h1>
            <button class="navbar-toggler collapsed" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                <!-- <span class="navbar-toggler-icon"></span> -->
                <span class="fa icon-expand fa-bars"></span>
                <span class="fa icon-close fa-times"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="index.html">Trang Chủ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('user.movieIndex')}}">Phim</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="about.html">Về Chúng Tôi</a>
                    </li>


                    <li class="nav-item">
                        <a class="nav-link" href="Contact_Us.html">Liên hệ</a>
                    </li>
                </ul>

                <!--/search-right-->
                <!--/search-right-->

                <div style="display: flex; align-items: center;">
                    <div class="Login_SignUp" id="login"
                         style="font-size: 2rem ; display: inline-block; position: relative;">
                        @if (!Auth::check())
                            <a class="nav-link" href="{{ route('signin.index') }}"><i class="fa fa-user-circle-o"></i></a>
                        @else
                            <a class="nav-link" href="{{route('user.movieIndex')}}"><i class="fa fa-user-circle-o"></i></a>
                        @endif
                    </div>
                    @auth
                        <form action="{{ route('logout.user') }}" method="POST" style="display: inline-block; margin-left: 10px; ">
                            @csrf
                            <button type="submit" class="nav-link" style="background: none; border: none; padding: 0; font-size: 2rem; color: #c6006a; cursor: pointer;">
                                <i class="fa fa-sign-out"></i>
                            </button>
                        </form>
                    @endauth
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

    <!--/nav-->
</header>

<script src="frontend/assets/js/theme-change.js"></script>
<script src="frontend/assets/js/owl.carousel.js"></script>

