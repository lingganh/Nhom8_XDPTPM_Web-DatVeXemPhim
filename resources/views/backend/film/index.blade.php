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
                                        <img class="img-fluid" src="{{ $phim->imgBanner }}" alt="{{ $phim->tenPhim }}">
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
                                                <button type="button" class="button btn-primary show-details" data-toggle="modal" data-target="#phimChiTietModal" data-phim-id="{{ $phim->M_id }}">
                                                    Chi Tiết
                                                </button>
                                            </div>
                                            <a href="" class="button btn-primary">Sửa </a>
                                            <a href="" class="button btn-primary">Xóa </a>
                                        </div>
                                    </div>

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
                    <h4 class="modal-title" id="phimChiTietModalLabel">Chi tiết phim</h4>
                    <h3 class="title" id ="Tenphim"> <br>  {{ $phim->tenPhim }}   </h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body "  >
                    <div id="thongTinChiTietPhim">
                        <h3 style="color:#c6006a">Ảnh  </h3>
                        <div class="image-container">
                        <img  class="imgB"  id="phimPoster" src="{{ $phim->imgBanner }}" alt="{{ $phim->tenPhim }}">

                        <img    class="imgP"  id="phimBanner" src="{{ $phim->Poster }}" alt="{{ $phim->tenPhim }}">
                        </div>
                        <hr>
                        <h3 style="color:#c6006a">
                            <span class="fa fa-clock-o"> Thời Lượng</span> <span id="phimThoiLuong">{{ $phim->thoiLuong }} Min </span>
                        </h3>
                        <a><b>Trạng Thái :</b> <span id="phimTrangThai">{{$phim->trangThai}}</span></a> <br>
                        <a><b>Mô tả : </b><span id="phimMoTa">{{$phim->moTa}}</span></a>
                        <hr>
                        <h3 style="color:#c6006a">Trailer  </h3>
                        <div id="small-dialog"  >
                            <iframe id="phimTrailer" width="560" height="315" src="{{$phim->Trailer}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                </div>
            </div>
        </div>
    </div>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <script>
        var allPhims = @json($phims);
        $(document).ready(function() {
            $('.show-details').click(function() {
                var phimId = $(this).data('phim-id'); // Sửa lại dòng này
                console.log('M_id của phim đã chọn:', phimId);
                var phimId = $(this).data('phim-id');

                var selectedPhim = allPhims.find(phim => phim.M_id == phimId);
                if (selectedPhim) {
                    $('#Tenphim').text(selectedPhim.tenPhim);
                    $('#phimBanner').attr('src', selectedPhim.imgBanner).attr('alt', selectedPhim.tenPhim);
                    $('#phimPoster').attr('src', selectedPhim.Poster).attr('alt', selectedPhim.tenPhim);
                    $('#phimThoiLuong').text(selectedPhim.thoiLuong);
                    $('#phimTrangThai').text(selectedPhim.trangThai);
                    $('#phimMoTa').text(selectedPhim.moTa);
                    $('#phimTrailer').attr('src', selectedPhim.Trailer);
                }
            });
        });
    </script>
@endsection

