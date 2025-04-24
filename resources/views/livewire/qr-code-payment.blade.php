<div>
    <br><br><br><br>
<div class="checkout-container">
    <h3  >Xác Nhận Đơn Hàng & Thanh Toán</h3>

    <div>
        <h5>*Ghế đã chọn:
        @if (!empty($selectedSeats))
            <ul>
                @foreach ($selectedSeats as $seatId)
                    <li>{{ $seatId }}</li>
                @endforeach
            </ul>
        @else
            <p>Chưa có ghế nào được chọn.</p>
        @endif
        </h5>
    </div>

    <div>
        <h5>*Đồ ăn và thức uống đã chọn:
        @if (!empty($selectedFood) && !empty($spchon))
            <ul>
                @foreach ($spchon as $item)
                    @php
                        $quantity = $selectedFood[$item->idsp] ?? 0;
                    @endphp
                    @if ($quantity > 0)
                        <li>{{ $item->tenSP }} - Số lượng: {{ $quantity }} - Giá: {{ number_format($item->donGia * $quantity) }} VNĐ</li>
                    @endif
                @endforeach
        </h5>
            </ul>
        @else
            <p>Chưa có đồ ăn và thức uống nào được chọn.</p>
        @endif
    </div>

    <div>
        <h5>Tổng hóa đơn: {{ number_format($giadoan + $totalSeatPrice ?? 0) }} VNĐ</h5>
        @php
            $tongTien=$giadoan + $totalSeatPrice;
            session(['giaHD' => $tongTien]);
        @endphp
    </div>

    <hr>

    <h4>Thanh Toán</h4>
    <form wire:submit.prevent="vnpay_payment" >
        @csrf

        <button type="submit" class="btn btn-success" style="margin-left: 270px"  >Thanh toán VNPAY</button>
    </form>
</div>



</div>
