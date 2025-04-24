<!DOCTYPE html>
<html>
<head>
    <title>Vé Xem Phim của bạn nè</title>
</head>
<body>
<h1>Bạn đã đặt vé thành công!</h1>

<h2> Hóa đơn:</h2>
<p>Ngày xuất: {{ $hoaDon->NgayXuat }}</p>
<p>Tổng tiền: {{ number_format($tongTien) }} VNĐ</p>

<h2>Thông tin vé:</h2>
@if(count($veArray) > 0)
    <ul>
        @foreach($veArray as $ve)
            <li>
                Phim: {{ $ve['tenPhim'] }}<br>
                Phòng chiếu: {{ $ve['tenPhong'] }}<br>
                Thời gian: {{ $ve['gioBD'] }}<br>
                Ghế: {{ $ve['ghe'] }}<br>
                Mã vé: {{ $ve['maVe'] }}
            </li>
        @endforeach
    </ul>
@else
    <p>Không có vé nào được đặt.</p>
@endif

@if(count($foodDetails) > 0)
    <h2>Thông tin đồ ăn/thức uống:</h2>
    <ul>
        @foreach($foodDetails as $food)
            <li>
                {{ $food['tenSP'] }} - Số lượng: {{ $food['soLuong'] }} - Đơn giá: {{ number_format($food['donGia']) }} VNĐ - Thành tiền: {{ number_format($food['thanhTien']) }} VNĐ
            </li>
        @endforeach
    </ul>
@endif

<p>Vui lòng giữ lại mã vé này để xuất trình khi đến rạp. Chúc bạn có những giây phút xem phim vui vẻ!</p>
</body>
</html>
