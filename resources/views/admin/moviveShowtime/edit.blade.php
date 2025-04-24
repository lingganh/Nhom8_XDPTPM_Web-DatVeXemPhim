@extends('admin.dashboard.layout')

@section('content')
    <div class="wrapper">
        <h2>Sửa Lịch Chiếu</h2>

        <form action="{{ route('admin.moviveShowtime.update', $lich->idLC) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label>Chọn phim</label>
                <select name="M_id" class="form-control">
                    @foreach($phims as $phim)
                        <option value="{{ $phim->M_id }}" {{ $phim->M_id == $lich->M_id ? 'selected' : '' }}>
                            {{ $phim->tenPhim }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label>Ngày chiếu</label>
                <input type="date" name="ngayChieu" class="form-control" value="{{ $lich->ngayChieu }}">
            </div>

            <div class="mb-3">
                <label>Giờ bắt đầu</label>
                <input type="time" name="gioBD" class="form-control" value="{{ \Carbon\Carbon::parse($lich->gioBD)->format('H:i') }}">
            </div>

            <button type="submit" class="btn btn-success">Cập nhật</button>
            <a href="{{ route('admin.moviveShowtime.index') }}" class="btn btn-secondary">Quay lại</a>
        </form>
    </div>
@endsection
