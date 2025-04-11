@extends('frontend.app')
@section('content')
    <br><br><br><br><br><br>
    <div class="container">
        <h1>Xác Nhận Đơn Hàng</h1>

        <div>
            <h3>Ghế đã chọn:</h3>
            <ul>
                @if (!empty($selectedSeats))
                    @foreach ($selectedSeats as $seatId)
                        <li>{{ $seatId }}</li>
                    @endforeach
                @else
                    <li>Chưa có ghế nào được chọn.</li>
                @endif
            </ul>
        </div>

        <div>
            <h3>Đồ ăn và thức uống đã chọn:</h3>
            @if (!empty($selectedFood) && !empty($spchon))
                <ul>
                    @foreach ($spchon as $item)
                        @php
                            $quantity = $selectedFood[$item->idsp] ?? 0;
                        @endphp
                        @if ($quantity > 0)
                            <li>{{ $item->tensp }} - Số lượng: {{ $quantity }} - Giá: {{ number_format($item->gia * $quantity) }} VNĐ</li>
                        @endif
                    @endforeach
                </ul>
            @else
                <p>Chưa có đồ ăn và thức uống nào được chọn.</p>
            @endif
        </div>

        <div>
            <h3>Tổng hóa đơn:</h3>
            <p>{{ number_format($giaHD ?? 0) }} VNĐ</p>
        </div>
            <button type="submit" class="btn btn-success mt-4">Tiến hành Thanh toán QR Code</button>
        </form>
    </div>
@endsection
