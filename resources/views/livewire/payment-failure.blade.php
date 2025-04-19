<div>
    <br><br><br><br><br><br>
    <div class="container">
        <div class="alert alert-danger" role="alert">
            <h4 class="alert-heading">Thanh toán thất bại!</h4>
            <p>Rất tiếc, giao dịch thanh toán của bạn đã không thành công.</p>
            <hr>
            <p class="mb-0">Mã lỗi: {{ session('error') ?? 'Không xác định' }}. Vui lòng thử lại sau.</p>
        </div>
    </div>
</div>
