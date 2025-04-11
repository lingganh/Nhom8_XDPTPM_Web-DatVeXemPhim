@extends('frontend.app')
@section('content')
<br><br><br><br><br><br>
<div class="container">
    <h1>Chọn Bỏng Nước</h1>
    <p>Vui lòng chọn các loại bỏng nước và đồ uống bạn muốn thêm vào đơn hàng:</p>

    <form action="{{ route('booking.confirm-food') }}" method="POST">
        @csrf
         @if (isset($foodItems) && count($foodItems) > 0)
        <div class="row">
            @foreach ($foodItems as $item)
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="{{ $item->img ?? 'https://via.placeholder.com/150' }}" class="card-img-top" alt="{{ $item->name }}" style ="height:300px ; weight :300px">
                    <div class="card-body">
                        <h5 class="card-title">{{ $item->tenSP }}</h5>
                        <p class="card-text">{{ number_format($item->donGia) }} VNĐ</p>
                        <div class="form-group">
                            <label for="quantity-{{ $item->idsp }}">Số lượng:</label>
                            <input type="number" class="form-control" id="quantity-{{ $item->idsp }}" name="food[{{ $item->idsp }}]" value="0" min="0">
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @else
        <p>Hiện chưa có bỏng nước và đồ uống nào.</p>
        @endif

        <button type="submit" class="btn btn-primary mt-4">Tiếp tục đến Thanh toán</button>
    </form>
</div>
@endsection
