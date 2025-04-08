@extends('frontend.app')
@section('content')
    <h1>Danh sách phim</h1>

    <style>
        /* Định dạng cho phần chứa các bộ phim */
        .container {
            display: grid; /* Sử dụng Grid Layout */
            grid-template-columns: repeat(4, 1fr); /* 4 cột đều */
            gap: 15px; /* Khoảng cách giữa các thẻ */
            padding: 20px;
            box-sizing: border-box; /* Đảm bảo padding không ảnh hưởng đến kích thước tổng thể */
        }

        /* Định dạng cho danh sách các bộ phim */
        .movie-card {
            background-color: white;
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 10px;
            text-align: center;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            height: 100%; /* Đảm bảo các thẻ có chiều cao bằng nhau */
        }

        .movie-card:hover {
            transform: scale(1.05); /* Khi di chuột vào, tăng kích thước */
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        /* Kích thước ảnh của phim */
        .movie-card img {
            width: 100%; /* Đảm bảo ảnh chiếm 100% chiều rộng của .movie-card */
            height: auto;
            border-radius: 5px;
            object-fit: cover;
        }

        /* Tiêu đề của bộ phim */
        .movie-card h3 {
            font-size: 18px;
            margin-top: 10px;
            color: #333;
        }

        /* Thiết lập cho giao diện mobile */
        @media (max-width: 1024px) {
            .container {
                grid-template-columns: repeat(3, 1fr); /* 3 cột trên màn hình nhỏ hơn (tablet) */
            }
        }

        @media (max-width: 768px) {
            .container {
                grid-template-columns: repeat(2, 1fr); /* 2 cột trên màn hình nhỏ hơn nữa */
            }
        }

        @media (max-width: 480px) {
            .container {
                grid-template-columns: 1fr; /* 1 cột trên màn hình rất nhỏ (mobile) */
            }
        }

    </style>
    @foreach($films as $film)


            <div class="movie-card">
                <a href="{{ route('frontend.movies.show', ['M_id' => $film->M_id]) }}">
                    <img src="{{ $film->Poster }}"  width="200">
                    <h3>{{ $film->tenPhim }}</h3>
                </a>
            </div>
    @endforeach
@endsection

