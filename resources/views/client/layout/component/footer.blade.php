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
                                    <li><a href="#">Phim</a></li>
                                    <li><a href="#">Băng Hình</a></li>
                                    <li><a href="#">Phim Tiếng Anh</a></li>
                                    <li><a href="#">Tailor</a></li>
                                    <li><a href="#">Phim Sắp Chiếu</a></li>
                                    <li><a href="Contact_Us.html">Liên Hệ chúng tôi</a></li>
                                </ul>
                            </div>
                            <div class="col-md-3 col-sm-6 sub-two-right mt-5">
                                <h6>thông tin</h6>
                                <ul>
                                    <li><a href="/"> Trang Chủ </a> </li>
                                    <li><a href="/">Quay Lại</a> </li>
                                    <li><a href="{{ route('user.movieIndex') }}">Phim</a> </li>
                                    <li><a href="#">Blogs</a> </li>
                                    <li><a href="{{ route('signin.index') }}">Đăng Nhập </a></li>
                                    <li><a href="{{ route('comments_web.index') }}">Liên Hệ </a></li>
                                </ul>
                            </div>
                            <div class="col-md-3 col-sm-6 sub-two-right mt-5">
                                <h6>Các hãng phim</h6>
                                <ul>
                                    <li><a href="movies.html">Pháp</a></li>
                                    <li><a href="movies.html">Vương Quốc Anh</a></li>
                                    <li><a href="movies.html">Áo </a></li>
                                    <li><a href="movies.html">Trung Quốc </a></li>
                                    <li><a href="movies.html">Hàn Quốc</a></li>
                                    <li><a href="movies.html">Nhật Bản</a></li>
                                </ul>
                            </div>
                            <div class="col-md-3 col-sm-6 sub-two-right mt-5">
                                <h6>Bản Tin</h6>
                                <form action="#" class="subscribe mb-3" method="post">
                                    <input type="email" name="email" placeholder="Địa chỉ Email của bạn" required="">
                                    <button><span class="fa fa-envelope-o"></span></button>
                                </form>
                                <p>Nhập email của bạn và nhận tin tức mới nhất, cập nhật và ưu đãi đặc biệt từ chúng tôi.
                                </p>
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
                        <li><a href="#facebook"><span class="fa fa-facebook" aria-hidden="true"></span></a>
                        </li>
                        <li><a href="#linkedin"><span class="fa fa-linkedin" aria-hidden="true"></span></a>
                        </li>
                        <li><a href="#twitter"><span class="fa fa-twitter" aria-hidden="true"></span></a>
                        </li>
                        <li><a href="#google"><span class="fa fa-google-plus" aria-hidden="true"></span></a>
                        </li>

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
</footer>
