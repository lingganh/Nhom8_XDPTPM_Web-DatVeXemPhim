<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title> FIVE cosmetics | Login  </title>

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
                 Save The Best For You !
            </p>

            <p>
                XTLTH cosmetics là cửa hàng mỹ phẩm chính hãng online cung cấp nhiều thương hiệu nổi tiếng như Vichy, Bioderma, Senka, Shiseido, Innisfree, La Roche-Posay, …
            </p>

            <p>
                Cửa Hàng Chuyên Bán Mỹ Phẩm Chính Hãng Chọn Lọc Các Thương Hiệu Từ Anh, Pháp, Mỹ, Nhật.
            </p>

            <p>
                <small> Địa chỉ : Hà Nội , Việt Nam  </small>
            </p>

        </div>
        <div class="col-md-6">
            <div class="ibox-content">



                <form class="m-t" method  = "post" role="form" action="{{ route('auth.login') }}">

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
                    <small>FIVE cosmetics  EST 2004 </small>
                </p>
            </div>
        </div>
    </div>
    <hr/>
    <div class="row">
        <div class="col-md-6">
            Copyright FIVE cosmetic
        </div>
        <div class="col-md-6 text-right">
            <small>© 2004-2025</small>
        </div>
    </div>
</div>

</body>

</html>
