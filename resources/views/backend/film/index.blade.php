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
                <a href="" class="btn btn-success mr5" style="margin-left:1100px" data-toggle="modal" data-target="#phimThemModal">  Thêm Mới <i class="fa fa-plus"></i></a>
                <br>
                <br>
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
                                                <button type="button" class="btn btn-info show-details" data-toggle="modal" data-target="#phimChiTietModal" data-phim-id="{{ $phim->M_id }}">Chi Tiết</button>
                                            </div>
                                            <br>
                                            <button type="button" class="btn btn-success show-edit" data-toggle="modal" data-target="#phimSuaModal" data-phim-id="{{ $phim->M_id }}">
                                                Sửa
                                            </button>
                                            <a>&ensp;</a>
                                            <button  type="button" class="btn btn-danger delete "  data-toggle="modal"  data-target="#deleteConfirmationModal" data-phim-id="{{ $phim->M_id }}">Xóa  </button>
                                        </div>
                                    </div>

                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
<!-- modal hiện -->
    <div class="modal fade" id="phimChiTietModal" tabindex="-1" role="dialog" aria-labelledby="phimChiTietModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">

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
                            <span class="fa fa-clock-o"> Thời Lượng</span> <span id="phimThoiLuong"> {{ $phim->thoiLuong }}</span> Min
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

    <!-- modal sửa -->
    <div class="modal fade" id="phimSuaModal" tabindex="-1" role="dialog" aria-labelledby="phimSuaModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="maPhim">Sửa thông tin phim  </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="formSuaPhim" method="POST" action ="">
                        @csrf

                        <div class="form-group">
                            <label for="tenPhim">Tên phim</label>
                            <input type="text" class="form-control" id="tenPhim" name="tenPhim" >
                        </div>
                        <div class="form-group">
                            <label for="imgBanner">Ảnh Banner</label>
                            <input type="text" class="form-control" id="imgBanner" name="imgBanner">
                        </div>
                        <div class="form-group">
                            <label for="Poster">Poster</label>
                            <input type="text" class="form-control" id="Poster" name="Poster">
                        </div>
                        <div class="form-group">
                            <label for="thoiLuong">Thời lượng (phút)</label>
                            <input type="number" class="form-control" id="thoiLuong" name="thoiLuong">
                        </div>
                        <div class="form-group">
                            <label for="moTa">Mô tả</label>
                            <textarea class="form-control" id="moTa" name="moTa"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="Trailer">Trailer URL</label>
                            <input type="text" class="form-control" id="Trailer" name="Trailer">
                        </div>
                        <label for="trangThai">Trạng thái</label>
                        <select class="form-control" id="trangThai" name="trangThai">
                            <option value="Đang chiếu">Đang chiếu</option>
                            <option value="Sắp chiếu">Sắp chiếu</option>
                            <option value="Đã chiếu">Đã chiếu</option>
                        </select>
                        <input type="hidden" id="M_id" name="M_id">


                         <div class="modal-footer">
                    <button  type ="submit" class="btn btn-primary" id="btnLuuSuaPhim">Lưu</button>
                    </form>

                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                </div>
            </div>
        </div>
        </div>
    </div>
    <!-- Modal xóa -->

    <div class="modal fade" id="deleteConfirmationModal" tabindex="-1" role="dialog" aria-labelledby="deleteConfirmationModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteConfirmationModalLabel">Xác nhận xóa</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Đóng">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Bạn có chắc chắn muốn xóa phim này không?
                </div>
                <div class="modal-footer">

                    <form id="formXoaPhim" method="GET" action ="">
                    @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btn-danger" id="confirmDeleteBtn">Xóa</button>
                    </form>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Thêm -->
    <div class="modal fade" id="phimThemModal" tabindex="-1" role="dialog" aria-labelledby="phimThemModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="phimThemModalLabel">Thêm phim mới</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="formThemPhim" method="POST" action="{{route('films.create')}} ">
                        @csrf
                        <div class="form-group">
                            <label for="tenPhim">Tên phim</label>
                            <input type="text" class="form-control" id="tenPhim" name="tenPhim" required>
                        </div>

                        <div class="form-group">
                            <label for="imgBanner">Ảnh Banner</label>
                            <input type="text" class="form-control" id="imgBanner" name="imgBanner">
                        </div>
                        <div class="form-group">
                            <label for="Poster">Poster</label>
                            <input type="text" class="form-control" id="Poster" name="Poster">
                        </div>
                        <div class="form-group">
                            <label for="thoiLuong">Thời lượng (phút)</label>
                            <input type="number" class="form-control" id="thoiLuong" name="thoiLuong">
                        </div>
                        <div class="form-group">
                            <label for="moTa">Mô tả</label>
                            <textarea class="form-control" id="moTa" name="moTa"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="Trailer">Trailer URL</label>
                            <input type="text" class="form-control" id="Trailer" name="Trailer">
                        </div>
                        <label for="trangThai">Trạng thái</label>
                        <select class="form-control" id="trangThai" name="trangThai">
                            <option value="Đang chiếu">Đang chiếu</option>
                            <option value="Sắp chiếu">Sắp chiếu</option>
                            <option value="Đã chiếu">Đã chiếu</option>
                        </select>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                    <button type="submit" class="btn btn-primary" form="formThemPhim">Thêm</button>
                </div>
            </div>
        </div>
    </div>        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>





    <!-- JS cho modal xem ct -->
    <script>
        var allPhims = @json($phims);
        var baseUrl = window.location.origin + '/';

        $(document).ready(function() {
            $('.show-details').click(function() {
                var phimId = $(this).data('phim-id');
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
        <!-- JS cho modal sửa -->

        $(document).ready(function() {

            $(document).ready(function () {
                $('.show-edit').click(function () {
                    var phimid = $(this).data('phim-id');
                    console.log('M_id của phim đã chọn:', phimid);


                    var selectedP = allPhims.find(phim => phim.M_id == phimid);

                    if (selectedP) {
                        $('#maPhim').val(selectedP.M_id);
                        $('#tenPhim').val(selectedP.tenPhim);
                        $('#imgBanner').val(selectedP.imgBanner);
                        $('#Poster').val(selectedP.Poster);
                        $('#thoiLuong').val(selectedP.thoiLuong);
                        $('#moTa').val(selectedP.moTa);
                        $('#Trailer').val(selectedP.Trailer);
                        $('#trangThai').val(selectedP.trangThai);
                        $('#formSuaPhim').attr('action', baseUrl + 'filmsupdate/' + phimid);

                    } else {
                        console.log('Không tìm thấy phim có ID:', phimid);
                    }
                });


                    });


        });
        <!-- JS cho xoa-->
        $(document).ready(function() {

            $(document).ready(function () {
                $('.delete').click(function () {
                    var phimid = $(this).data('phim-id');
                    console.log('M_id của phim đã chọn xoa :', phimid);
                    $('#formXoaPhim').attr('action', baseUrl + 'filmsdelete/' + phimid);

                });

            });

        });
    </script>
@endsection

