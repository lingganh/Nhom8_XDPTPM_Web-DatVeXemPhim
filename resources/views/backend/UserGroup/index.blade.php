@extends('backend.dashboard.layout')
@section('content')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10" style = "margin-top: 10px">
            <h2>Nhóm Người Dùng </h2>
            <ol class="breadcrumb">
                <li>
                    <a href=" {{'dashboard/index'}}">Home</a>
                </li>
                <li class="active">
                    <strong> User Group List </strong>
                </li>
            </ol>
        </div>
        <div class="col-lg-2">

        </div>
    </div>
    <div class="container-xxl " style="margin-left: 40px">

    <h1>SUPER ADMIN</h1>
    <div class="user-cards-container">
        @foreach ($superAdmins as $item)
            <div class="col"> <div class="card">
                    <div class="img-fluid0">
                        <img src="{{ $item->image}}"
                             alt="{{ $item->name}}"
                             style="max-width: 120px ; height:120px; display: block;"
                             onerror="this.onerror=null; this.src='https://cdn2.fptshop.com.vn/small/avatar_trang_1_cd729c335b.jpg';" >
                        <br>
                        <div class="movie-buttons">
                            <button type="button" class="btn btn-warning show-phanquyen-user" data-toggle="modal" data-target="#UserPhanQuyenModal" data-user-id="{{ $item->id }}">
                                Phân Quyền
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">{{ $item->name }}</h5>
                        @if ($item['description'])
                            <p class="card-text">{{ Str::limit($item['description'], 100) }}</p>
                        @endif
                        <p class="card-text"><small class="text-muted"><b>Phone:</b> {{ $item->phone ?? 'N/A' }}</small></p>
                        <p class="card-text"><small class="text-muted"><b>Address:</b> {{ $item->address ?? 'N/A' }}</small></p>
                        <p class="card-text"><small class="text-muted"><b>Birthday:</b> {{ $item->birthday ??'N/A' }}</small></p>
                        <p class="card-text"><small class="text-muted"><b>Email:</b> {{ $item->email ?? 'N/A' }}</small></p>


                    </div>
                </div>
            </div>
        @endforeach
    </div>


            <h1>ADMIN</h1>
            <br>

            <div class="user-cards-container">
        @foreach ($Admins as $item)
            <div class="col"> <div class="card">
                    <div class="img-fluid0">
                        <img src="{{ $item->image}}"
                             alt="{{ $item->name}}"
                             style="max-width: 120px ; height:120px; display: block;"
                             onerror="this.onerror=null; this.src='https://cdn2.fptshop.com.vn/small/avatar_trang_1_cd729c335b.jpg';" >
                        <br>
                        <div class="movie-buttons">
                            <button type="button" class="btn btn-warning show-phanquyen-user" data-toggle="modal" data-target="#UserPhanQuyenModal" data-user-id="{{ $item->id }}">
                                Phân Quyền
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">{{ $item->name }}</h5>
                        @if ($item['description'])
                            <p class="card-text">{{ Str::limit($item['description'], 100) }}</p>
                        @endif
                        <p class="card-text"><small class="text-muted"><b>Phone:</b> {{ $item->phone ?? 'N/A' }}</small></p>
                        <p class="card-text"><small class="text-muted"><b>Address:</b> {{ $item->address ?? 'N/A' }}</small></p>
                        <p class="card-text"><small class="text-muted"><b>Birthday:</b> {{ $item->birthday ??'N/A' }}</small></p>
                        <p class="card-text"><small class="text-muted"><b>Email:</b> {{ $item->email ?? 'N/A' }}</small></p>


                    </div>
                </div>
            </div>
        @endforeach
    </div>

            <h1>KHÁCH HÀNG</h1>
            <br>

            <div class="user-cards-container">
                @foreach ($normalUsers as $item)
                    <div class="col"> <div class="card">
                            <div class="img-fluid0">
                                <img src="{{ $item->image}}"
                                     alt="{{ $item->name}}"
                                     style="max-width: 120px ; height:120px; display: block;"
                                     onerror="this.onerror=null; this.src='https://cdn2.fptshop.com.vn/small/avatar_trang_1_cd729c335b.jpg';" >
                                <br>
                                <div class="movie-buttons">
                                    <button type="button" class="btn btn-warning show-phanquyen-user" data-toggle="modal" data-target="#UserPhanQuyenModal" data-user-id="{{ $item->id }}">
                                        Phân Quyền
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">{{ $item->name }}</h5>
                                @if ($item['description'])
                                    <p class="card-text">{{ Str::limit($item['description'], 100) }}</p>
                                @endif
                                <p class="card-text"><small class="text-muted"><b>Phone:</b> {{ $item->phone ?? 'N/A' }}</small></p>
                                <p class="card-text"><small class="text-muted"><b>Address:</b> {{ $item->address ?? 'N/A' }}</small></p>
                                <p class="card-text"><small class="text-muted"><b>Birthday:</b> {{ $item->birthday ??'N/A' }}</small></p>
                                <p class="card-text"><small class="text-muted"><b>Email:</b> {{ $item->email ?? 'N/A' }}</small></p>


                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
    <div class="modal fade" id="UserPhanQuyenModal" tabindex="-1" role="dialog" aria-labelledby="UserPhanQuyenModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="UserPhanQuyenModalLabel">Phân Quyền Người Dùng</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="show-phanquyen-user" method="POST" action="" >
                        @csrf
                        @method('PUT')
                        <input type="hidden" id="phanquyen_user_id" name="user_id">
                        <div class="form-group">
                            <label for="role">Vai trò</label>
                            <select class="form-control" id="role" name="role">
                                <option value="">Khách hàng</option>
                                <option value="2">Admin</option>
                                <option value="1">Super Admin</option>
                            </select>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                    <button type="submit" class="btn btn-primary" form="show-phanquyen-user">Lưu Thay Đổi</button>
                </div>
            </div>
        </div>
    </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

        <script>
            var baseUrl = window.location.origin + '/';

            $(document).ready(function() {
            // JS cho modal phân quyền
            $('.show-phanquyen-user').on('click', function() {
                var userId = $(this).data('user-id');
                $('#phanquyen_user_id').val(userId);
                $('#show-phanquyen-user').attr('action', baseUrl + 'role/' + userId  );
            });
        });
    </script>


@endsection
