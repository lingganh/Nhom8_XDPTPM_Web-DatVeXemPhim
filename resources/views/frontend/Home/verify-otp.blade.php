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

        <h1 data-text="OTP" class="text0">
            OTP
        </h1>
        <br><br>
        <input type="text" name="otp" id="otp" placeholder="Mã OTP của bạn " required>
        <br>
        @csrf
        <button type="submit">Xác Thực</button>

        <a href="#" id="resendOtpLink">Gửi lại OTP</a>


        <script>
            document.getElementById('resendOtpLink').addEventListener('click', function(event) {
                event.preventDefault(); // Ngăn chặn hành vi mặc định của thẻ <a>

                fetch('{{ route('resend-otp') }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}' // Thêm CSRF token
                    }
                    // Bạn có thể thêm body nếu cần gửi thêm dữ liệu
                })
                    .then(response => response.json()) // Hoặc response.text() tùy thuộc vào phản hồi của server
                    .then(data => {
                        console.log(data);
                        // Xử lý phản hồi từ server (ví dụ: hiển thị thông báo thành công)
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        // Xử lý lỗi
                    });
            });
        </script>
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
<style>
    .container_signup_signin {
        width: 400px; /* Giảm chiều rộng, bạn có thể điều chỉnh giá trị này */
        /* Các thuộc tính CSS khác của container có thể đã được định nghĩa trước đó */
        margin: 50px auto; /* Điều chỉnh margin để căn giữa nếu cần */
        padding: 30px; /* Có thể giảm padding nếu cần */
        /* Ví dụ các thuộc tính khác có thể có:
        background-color: #f9f9f9;
        border: 1px solid #ddd;
        border-radius: 5px;
        */
    }
    input[name="otp"]::placeholder {
        color: #aaa; /* Màu xám nhạt hơn, bạn có thể điều chỉnh mã màu này */
        opacity: 0.7; /* Điều chỉnh độ mờ nếu muốn */
    }
</style>
