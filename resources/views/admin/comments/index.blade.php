@extends('admin.dashboard.layout')
@section('content')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10" style = "margin-top: 10px">
            <h2>Góp Ý </h2>
            <ol class="breadcrumb">
                <li>
                    <a href=" ">Home</a>
                </li>
                <li class="active">
                    <strong> Comments </strong>
                </li>
            </ol>
        </div>
        <div class="col-lg-2">

        </div>
        <div class="col-md-12">
            <h3 class="text-center">Góp ý khách hàng</h3>
            <table class="table table-hover">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Họ và tên</th>
                    <th scope="col">Email</th>
                    <th scope="col">Số điện thọai</th>
                    <th scope="col">Nội dung</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($comnet as $key => $cmt)
                    <tr>
                        <th scope="row">{{ $key + 1 }}</th>
                        <td>{{ $cmt->name }}</td>
                        <td>{{ $cmt->email }}</td>
                        <td>{{ $cmt->phone }}</td>
                        <td>{{ $cmt->message }}</td>

                    </tr>
                @endforeach
                </tbody>
            </table>

        </div>


        <div class="col-md-12 text-center">
            <div>
                {{ $comnet->appends(request()->query())->links('vendor.pagination.bootstrap-4') }}
            </div>
        </div>
    </div>
@endsection
