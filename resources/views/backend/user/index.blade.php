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
                    <div class="filter-box">
                        <div class="perpage">
                            <select class="form-control input-sm m-b-xs">
                                @for($i=20 ;$i<=200;$i++)
                                <option value="{{$i}}">{{$i}}Ban Ghi</option>
                                @endfor
                            </select>
                        </div>
                    </div>
                    <table class="table table-striped table table-bordered"  >
                        <thead class="text-center">

                        <tr >
                            <th class="text-center" > <input type="checkbox" id="checkAll" class="i-checks"></th>
                            <th class="text-center"> Ảnh </th>
                            <th class="text-center">Họ Tên  </th>
                            <th class="text-center">Email</th>
                            <th class="text-center">SDT</th>
                            <th class="text-center">Địa Chỉ</th>
                            <th class="text-center">Tình Trạng </th>
                            <th class="text-center">Thao Tác </th>
                        </tr>
                        </thead>
                        <tbody class="text-center">
                        <tr>
                            <td> <input type="checkbox" id="check item" class="i-checks"></td>
                           <td class="user-avatar">
                               <span class="image">
                                   <img style="height:120px" src="https://voguesg.s3.ap-southeast-1.amazonaws.com/wp-content/uploads/2021/12/22162655/V-featured-680x1020.jpg"  alt="Ảnh đại diện "></span>
                           </td>
                            <td>
                                  Kim Tae-hyung
                            </td><td>
                                      bighit@gmail.com

                            </td>
                            <td>
                                      0999999999

                            </td>
                            <td>
                               120 Hàng Ngang p Hàng Ngang Hoàn Kiếm Hà Nội

                            </td>
                            <td >
                                <input type="checkbox" class="js-switch" checked />
                            </td>
                            <td >
                                 <a href="" class="btn btn-success"><i class ="fa fa-edit"></i></a>
                                <a href="" class="btn btn-danger"><i class ="fa fa-trash"></i></a>
                            </td>
                        </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


@endsection



