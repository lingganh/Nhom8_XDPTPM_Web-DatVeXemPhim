<div>
    <div class="container">
        <h1>Thanh toán bằng VNPAY QR</h1>

        <p>Tổng số tiền cần thanh toán: {{ number_format($totalAmount) }} VNĐ</p>

        <form wire:submit.prevent="vnpay_payment">
            @csrf
             <button type="submit" class="btn btn-success">Thanh toán VNPAY</button>
        </form>
    </div>

</div>
