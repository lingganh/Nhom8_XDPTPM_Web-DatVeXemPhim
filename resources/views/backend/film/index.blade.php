@extends('backend.dashboard.layout')

@section('content')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10" style = "margin-top: 10px">
            <h2>Phim </h2>
            <ol class="breadcrumb">
                <li>
                    <a href="{{'dashboard/index'}} ">Home</a>
                </li>
                <li class="active">
                    <strong> Film List </strong>
                </li>
            </ol>
        </div>
        <div class="col-lg-2">

        </div>
    </div>
    <section class="w3l-grids">
        <div class="grids-main py-5">
            <div class="container py-lg-3">

                <div class="w3l-populohny-grids">
                    @php
                        $upcomingMovies = $phims->where('trangThai', 'Sắp chiếu') ;
                    @endphp
                    @foreach ($phims as $phim)
                        <div class="item vhny-grid">
                            <div class="box16">
                                <a  >
                                    <figure>
                                        <img class="img-fluid" src="{{ $phim->Poster }}" alt="{{ $phim->tenPhim }}">
                                    </figure>
                                    <div class="box-content">
                                        <h3 class="title">{{ $phim->tenPhim }}</h3>
                                        <h4>
                                        <span class="post">
                                            <span class="fa fa-clock-o"></span> {{ $phim->thoiLuong }} Min
                                        </span>
                                        </h4>

                                        <div class="movie-buttons">
                                            <div class="box">
                                                <button class="button btn-primary show-details" data-phim-id="{{ $phim->M_id }}">Chi Tiết</button>
                                            </div>
                                            <a href="" class="button btn-primary">Sửa </a>
                                            <a href="" class="button btn-primary">Xóa </a>
                                        </div>
                                    </div>
                                {{--                                </a>--}}
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <div class="modal fade" id="phimChiTietModal" tabindex="-1" role="dialog" aria-labelledby="phimChiTietModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="phimChiTietModalLabel">Chi tiết phim</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div id="thongTinChiTietPhim">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('.show-details').click(function() {
                var phimId = $(this).data('M_id');
                layVaHienThiChiTietPhim(phimId);
                $('#phimChiTietModal').modal('show');
            });

            function layVaHienThiChiTietPhim(id) {
                $.ajax({
                    url: '/api/phim/' + id, // Đảm bảo route này tồn tại trong api.php
                    method: 'GET',
                    success: function(data) {
                        // Cập nhật nội dung modal với dữ liệu nhận được
                        $('#phimChiTietModalLabel').text(data.tenPhim); // Ví dụ: Cập nhật tiêu đề modal
                        $('#thongTinChiTietPhim').html(`
                        <img class="img-fluid modal-poster" src="${data.Poster}" alt="${data.tenPhim}" style="margin-bottom: 10px;">
                        <p>Thời lượng: ${data.thoiLuong} Min</p>
                        <p>Mô tả: ${data.moTa || 'Không có mô tả'}</p>
                        // Thêm các thông tin chi tiết khác bạn muốn hiển thị
                        `);
                    },
                    error: function(error) {
                        console.error('Lỗi khi lấy chi tiết phim:', error);
                        $('#thongTinChiTietPhim').html('<p class="text-danger">Không thể tải thông tin chi tiết phim.</p>');
                    }
                });
            }
        });
    </script>
@endsection
