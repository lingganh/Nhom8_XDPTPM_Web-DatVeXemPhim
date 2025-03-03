<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title> FIVE cinema | Login  </title>

    <link href=" backend/css/bootstrap.min.css" rel="stylesheet">
    <link href=" backend/css/font-awesome.css" rel="stylesheet">

    <link href="  backend/css/animate.css" rel="stylesheet">
    <link href="backend/css/style.css" rel="stylesheet">

</head>

<body class="gray-bg">

<div class="loginColumns animated fadeInDown">
    <div class="row">

        <div class="col-md-6">
            <h2 class="font-bold">Welcome to FIVE cinema</h2>

            <p>
                 FIVE Cinema – Magic on Screen!

            </p>
             Tại FIVE Cinema, từng khung hình là một thế giới kỳ diệu, nơi cảm xúc bùng nổ và những câu chuyện trở nên sống động

            <p>
             </p>
            Ánh đèn rực rỡ, những phút giây hồi hộp, và nụ cười không ngừng – đó là những gì FIVE Cinema mang đến cho bạn

            <p>
                 Khám phá thế giới của riêng bạn, được kể lại qua từng khung hình tại FIVE Cinema – nơi bạn luôn là một phần của câu chuyện

             </p>

            <p>
                <small> Địa chỉ : Hà Nội , Việt Nam  </small>
            </p>

        </div>
        <div class="col-md-6">
            <div class="ibox-content">



                <form class="m-t" method  = "POST" role="form" action="{{ route('auth.login') }}">

                    @csrf
                    <div class="form-group">
                        <input type="email" name = "email" class="form-control" placeholder="Username" >
                    </div>
                    <div class="form-group">
                        <input type="password" name = "password" class="form-control" placeholder="Password"  >
                    </div>
                    <!-- Tra ve Loi  -->




                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <button type="submit" class="btn btn-primary block full-width m-b">Login</button>


                </form>
                <p class="m-t">
                    <small>FIVE cinema  EST 2004 </small>
                </p>
            </div>
        </div>
    </div>
    <hr/>
    <div class="row">
        <div class="col-md-6">
            Copyright FIVE cinema
        </div>
        <div class="col-md-6 text-right">
            <small>© 2004-2025</small>
        </div>
    </div>
</div>

</body>

</html>
