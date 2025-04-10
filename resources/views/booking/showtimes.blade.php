@extends('frontend.app')
@section('content')
<br>

        <div class="container">
            <h1>Lịch chiếu phim: {{ $phim->ten_phim }}</h1>

            @if ($lichChieus->count() > 0)
                <ul>
                    @foreach ($lichChieus as $lichChieu)
                        <li>

                          </li>

                    @endforeach
                </ul>
            @else
                <p>Hiện tại không có lịch chiếu cho phim này.</p>
            @endif
        </div>

@endsection
