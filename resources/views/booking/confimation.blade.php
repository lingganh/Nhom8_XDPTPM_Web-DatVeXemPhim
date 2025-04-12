@extends('frontend.app')
@section('content')
    <br><br><br><br><br><br>
    <h3 style ="text-align:center">Xác Nhận Đơn Hàng</h3>

    <div class="box">

        <div>
            <h2>Ghế đã chọn:</h2>

                @if (!empty($selectedSeats))
                    @foreach ($selectedSeats as $seatId)
                        <li>{{ $seatId }}</li>
                    @endforeach
                @else
                    <li>Chưa có ghế nào được chọn.</li>
                @endif

        </div>

        <div>
            <h5>Đồ ăn và thức uống đã chọn:</h5>
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
                </ul>
            @else
                <p>Chưa có đồ ăn và thức uống nào được chọn.</p>
            @endif
        </div>

        <div>
            <h3>Tổng hóa đơn:</h3>
            <p>{{ number_format($giadoan + $totalSeatPrice ?? 0) }} VNĐ</p>
        </div>
        <form action="{{route('booking.payment')}}" method="POST">
            @csrf
            <button type="submit" class="btn btn-success mt-4">Tiến hành Thanh toán QR Code</button>
        </form>
    </div>
@endsection
