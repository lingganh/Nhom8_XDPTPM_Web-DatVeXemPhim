@extends('admin.dashboard.layout')
@section('content')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10" style = "margin-top: 10px">
            <h2> Lịch Chiếu Phim </h2>
            <ol class="breadcrumb">
                <li>
                    <a href=" {{'dashboard/index'}}">Home</a>
                </li>
                <li class="active">
                    <strong> Movie ShowTime </strong>
                </li>
            </ol>
        </div>
        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="ibox">
                <div class="ibox-title">
                    <a href="{{ route('admin.moviveShowtime.create') }}" class="btn btn-primary"> Tạo lịch chiếu</a>
                    <a href="{{ route('admin.moviveShowtime.index') }}" class="btn btn-info">Refresh</a>
                </div>
                <div class="ibox-content">
                    <table class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th>Phim chiếu</th>
                            <th>Ngày chiếu</th>
                            <th>Giờ bắt đầu</th>
                            <th>Thời lượng (phút)</th>
                            <th>Phân loại</th>
                            <th>Hành động</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($lichchieu as $lich)
                            <tr>
                                <td>{{ $lich->phim->tenPhim ?? 'N/A' }}</td>
                                <td>{{ \Carbon\Carbon::parse($lich->ngayChieu)->format('d-m-Y') }}</td>
                                <td>{{ \Carbon\Carbon::parse($lich->gioBD)->format('H:i') }}</td>
                                <td>{{ $lich->thoiLuong }}</td>
                                <td>
                                    @php
                                        $today = \Carbon\Carbon::today();
                                        $phanLoai = $lich->ngayChieu > $today ? 'Sắp chiếu' : 'Đang chiếu';
                                    @endphp
                                    <span class="badge {{ $phanLoai == 'Sắp chiếu' ? 'bg-info' : 'bg-success' }}">
                                    {{ $phanLoai }}
                                </span>
                                </td>
                                <td>
                                    <a href="{{ route('admin.moviveShowtime.edit', $lich->idLC) }}" class="btn btn-sm btn-primary">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <form action="{{ route('admin.moviveShowtime.destroy', $lich->idLC) }}" method="POST" style="display:inline;" onsubmit="return confirm('Bạn có chắc chắn muốn xoá lịch chiếu này không?');">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
                                    </form>

                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div class="d-flex justify-content-end mt-3">
                        {{ $lichchieu->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
    </div>

@endsection
