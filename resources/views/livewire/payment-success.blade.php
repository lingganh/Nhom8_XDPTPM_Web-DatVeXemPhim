<main class="ticket-system">
    <div class="top">
        <h1 class="title"> Chờ chút nha , tui đang in vé cho bà nè <3 </h1>
        @foreach($tickets as $ve )
        <div class="printer" >
        </div>
        <div class="receipts-wrapper">
            <div class="receipts">
                <div class="receipt">



                    <div class="route">
                        <h2>from FIVE Star Cinema with luv </h2>


                    </div>
                    <div class="details">
                        <div class="item">
                            <span>Phim </span>
                            <h3>{{$ve->lichChieu->phim->tenPhim}}</h3>
                        </div>
                        <div class="item">
                            <span>Phòng Chiếu</span>
                            <h3>{{$ve->phongchieu->ten_phong}}</h3>
                        </div>
                        <div class="item">
                            <span>Thời Gian</span>
                            <h3> {{$ve->lichChieu->gioBD}}</h3>
                        </div>
                        <div class="item">
                            <span>Ghế</span>
                            <h3>{{$ve->idG}}</h3>
                        </div>
                        <div class="item">
                            <span>Trạng Thái</span>
                            <h3>ĐÃ THANH TOÁN </h3>
                        </div>
                        <div class="item">
                            <span>Khách Hàng</span>
                            <h3>{{$ve->User->name}}</h3>
                        </div>
                    </div>
                </div>
                <div class="receipt qr-code">

                    <div class="description">
                        <h2>{{$ve->ticket_code}}</h2>
                        <p>Bạn nhớ xuất trình mã vé khi vào xem phim nhó !!!</p>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</main>
