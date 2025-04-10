@extends('backend.dashboard.layout')
@section('content')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10" style = "margin-top: 10px">
            <h2>Vé </h2>
            <ol class="breadcrumb">
                <li>
                    <a href=" {{'dashboard/index'}}">Home</a>
                </li>
                <li class="active">
                    <strong> Ticket </strong>
                </li>
            </ol>
        </div>
        <div class="col-lg-2">

        </div>
    </div>

    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Tìm kiếm vé</h5>
                    </div>
                    <div class="ibox-content">
                        <div class="grids-main py-5">
                            <div class="container py-lg-3">
                                <div class="container py-lg-3">
                                    <br><br>
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <form action="{{ route('admin.tickets.index') }}" method="GET" class="row">
                                                <div class="col-md-6 mb-3">
                                                    <input type="text" id="searchInput" class="form-control" placeholder="Tìm kiếm vé..." name="query" value="{{ request()->query('query') }}">
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <input type="date" id="dateFilter" class="form-control" name="date" value="{{ request()->query('date') }}">
                                                </div>
                                        </div>
                                        <div class="col-md-3">
                                            <button id="searchButton" type="submit" class="btn btn-primary">Tìm kiếm</button>
                                            </form>
                                        </div>
                                    </div>
                                    <div id="searchResults" class="w3l-populohny-grids">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Danh sách vé</h5>
                    </div>
                    <div class="ibox-content">
                        <div class="table-responsive">
                            @if ($tickets->isEmpty())
                                <p>Không có vé nào.</p>
                            @else
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        <th>ID Vé</th>
                                        <th>Tên người dùng</th>
                                        <th>Tên phim</th>
                                        <th>User </th>
                                        <th>Lịch Chiếu ID</th>
                                        <th>Phòng Chiếu ID</th>
                                        <th>Ghế ID</th>
                                        <th>Giá Vé</th>
                                        <th>Trạng Thái</th>
                                        <th>Ngày tạo</th>
                                        <th>Ngày cập nhật</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($tickets as $ticket)
                                        <tr>
                                            <td>{{ $ticket->idVe }}</td>
                                            <td>{{ $ticket->user->name }}</td>
                                            <td>{{ $ticket->lichChieu->phim->tenPhim }}</td>
                                            <td>{{ $ticket->user_id }}</td>
                                            <td>{{ $ticket->idLC }}</td>
                                            <td>{{ $ticket->PC_id }}</td>
                                            <td>{{ $ticket->idG }}</td>
                                            <td>{{ $ticket->giaVe }}</td>
                                            <td>{{ $ticket->trangThai }}</td>
                                            <td>{{ $ticket->created_at }}</td>
                                            <td>{{ $ticket->updated_at }}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
