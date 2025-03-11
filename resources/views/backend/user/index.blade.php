@extends('backend.dashboard.layout')
@section('content')

    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10" style = "margin-top: 10px">
            <h2>Người Dùng </h2>
            <ol class="breadcrumb">
                <li>
                    <a href="{{'dashboard/index'}} ">Home</a>
                </li>
                <li class="active">
                    <strong> User List </strong>
                </li>
            </ol>
        </div>
        <div class="col-lg-2">

        </div>
    </div>
 <br>
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Danh Sách Thành Viên </h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-wrench"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                            <li><a href="#">Config option 1</a>
                            </li>
                            <li><a href="#">Config option 2</a>
                            </li>
                        </ul>
                        <a class="close-link">
                            <i class="fa fa-times"></i>
                        </a>
                    </div>
                </div>
                <div class="ibox-content" style="">

                    <table class="table table-striped table table-bordered">
                        <thead>

                        <tr>
                            <th> <input type="checkbox" id="checkAll" class="i-checks"></th>
                            <th>Ảnh </th>
                            <th>Thông Tin Thành Viên </th>
                            <th>Địa Chỉ </th>
                            <th>Tình Trạng </th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td> <input type="checkbox" id="check item" class="i-checks"></td>
                           <td>
                               <span class="image">
                                   <img style="height:120px" src="https://voguesg.s3.ap-southeast-1.amazonaws.com/wp-content/uploads/2021/12/22162655/V-featured-680x1020.jpg"  alt="Ảnh đại diện "></span>
                           </td>
                            <td>
                                <div class="user-items name">
                                    Họ và Tên : Kim Tae-hyung
                                </div>
                                <div class="user-items mail">
                                    Email : abc@gmal.com
                                </div>
                                <div class="user-items phone">
                                    SDT : 0999999999
                                </div>
                            </td>
                            <td>
                                <div class="address-items">
                                    Địa Chỉ  : 120 Hàng Ngang
                                </div>
                                <div class="address-items ">
                                    Phường : Hàng Ngang
                                </div>
                                <div class="address-items ">
                                    Quận : Hoàn Kiếm
                                </div>
                                <div class="address-items ">
                                   Thành Phố : Hà Nội
                                </div>
                            </td>
                            <td>
                                <input type="checkbox" class="js-switch" checked />
                            </td>
                        </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


@endsection



