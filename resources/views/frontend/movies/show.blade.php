@extends('frontend.app')
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <img src="{{ $film->Poster }}" alt="Poster phim" style="max-width: 300px;">
            </div>
            <div class="col-md-8">
                <h1>{{ $film->tenPhim }}</h1>
                <p><strong>Thời lượng:</strong> {{ $film->thoiLuong }} phút</p>
                <p><strong>Trạng thái:</strong> {{ $film->trangThai }}</p>
                <p><strong>Mô tả:</strong> {{ $film->moTa }}</p>

                @if($film->Trailer)
                    <p><strong>Trailer:</strong> <a href="{{ $film->Trailer }}" target="_blank">Xem Trailer</a></p>
                @endif
            </div>
        </div>
    </div>
@endsection
