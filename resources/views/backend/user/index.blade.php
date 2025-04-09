@extends('backend.dashboard.layout')
@section('content')

    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10" style="margin-top: 10px">
            <h2>Người Dùng </h2>
            <ol class="breadcrumb">
                <li>
                    <a href="{{'dashboard.index'}} ">Home</a>
                </li>
                <li class="active">
                    <strong> User List </strong>
                </li>
            </ol>
        </div>

    </div>
    <br>
<br>
    <div class="container py-lg-2">
        <br><br>
        <div class="row mb-3">
            <div class="col-md-6">
                <form action="{{ route('user.index') }}" method="GET">
                    <input type="text" id="searchInput" class="form-control mb-2" placeholder="Tìm kiếm người dùng..." name="query" value="{{ request()->query('query') }}">
            </div>
            <div class="col-md-3">
                <button id="searchButton" type="submit" class="btn btn-primary">Tìm kiếm</button>
                </form>
                <a href="" class="btn btn-success mr5"   data-toggle="modal" data-target="#UserThemModal">  Thêm Mới <i class="fa fa-plus"></i></a>

            </div>
        </div>
    </div>
    <br><br>
    <section class="w3l-grids">
        <div class="grids-main py-5">
            <div class="container py-lg-5">
                <div class="row mb-5">
                    @foreach ($users as $item)
                        <div class="col-md-5 mb-5"> <div class="card">
                                <div class="img-fluid0">
                                    <img src="{{ $item->image }}"
                                         alt="{{ $item->name}}"
                                         style="max-width: 120px ; height:120px; display: block; object-fit: cover;"
                                         onerror="this.onerror=null; this.src='https://cdn2.fptshop.com.vn/small/avatar_trang_1_cd729c335b.jpg';" >
                                    <br>
                                    <div class="movie-buttons">
                                        <button type="button" class="btn btn-success show-edit-user" data-toggle="modal" data-target="#UserSuaModal" data-user-id="{{ $item->id }}">
                                            Sửa
                                        </button>
                                        <a>&ensp;</a>
                                        <button  type="button" class="btn btn-danger delete-user"  data-toggle="modal"  data-target="#deleteConfirmationModal" data-user-id="{{ $item->id }}">Xóa  </button>
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
            </div>
        </div>
    </section>
    <!--them-->
     <div class="modal fade" id="UserThemModal" tabindex="-1" role="dialog" aria-labelledby="UserThemModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="UserThemModalLabel">Thêm người dùng mới</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="formThemUser" method="POST" action="{{ route('user.create') }}">
                        @csrf
    <div class="form-group">
        <label for="name">Tên người dùng</label>
        <input type="text" class="form-control" id="name" name="name" required>
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" class="form-control" id="email" name="email" required>
    </div>
    <div class="form-group">
        <label for="password">Mật khẩu</label>
        <input type="password" class="form-control" id="password" name="password" required>
    </div>
    <div class="form-group">
        <label for="phone">Số điện thoại</label>
        <input type="text" class="form-control" id="phone" name="phone">
    </div>
    <div class="form-group">
        <label for="address">Địa chỉ</label>
        <input type="text" class="form-control" id="address" name="address">
    </div>
    <div class="form-group">
        <label for="birthday">Ngày sinh</label>
        <input type="date" class="form-control" id="birthday" name="birthday">
    </div>
    <div class="form-group">
        <label for="image">Ảnh đại diện URL</label>
        <input type="text" class="form-control" id="image" name="image">
    </div>
    <div class="form-group">
        <label for="description">Mô tả</label>
        <textarea class="form-control" id="description" name="description"></textarea>
    </div>
</form>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
<button type="submit" class="btn btn-primary" form="formThemUser">Thêm</button>
</div>
</div>
</div>
</div>
<!sua-->
    <div class="modal fade" id="UserSuaModal" tabindex="-1" role="dialog" aria-labelledby="UserSuaModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="UserSuaModalLabel">Sửa thông tin người dùng</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="formSuaUser" method="POST" action="">
                        @csrf
                        @method('PUT')
                        <input type="hidden" id="user_id" name="user_id">
                        <div class="form-group">
                            <label for="edit_name">Tên người dùng</label>
                            <input type="text" class="form-control" id="edit_name" name="name">
                        </div>
                        <div class="form-group">
                            <label for="edit_email">Email</label>
                            <input type="email" class="form-control" id="edit_email" name="email">
                        </div>
                        <div class="form-group">
                            <label for="edit_phone">Số điện thoại</label>
                            <input type="text" class="form-control" id="edit_phone" name="phone">
                        </div>
                        <div class="form-group">
                            <label for="edit_address">Địa chỉ</label>
                            <input type="text" class="form-control" id="edit_address" name="address">
                        </div>
                        <div class="form-group">
                            <label for="edit_birthday">Ngày sinh</label>
                            <input type="date" class="form-control" id="edit_birthday" name="birthday">
                        </div>
                        <div class="form-group">
                            <label for="edit_image">Ảnh đại diện URL</label>
                            <input type="text" class="form-control" id="edit_image" name="image">
                        </div>
                        <div class="form-group">
                            <label for="edit_description">Mô tả</label>
                            <textarea class="form-control" id="edit_description" name="description"></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                    <button type="submit" class="btn btn-primary" form="formSuaUser">Lưu</button>
                </div>
            </div>
        </div>
    </div>
<!-- XOa-->
    <div class="modal fade" id="deleteConfirmationModal" tabindex="-1" role="dialog" aria-labelledby="deleteConfirmationModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteConfirmationModalLabel">Xác nhận xóa</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Đóng">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="deleteConfirmationMessage">
                    Bạn có chắc chắn muốn xóa người dùng này không?
                </div>
                <div class="modal-footer">
                    <form id="formXoaUser" method="POST" action="">
                        @csrf
                        @method('DELETE')
                        <input type="hidden" id="delete_user_id" name="user_id">
                        <button type="submit" class="btn btn-danger" id="confirmDeleteBtn">Xóa</button>
                    </form>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                </div>
            </div>
        </div>
    </div>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <script>
        var allUsers = @json($users);
        var baseUrl = window.location.origin + '/';

        $(document).ready(function() {
            // JS cho modal sửa
            $('.show-edit-user').click(function() {
                var userId = $(this).data('user-id');
                var selectedUser = allUsers.find(user => user.id == userId);
                if (selectedUser) {
                    $('#user_id').val(selectedUser.id);
                    $('#edit_name').val(selectedUser.name);
                    $('#edit_email').val(selectedUser.email);
                    $('#edit_phone').val(selectedUser.phone);
                    $('#edit_address').val(selectedUser.address);
                    $('#edit_birthday').val(selectedUser.birthday ? selectedUser.birthday.split(' ')[0] : ''); // Format date
                    $('#edit_image').val(selectedUser.image);
                    $('#edit_description').val(selectedUser.description);
                    $('#formSuaUser').attr('action', baseUrl + 'user/' + userId);
                } else {
                    console.log('Không tìm thấy người dùng có ID:', userId);
                }
            });

            // JS cho modal xóa
            $('.delete-user').click(function() {
                var userId = $(this).data('user-id');
                $('#delete_user_id').val(userId);
                $('#formXoaUser').attr('action', baseUrl + 'user/' + userId);
            });
        });
    </script>

@endsection

