<footer class="w3l-footer">
    <section class="footer-inner-main">
        <div class="footer-hny-grids py-5">
            <div class="container py-lg-4">
                <div class="text-txt">
                    <div class="right-side">
                        <div class="row footer-about">
                            <div class="col-md-3 col-6 footer-img mb-lg-0 mb-4">
                                <a href="movies.html"><img class="img-fluid" src="assets/images/banner1.jpg"
                                                           alt=""></a>
                            </div>
                            <div class="col-md-3 col-6 footer-img mb-lg-0 mb-4">
                                <a href="movies.html"><img class="img-fluid" src="assets/images/banner2.jpg"
                                                           alt=""></a>
                            </div>
                            <div class="col-md-3 col-6 footer-img mb-lg-0 mb-4">
                                <a href="movies.html"><img class="img-fluid" src="assets/images/banner3.jpg"
                                                           alt=""></a>
                            </div>
                            <div class="col-md-3 col-6 footer-img mb-lg-0 mb-4">
                                <a href="movies.html"><img class="img-fluid" src="assets/images/banner4.jpg"
                                                           alt=""></a>
                            </div>
                        </div>
                        <div class="row footer-links">


                            <div class="col-md-3 col-sm-6 sub-two-right mt-5">
                                <h6>Phim</h6>
                                <ul>
                                    <li><a href="{{route('user.movieIndex')}}">Phim</a></li>
                                    <li><a href="{{route('user.movieIndex')}}">Phim đang chiếu</a></li>
                                    <li><a href="{{route('user.movieIndex')}}">Phim sắp chiếu </a></li>

                                </ul>
                            </div>
                            <div class="col-md-3 col-sm-6 sub-two-right mt-5">
                                <h6>thông tin</h6>
                                <ul>
                                    <li><a href="{{route('home.index')}}"> Trang Chủ </a> </li>
                                    <li><a href="{{route('user.movieIndex')}}">Phim</a> </li>
                                    <li><a href="{{ route('about') }}">Blogs</a> </li>
                                    <li><a href="{{ route('signin.index') }}">Đăng Nhập </a></li>
                                </ul>
                            </div>
                            <div class="col-md-3 col-sm-6 sub-two-right mt-5 text-white">
                                <h6>Thanh toán</h6>
                                <ul class="list-unstyled payment-icons">
                                    <ul style="font-size:50px ;">
                                        <i class="fab fa-cc-visa footer-icon"></i><br>
                                        <i class="fab fa-cc-mastercard footer-icon"></i><br>
                                        <i class="fab fa-cc-paypal footer-icon"></i> </ul>

                                 </ul>
                            </div>

                            <div class="col-md-3 col-sm-6 sub-two-right mt-5">
                                <h6>Liên hệ với chúng tôi </h6>
                                <ul>
                                    <li><a href="{{ route('comments_web.index') }}"> Liên Hệ </a></li>
                                </ul>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="below-section">
            <div class="container">
                <div class="copyright-footer">
                    <div class="columns text-lg-left">
                        <p>&copy; Copyright five Star 2025 </p>
                    </div>

                    <ul class="social text-lg-right">
                        <li><a href="#facebook"><i class="fab fa-facebook-f"></i></a></li>
                        <li><a href="#linkedin"><i class="fab fa-linkedin-in"></i></a></li>
                        <li><a href="#twitter"><i class="fab fa-twitter"></i></a></li>
                        <li><a href="#google"><i class="fab fa-google-plus-g"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
        </div>

        <!-- move top -->
        <button onclick="topFunction()" id="movetop" title="Go to top">
            <span class="fa fa-arrow-up" aria-hidden="true"></span>
        </button>
        <script>
            // When the user scrolls down 20px from the top of the document, show the button
            window.onscroll = function () {
                scrollFunction()
            };

            function scrollFunction() {
                if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                    document.getElementById("movetop").style.display = "block";
                } else {
                    document.getElementById("movetop").style.display = "none";
                }
            }

            // When the user clicks on the button, scroll to the top of the document
            function topFunction() {
                document.body.scrollTop = 0;
                document.documentElement.scrollTop = 0;
            }
        </script>
        <!-- /move top -->

    </section>
    <style>


        .sub-two-right h6 {
            color: #fff;
            margin-bottom: 15px;
        }

        .payment-icons li {
            margin-bottom: 10px;
        }

        .payment-icons img {
            height: 30px;

        }
        .payment-icons {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 8px;
            padding: 0;
            margin: 0;
        }

        .payment-icons li {
            list-style: none;
            text-align: center;
        }
        .payment-icons img {
            width: 80px;
            height: 45px;
            object-fit: contain;
        }

    </style>
</footer>
