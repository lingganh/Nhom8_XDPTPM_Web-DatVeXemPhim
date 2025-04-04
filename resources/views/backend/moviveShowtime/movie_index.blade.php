@extends('frontend.app')
@section('content')
    <!-- Modal Trailer -->
    <div id="trailerModal" class="movie-trailer-modal">
        <div class="movie-trailer-content">
            <span class="movie-trailer-close">&times;</span>
            <div class="movie-trailer-video">
                <iframe id="trailerFrame" width="100%" height="100%" src="" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
        </div>
    </div>

    <div class="movie-browser" style="margin-top:100px;">
        <div class="movie-browser-container">
            <div class="movie-browser-layout">
                <!-- Left Sidebar - Filters -->
                <form action="{{route('user.movieIndex')}}" method="get">
                    <div class="movie-browser-sidebar">
                        <h3 class="movie-browser-title">Bộ lọc tìm kiếm</h3>

                        <div class="movie-browser-filter-group">
                            <label class="movie-browser-label">Từ khóa</label>
                            <input type="text"
                                   placeholder="Tìm kiếm phim..."
                                   class="movie-browser-input"
                                   name="keyword"
                                   id="keyword" value="{{request()->keyword}}">
                        </div>



                        <!-- Sắp xếp -->
                        <div class="movie-browser-filter-group">
                            <label class="movie-browser-label">Sắp xếp</label>
                            <select class="movie-browser-select" name="sort" id="sort">

                                <option value="time_asc" {{request()->sort == 'time_asc' ? 'selected' : ''}}>Thời lượng phim tăng dần</option>
                                <option value="time_desc" {{request()->sort == 'time_desc' ? 'selected' : ''}}>Thời lượng phim giảm dần</option>
                                <option value="name_z_a" {{request()->sort == 'name_z_a' ? 'selected' : ''}}>Tên phim A-Z</option>
                                <option value="name_a_z" {{request()->sort == 'name_a_z' ? 'selected' : ''}}>Tên phim Z-A</option>
                            </select>
                        </div>

                        <!-- Apply Filter Button -->
                        <button class="movie-browser-button">
                            Áp dụng bộ lọc
                        </button>
                    </div>
                </form>
                <!-- Right Content - Movies Grid -->
                <div class="movie-browser-content">
                    <!-- Movies Grid -->
                    <div class="movie-browser-grid">
                        @foreach($phims as $phim)

                            <div class="movie-browser-card">
                                <div class="movie-browser-poster">
                                    <img src="{{$phim->Poster}}" alt="Movie" >
                                    <div class="movie-browser-overlay">
                                        <div class="movie-browser-actions">
                                            <a href="#" class="movie-browser-watch-btn">Đặt vé</a>
                                            <a href="javascript:void(0)" onclick="openTrailer('{{$phim->Trailer}}')" class="movie-browser-trailer-btn">Trailer</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="movie-browser-info">
                                    <h3>{{$phim->tenPhim}}</h3>
                                    <div class="movie-browser-meta">
                                        <div class="movie-browser-duration">
                                            <i class="fas fa-clock"></i>
                                            <span>{{$phim->thoiLuong}} phút</span>
                                        </div>
                                        <div class="movie-browser-description" title="{{$phim->moTa}}">
                                            <p>{{Str::limit($phim->moTa, 100, '...')}}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <!-- Pagination -->
                    <div class="movie-browser-pagination">
                        <nav class="movie-browser-nav">
                            {{ $phims->appends(request()->query())->links('vendor.pagination.bootstrap-4') }}
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        /* Movie Browser Component */
        .movie-browser {
            padding: 20px 0;
        }

        .movie-browser-container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 0 20px;
        }

        .movie-browser-layout {
            display: flex;
            gap: 30px;
            margin-top: 20px;
        }

        /* Sidebar */
        .movie-browser-sidebar {
            width: 300px;
            min-width: 300px;
            background: #fff;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            height: fit-content;
        }

        .movie-browser-title {
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 20px;
            color: #333;
        }

        .movie-browser-filter-group {
            margin-bottom: 20px;
        }

        .movie-browser-label {
            display: block;
            font-size: 14px;
            font-weight: 500;
            margin-bottom: 8px;
            color: #666;
        }

        .movie-browser-input,
        .movie-browser-select {
            width: 100%;
            padding: 8px 12px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 14px;
            color: #333;
            transition: all 0.3s ease;
        }

        .movie-browser-input:focus,
        .movie-browser-select:focus {
            border-color: #e50914;
            box-shadow: 0 0 0 2px rgba(229, 9, 20, 0.2);
            outline: none;
        }

        .movie-browser-button {
            width: 100%;
            padding: 10px;
            background: #e50914;
            color: white;
            border: none;
            border-radius: 4px;
            font-weight: 500;
            cursor: pointer;
            transition: background 0.3s ease;
        }

        .movie-browser-button:hover {
            background: #b2070f;
        }

        /* Content */
        .movie-browser-content {
            flex: 1;
        }

        .movie-browser-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 30px;
        }

        /* Movie Card */
        .movie-browser-card {
            background: #fff;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            transition: all 0.3s ease;
            height: 100%;
            display: flex;
            flex-direction: column;
        }

        .movie-browser-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 4px 8px rgba(0,0,0,0.2);
        }

        .movie-browser-poster {
            position: relative;
            aspect-ratio: 2/3;
            height: 300px;
            overflow: hidden;
            flex-shrink: 0;
        }

        .movie-browser-poster img {
            width: 100%;
            height: 100%;
            object-fit: contain;
            background: #f5f5f5;
            transition: transform 0.3s ease;
        }
        .page-item{
            margin:0px 10px !important;
        }
        .movie-browser-card:hover .movie-browser-poster img {
            transform: scale(1.1);
        }

        .movie-browser-overlay {
            position: absolute;
            inset: 0;
            background: rgba(0, 0, 0, 0.8);
            display: flex;
            align-items: center;
            justify-content: center;
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .movie-browser-card:hover .movie-browser-overlay {
            opacity: 1;
        }

        .movie-browser-actions {
            display: flex;
            flex-direction: column;
            gap: 10px;
            width: 80%;
        }

        .movie-browser-watch-btn,
        .movie-browser-trailer-btn {
            padding: 10px;
            text-align: center;
            border-radius: 4px;
            color: white;
            text-decoration: none;
            font-weight: bold;
            transition: background-color 0.3s ease;
        }

        .movie-browser-watch-btn {
            background: #e50914;
        }

        .movie-browser-trailer-btn {
            background: rgba(255, 255, 255, 0.2);
        }

        .movie-browser-watch-btn:hover {
            background: #b2070f;
        }

        .movie-browser-trailer-btn:hover {
            background: rgba(255, 255, 255, 0.3);
        }

        .movie-browser-info {
            padding: 16px;
            background: #fff;
        }

        .movie-browser-info h3 {
            font-size: 16px;
            font-weight: bold;
            margin-bottom: 12px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            color: #333;
            line-height: 1.2;
        }

        .movie-browser-meta {
            display: flex;
            flex-direction: column;
            gap: 8px;
        }

        .movie-browser-duration {
            display: flex;
            align-items: center;
            gap: 6px;
            color: #e50914;
            font-size: 14px;
            font-weight: 500;
        }

        .movie-browser-duration i {
            font-size: 12px;
        }

        .movie-browser-description {
            font-size: 13px;
            color: #666;
            line-height: 1.4;
            max-height: 54px;
            overflow: hidden;
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            text-overflow: ellipsis;
            position: relative;
            cursor: help;
        }

        .movie-browser-description:hover {
            text-decoration: underline;
            color: #e50914;
        }

        /* Thêm hiệu ứng mượt mà cho tooltip */
        [title] {
            position: relative;
            cursor: help;
        }

        [title]:hover::before {
            content: attr(title);
            position: absolute;
            bottom: 100%;
            left: 50%;
            transform: translateX(-50%);
            padding: 8px 12px;
            background: rgba(0, 0, 0, 0.8);
            color: white;
            font-size: 12px;
            border-radius: 4px;
            white-space: normal;
            max-width: 200px;
            width: max-content;
            text-align: center;
            z-index: 1000;
            pointer-events: none;
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        [title]:hover::after {
            content: '';
            position: absolute;
            bottom: calc(100% - 5px);
            left: 50%;
            transform: translateX(-50%);
            border: 5px solid transparent;
            border-top-color: rgba(0, 0, 0, 0.8);
            pointer-events: none;
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        [title]:hover::before,
        [title]:hover::after {
            opacity: 1;
        }

        /* Pagination */
        .movie-browser-pagination {
            margin-top: 30px;
            display: flex;
            justify-content: center;
        }

        .movie-browser-nav {
            display: flex;
            gap: 8px;
        }

        /* Ẩn các phần không cần thiết của phân trang */
        .movie-browser-nav span[aria-label="pagination navigation"] > span:first-child,
        .movie-browser-nav span[aria-label="pagination navigation"] > span:last-child,
        .movie-browser-nav span[aria-label="pagination navigation"] svg,
        .movie-browser-nav span[aria-label="pagination navigation"] span[aria-hidden="true"] {
            display: none !important;
        }

        /* Style cho các nút số trang */
        .movie-browser-nav span[aria-label="pagination navigation"] span:not([hidden]),
        .movie-browser-nav span[aria-label="pagination navigation"] a {
            padding: 8px 16px;
            background: #f5f5f5;
            color: #666;
            border-radius: 4px;
            text-decoration: none;
            transition: all 0.3s ease;
            margin: 0 4px;
            cursor: pointer;
        }

        /* Style cho trang hiện tại */
        .movie-browser-nav span[aria-current="page"] span {
            background: #e50914 !important;
            color: white !important;
        }

        /* Hover effect cho các nút */
        .movie-browser-nav span[aria-label="pagination navigation"] a:hover {
            background: #e0e0e0;
            color: #333 !important;
            display: none !important;
        }

        a:hover {
            color: white !important;
            text-decoration: none !important;
        }
        p{
            text-decoration: none !important;
        }
        .movie-browser-page-btn {
            padding: 8px 16px;
            background: #f5f5f5;
            color: #666;
            border-radius: 4px;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .movie-browser-page-btn:hover {
            background: #e0e0e0;
        }

        .movie-browser-page-btn.active {
            background: #e50914;
            color: white;
        }

        /* Responsive */
        @media (max-width: 1024px) {
            .movie-browser-layout {
                flex-direction: column;
            }

            .movie-browser-sidebar {
                width: 100%;
                min-width: 100%;
            }

            .movie-browser-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .movie-browser-poster {
                height: 280px;
            }
        }

        @media (max-width: 768px) {
            .movie-browser-grid {
                grid-template-columns: repeat(2, 1fr);
                gap: 20px;
            }

            .movie-browser-poster {
                height: 260px;
            }
        }

        @media (max-width: 480px) {
            .movie-browser-grid {
                grid-template-columns: 1fr;
                gap: 15px;
            }

            .movie-browser-container {
                padding: 0 10px;
            }

            .movie-browser-poster {
                height: 240px;
            }
        }
        .flex-1 a{
            display: none !important;
        }
        /* .ease-in-out{
            display: none !important;
        } */

        /* Modal Trailer */
        .movie-trailer-modal {
            display: none;
            position: fixed;
            z-index: 9999;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.9);
            overflow: auto;
        }

        .movie-trailer-content {
            position: relative;
            margin: auto;
            padding: 0;
            width: 90%;
            max-width: 900px;
            height: 90vh;
            max-height: 600px;
            top: 50%;
            transform: translateY(-50%);
        }

        .movie-trailer-video {
            width: 100%;
            height: 100%;
            background: #000;
            border-radius: 8px;
            overflow: hidden;
        }

        .movie-trailer-close {
            position: absolute;
            right: -30px;
            top: -30px;
            color: #fff;
            font-size: 28px;
            font-weight: bold;
            cursor: pointer;
            width: 30px;
            height: 30px;
            line-height: 30px;
            text-align: center;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 50%;
            transition: all 0.3s ease;
        }

        .movie-trailer-close:hover {
            background: rgba(255, 255, 255, 0.4);
        }

        @media (max-width: 768px) {
            .movie-trailer-content {
                width: 95%;
                height: 50vh;
            }

            .movie-trailer-close {
                right: 0;
                top: -40px;
            }
        }
    </style>

    <script>
        function openTrailer(trailerUrl) {
            if (!trailerUrl) {
                alert('Không tìm thấy đường dẫn trailer!');
                return;
            }

            const modal = document.getElementById('trailerModal');
            const frame = document.getElementById('trailerFrame');

            try {
                // Xử lý URL YouTube
                if (trailerUrl.includes('youtube.com') || trailerUrl.includes('youtu.be')) {
                    let videoId = '';

                    // Lấy video ID từ URL
                    if (trailerUrl.includes('youtube.com/watch?v=')) {
                        videoId = trailerUrl.split('v=')[1];
                    } else if (trailerUrl.includes('youtu.be/')) {
                        videoId = trailerUrl.split('youtu.be/')[1];
                    } else if (trailerUrl.includes('youtube.com/embed/')) {
                        videoId = trailerUrl.split('embed/')[1];
                    }

                    // Xử lý các tham số phụ trong URL
                    if (videoId && videoId.includes('&')) {
                        videoId = videoId.split('&')[0];
                    }

                    if (!videoId) {
                        throw new Error('Không thể xác định ID video YouTube');
                    }

                    // Tạo Embed URL với các tham số bổ sung
                    trailerUrl = `https://www.youtube.com/embed/${videoId}?autoplay=1&rel=0&showinfo=0&modestbranding=1`;
                }

                // Cập nhật iframe
                frame.src = trailerUrl;
                modal.style.display = 'block';

                // Xử lý lỗi loading iframe
                frame.onerror = function() {
                    alert('Không thể tải video. Vui lòng thử lại sau.');
                    modal.style.display = 'none';
                    frame.src = '';
                };

                // Thêm event listener cho nút đóng
                const closeBtn = document.querySelector('.movie-trailer-close');
                closeBtn.onclick = function() {
                    closeTrailer();
                }

                // Đóng modal khi click bên ngoài
                window.onclick = function(event) {
                    if (event.target == modal) {
                        closeTrailer();
                    }
                }

                // Thêm xử lý phím ESC
                document.addEventListener('keydown', function(event) {
                    if (event.key === 'Escape') {
                        closeTrailer();
                    }
                });

            } catch (error) {
                console.error('Lỗi khi mở trailer:', error);
                alert('Có lỗi xảy ra khi tải video. Vui lòng thử lại sau.');
            }
        }

        function closeTrailer() {
            const modal = document.getElementById('trailerModal');
            const frame = document.getElementById('trailerFrame');

            // Dừng video và đóng modal
            frame.src = '';
            modal.style.display = 'none';
        }
    </script>
@endsection
