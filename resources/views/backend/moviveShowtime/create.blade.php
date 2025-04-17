@extends('backend.dashboard.layout')

@section('content')
    <div class="container mt-4">
        <h3>Thêm lịch chiếu</h3>
        <form action="{{ route('backend.moviveShowtime.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="M_id" class="form-label">Chọn phim</label>
                <select name="M_id" id="M_id" class="form-control" required>
                    <option value="">-- Chọn phim --</option>
                    @foreach($phims as $phim)
                        <option value="{{ $phim->M_id }}" data-thoiluong="{{ $phim->thoiLuong }}">
                            {{ $phim->tenPhim }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="ngayChieu" class="form-label">Ngày chiếu</label>
                <input type="date" name="ngayChieu" id="ngayChieu" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="gioBD" class="form-label">Giờ bắt đầu</label>
                <input type="time" name="gioBD" id="gioBD" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="thoiLuong" class="form-label">Thời lượng (phút)</label>
                <input type="number" name="thoiLuong" id="thoiLuong" class="form-control" readonly>
            </div>

            <button type="submit" class="btn btn-primary">Lưu</button>
            <a href="{{ route('backend.moviveShowtime.index') }}" class="btn btn-secondary">Quay lại</a>
        </form>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const selectPhim = document.getElementById('M_id');
            const inputThoiLuong = document.getElementById('thoiLuong');

            selectPhim.addEventListener('change', function () {
                const selectedOption = this.options[this.selectedIndex];
                const thoiluong = selectedOption.getAttribute('data-thoiluong');
                inputThoiLuong.value = thoiluong || '';
            });
        });
    </script>

@endsection
