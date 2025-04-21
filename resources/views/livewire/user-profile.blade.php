<div>
    <br><br><br><br>

    <section style="background-color: #eee;">
        <div class="container py-5">
            <div class="row">
                <div class="col">
                    <h3>Thông Tin Người Dùng</h3>
                    <br>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-4">
                    <div class="card mb-4">
                        <div class="card-body text-center">
                            <img src="{{ $user->img ?? 'https://cdn2.fptshop.com.vn/small/avatar_trang_1_cd729c335b.jpg' }}"
                                 style="width: 150px; border-radius: 50%; object-fit: cover; object-position: center;"
                                 onerror="this.onerror=null; this.src='https://cdn2.fptshop.com.vn/small/avatar_trang_1_cd729c335b.jpg';" >
                            <h5 class="my-3"> {{ $user->name }}
                            </h5>
                            <p class="text-muted mb-1">Khách Hàng Tiềm Năng </p>
                            <div class="d-flex justify-content-center mb-2">
                                <button type="button" class="btn btn-outline-primary ms-1" data-bs-toggle="modal" data-bs-target="#editProfileModal">
                                    Sửa Thông Tin
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Tên</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0">{{ $user->name }}</p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Email</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0">{{ $user->email }}</p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Số Điện Thoại</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0">{{ $user->phone }}</p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Ngày Sinh</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0">{{ $user->birthday }}</p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Địa Chỉ</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0">{{ $user->address }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="card mb-8">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-3">
                                    <h5>Vé Của Tôi</h5>
                                </div>
                            </div>
                            <hr>
                            @foreach($ves as $ve )
                                <div class="card mb-2">
                                    <div class="card-body">
                                        <span>Phim: {{ $ve->lichChieu->phim->tenPhim }} , </span>
                                        <span>Phòng Chiếu: {{ $ve->phongchieu->ten_phong }} , </span>
                                        <span>Thời Gian: {{ $ve->lichChieu->gioBD }} , </span>
                                        <span>Ghế: {{ $ve->idG }} , </span>
                                        <span>Mã Vé: {{ $ve->ticket_code }} </span>
                                    </div>
                                </div>
                            @endforeach
                         </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Modal Sửa Thông Tin --}}
    <div class="modal fade" id="editProfileModal" tabindex="-1"  role="dialog"  aria-labelledby="editProfileModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editProfileModalLabel">Sửa Thông Tin Cá Nhân</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form wire:submit.prevent="updateProfile">
                        <div class="mb-3 text-center">
                            <img src="{{ $img ?? 'https://cdn2.fptshop.com.vn/small/avatar_trang_1_cd729c335b.jpg' }}"
                                 alt="Current Avatar" style="width: 100px; border-radius: 50%; object-fit: cover; object-position: center;">
                        </div>

                        <div class="mb-3">
                            <label for="name" class="form-label">Tên</label>
                            <input type="text" class="form-control" id="name" wire:model="name">
                            @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" wire:model="email" readonly>
                         </div>
                        <div class="mb-3">
                            <label for="phone" class="form-label">Số Điện Thoại</label>
                            <input type="text" class="form-control" id="phone" wire:model="phone">
                            @error('phone') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-3">
                            <label for="birthday" class="form-label">Ngày Sinh</label>
                            <input type="date" class="form-control" id="birthday" wire:model="birthday">
                            @error('birthday') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-3">
                            <label for="address" class="form-label">Địa Chỉ</label>
                            <textarea class="form-control" id="address" wire:model="address"></textarea>
                            @error('address') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-info" data-bs-dismiss="modal">Đóng</button>
                            <button type="submit" class="btn btn-primary">Lưu Thay Đổi</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('livewire:load', function () {
            Livewire.on('profileUpdated', function () {
                 setTimeout(function() {
                    window.location.reload();
                }, 100);
            });
        });
    </script>
</div>


