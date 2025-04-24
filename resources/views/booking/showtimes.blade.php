@extends('client.app')
@section('content')
    <br>
    <br> <br> <br> <br> <br> <br>
    <div class="container">
        <h1>Lịch chiếu phim: {{ $phim->tenPhim }}</h1>

        @if ($lichChieus->count() > 0)
            <ul>
                @foreach ($lichChieus as $lichChieu)
                    <li>
                        <strong>Ngày chiếu:</strong> {{ \Carbon\Carbon::parse($lichChieu->ngayChieu)->format('d/m/Y') }}<br>
                        <strong>Giờ chiếu:</strong> {{ \Carbon\Carbon::parse($lichChieu->gioBD)->format('H:i') }}<br>
                        <strong>Phòng chiếu:</strong> {{ $lichChieu->PC_id }} <br>
                        <strong>Thời lượng:</strong> {{ $lichChieu->thoiLuong }} phút<br>
                        <a href="{{ route('booking.seats', ['lich_chieu_id' => $lichChieu->idLC]) }}">Chọn ghế</a>

                    </li>
                @endforeach
            </ul>
        @else
            <p>Hiện tại không có lịch chiếu cho phim này.</p>
        @endif
    </div>

@endsection
