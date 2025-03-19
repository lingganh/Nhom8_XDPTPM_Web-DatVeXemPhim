@extends('backend.dashboard.layout')
@section('content')
    <div class="container">
        <h2>Thống kê Doanh Thu</h2>

        <p><strong>Tổng doanh thu:</strong> {{ number_format($tongDoanhThu, 0, ',', '.') }} VNĐ</p>

        <h3>Doanh thu theo ngày</h3>
        <table class="table">
            <thead>
            <tr>
                <th>Ngày</th>
                <th>Doanh thu</th>
            </tr>
            </thead>
            <tbody>
            @foreach($doanhThuTheoNgay as $item)
                <tr>
                    <td>{{ $item->ngay }}</td>
                    <td>{{ number_format($item->doanhthu, 0, ',', '.') }} VNĐ</td>
                </tr>
            @endforeach
            </tbody>
        </table>

        <h3>Thống kê vé</h3>
        <table class="table">
            <thead>
            <tr>
                <th>Trạng thái</th>
                <th>Số lượng vé</th>
            </tr>
            </thead>
            <tbody>
            @foreach($veBanRa as $item)
                <tr>
                    <td>{{ $item->trangThai }}</td>
                    <td>{{ $item->soLuong }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <script src="{{ asset('backend/assets/js/doanhthu.js') }}"></script>


@endsection
