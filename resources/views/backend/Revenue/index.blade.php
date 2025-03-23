@extends('backend.dashboard.layout')

@section('content')
   <div class="container-fluid">
     <style type="text/css">
    p.title_thongke {
        text-align: center;
        font-size: 20px;
        font-weight:bold
    }
    </style>
    <div class="row">
        <p class="title_thongke">Thống kê đơn hàng doanh số</p>
        <form autocomplete="off">
            @csrf
            <div class="col-md-2">
                <p>
                    Từ ngày:
                    <input type="text" id="datepicker" class="form-control">
                </p>
                <input type="button" id="btn-dashboard-filter" class="btn btn-primary btn-sm" value="Lọc kết quả">
            </div>

            <div class="col-md-2">
                <p>
                    Đến ngày:
                    <input type="text" id="datepicker2" class="form-control">
                </p>
            </div>

            <div class="col-md-2">
                <p>Lọc theo:</p>
                <select class="dashboard-filter form-control">
                    <option value="">-- Chọn --</option>
                    <option value="ngay">7 ngày qua</option>
                    <option value="thangtruoc">Tháng trước</option>
                    <option value="thangnay">Tháng này</option>
                    <option value="365ngayqua">365 ngày qua</option>
                </select>
            </div>
        </form>


    </div>
       <div class="col-md-12">
           <div id="myfirstchart" style="height: 250px;"></div>
       </div>
@endsection
