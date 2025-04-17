<main class="ticket-system" style="margin-left:400px">
  <div class="container">
      <div class="top">
          <br><br><br><br>
          <h3> Chờ chút nha , tui đang in vé cho bà nè &lt;3 </h3>
          @foreach($tickets as $ve )
              <div class="printer" />
      </div>
      <br><br>
      <div class="receipts-wrapper">
          <div class="receipts">
              <div class="receipt">



                  <div class="route">
                      <h4>from FIVE Star Cinema with luv </h4>


                  </div>
                  <div class="details">
                      <div class="item">
                          <span>Phim </span>
                          <h5>{{$ve->lichChieu->phim->tenPhim}}</h5>
                      </div>
                      <div class="item">
                          <span>Phòng Chiếu</span>
                          <h5>{{$ve->phongchieu->ten_phong}}</h5>
                      </div>
                      <div class="item">
                          <span>Thời Gian</span>
                          <h5> {{$ve->lichChieu->gioBD}}</h5>
                      </div>
                      <div class="item">
                          <span>Ghế</span>
                          <h5>{{$ve->idG}}</h5>
                      </div>
                      <div class="item">
                          <span>Mã Vé</span>
                          <h5>{{$ve->ticket_code}} </h5>
                      </div>
                      <div class="item">
                          <span>Ghi Chú</span>
                          <h6>Bạn nhớ lưu lại mã vé nhó !!!</h6>
                      </div>
                  </div>
              </div>

          </div>
      </div>
      @endforeach
  </div>
</main>
