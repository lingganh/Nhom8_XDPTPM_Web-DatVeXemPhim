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
                <form method="GET" action="{{ route('admin.moviveShowtime.index') }}" class="form-inline mb-3 row">
                    <div class="col-md-3">
                        <input type="text" name="keyword" class="form-control" placeholder="Tên phim..." value="{{ request('keyword') }}">
                    </div>
                    <div class="col-md-2">
                        <input type="date" name="ngayChieu" class="form-control" value="{{ request('ngayChieu') }}">
                    </div>
                    <div class="col-md-2">
                        <select name="phong" class="form-control">
                            <option value="">-- Phòng chiếu --</option>
                            @foreach(App\Models\PhongChieu::all() as $phong)
                                <option value="{{ $phong->PC_id }}" {{ request('phong') == $phong->PC_id ? 'selected' : '' }}>
                                    {{ $phong->ten_phong }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-2">
                        <select name="trangThai" class="form-control">
                            <option value="">-- Trạng thái --</option>
                            <option value="Sắp chiếu" {{ request('trangThai') == 'Sắp chiếu' ? 'selected' : '' }}>Sắp chiếu</option>
                            <option value="Đang chiếu" {{ request('trangThai') == 'Đang chiếu' ? 'selected' : '' }}>Đang chiếu</option>
                            <option value="Đã chiếu" {{ request('trangThai') == 'Đã chiếu' ? 'selected' : '' }}>Đã chiếu</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <button type="submit" class="btn btn-primary">Tìm kiếm</button>
                        <a href="{{ route('admin.moviveShowtime.index') }}" class="btn btn-secondary">Reset</a>
                    </div>
                </form>

                <div class="ibox-content">
                    <table class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th>Phim chiếu</th>
                            <th>Phòng chiếu</th>
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
                                <td>{{ $lich->phongChieu->ten_phong ?? $lich->PC_id }}</td>
                                <td>{{ \Carbon\Carbon::parse($lich->ngayChieu)->format('d-m-Y') }}</td>
                                <td>{{ \Carbon\Carbon::parse($lich->gioBD)->format('H:i') }}</td>
                                <td>{{ $lich->thoiLuong }}</td>
                                @php
                                    $now = \Carbon\Carbon::now();
                                    $ngayChieu = \Carbon\Carbon::parse($lich->ngayChieu);
                                    $gioBD = \Carbon\Carbon::parse($lich->gioBD);
                                    $batDau = $ngayChieu->copy()->setTimeFrom($gioBD);
                                    $ketThuc = $batDau->copy()->addMinutes($lich->thoiLuong ?? 0);

                                    if ($now->lt($batDau)) {
                                        $phanLoai = 'Sắp chiếu';
                                        $badgeClass = 'bg-info';
                                    } elseif ($now->between($batDau, $ketThuc)) {
                                        $phanLoai = 'Đang chiếu';
                                        $badgeClass = 'bg-success';
                                    } else {
                                        $phanLoai = 'Đã chiếu';
                                        $badgeClass = 'bg-secondary';
                                    }
                                @endphp

                                <td>
    <span class="badge {{ $badgeClass }}">
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
