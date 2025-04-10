@extends('frontend.app')
@section('content')

    <x-app-layout>
        <div class="container">
            <h1>Lịch chiếu phim: {{ $phim->ten_phim }}</h1>

            @if ($lichChieus->count() > 0)
                <ul>
                    @foreach ($lichChieus as $lichChieu)
                        <li>
                            <strong>Ngày chiếu:</strong> {{ $lichChieu->thoi_gian_bat_dau->format('d/m/Y') }}<br>
                            <strong>Giờ chiếu:</strong> {{ $lichChieu->thoi_gian_bat_dau->format('H:i') }}<br>
                            <strong>Phòng chiếu:</strong> {{ $lichChieu->phongChieu->ten_phong }}<br>
                         </li>

                    @endforeach
                </ul>
            @else
                <p>Hiện tại không có lịch chiếu cho phim này.</p>
            @endif
        </div>
    </x-app-layout>
@endsection
