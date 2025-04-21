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
                            <img src="{{$user->img}}"
                                 style="width: 150px;"
                                 onerror="this.onerror=null; this.src='https://cdn2.fptshop.com.vn/small/avatar_trang_1_cd729c335b.jpg';" >
                            <h5 class="my-3"> {{$user->name}}
                            </h5>
                            <p class="text-muted mb-1">Khách Hàng Tiềm Năng </p>
                            <div class="d-flex justify-content-center mb-2">
                                <button  type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-outline-primary ms-1">Sửa Thông Tin </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Full Name</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0">{{$user->name}}</p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Email</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0">{{$user->email}}</p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Phone</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0">{{$user->phone}}</p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Ngày Sinh </p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0">{{$user->birthday}}</p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Address</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0">{{$user->address}}</p>
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
                                    <h5> Vé Của Tôi </h5>
                                </div>
                            </div>
                            <hr>
                            @foreach($ves as $ve )
                                <div class="card">
                                    <div class="card-body">
                                        <span>Phim :  {{$ve->lichChieu->phim->tenPhim}} , </span>
                                         <span>Phòng Chiếu : {{$ve->phongchieu->PC_id}} , </span>
                                         <span>Thời Gian : {{$ve->lichChieu->gioBD}} , </span>
                                         <span>Ghế : {{$ve->idG}} , </span>
                                        <span>Mã Vé : {{$ve->ticket_code}} </span>
                                     </div>
                                </div>

                            <br>
                            @endforeach


                        </div>

                    </div>
                </div>
            </div>
        </div>

      </section>

</div>
