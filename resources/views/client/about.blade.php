@extends('layouts.app')

@section('title', 'Giới thiệu - Five Star Cinema')

@section('content')
    <style>
        .about-container {
            max-width: 1200px;
            margin: 40px auto;
            padding: 0 20px;
        }
        .about-text {
            text-align: center;
            margin-bottom: 50px;
        }
        .gallery {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
        }
        .gallery img {
            width: 100%;
            height: 250px;
            object-fit: cover;
            border-radius: 12px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            cursor: pointer;
            transition: transform 0.3s;
        }
        .gallery img:hover {
            transform: scale(1.05);
        }

        /* Lightbox style */
        .lightbox {
            display: none;
            position: fixed;
            z-index: 999;
            padding-top: 60px;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0,0,0,0.8);
        }
        .lightbox-content {
            margin: auto;
            display: block;
            max-width: 80%;
            max-height: 80%;
        }
        .close {
            position: absolute;
            top: 30px;
            right: 50px;
            color: #fff;
            font-size: 40px;
            font-weight: bold;
            cursor: pointer;
        }
    </style>

    <div class="about-container">
        <div class="about-text">
            <br>
            <h1>Giới thiệu về Five Star Cinema</h1>
            <p>Chào mừng bạn đến với <strong>Five Star Cinema</strong> – nơi trải nghiệm điện ảnh đỉnh cao!</p>
            <p>Tọa lạc tại vị trí trung tâm, Five Star tự hào là điểm đến lý tưởng cho những tín đồ yêu điện ảnh. Với hệ thống phòng chiếu hiện đại, âm thanh sống động chuẩn Dolby Atmos và màn hình sắc nét, chúng tôi cam kết mang đến cho bạn những trải nghiệm điện ảnh tuyệt vời nhất.</p>
            <p><strong>Five Star</strong> không chỉ là nơi thưởng thức những bom tấn mới nhất, mà còn là không gian lý tưởng để bạn tận hưởng những phút giây giải trí, thư giãn bên gia đình và bạn bè. Chúng tôi luôn nỗ lực cập nhật các bộ phim đa dạng từ điện ảnh Việt, Hollywood cho đến các tác phẩm nghệ thuật quốc tế, đáp ứng mọi sở thích của khán giả.</p>
            <h3>Tại sao chọn Five Star?</h3>
            <ul style="text-align: left; display: inline-block;">
                <li><strong>Chất lượng dịch vụ hàng đầu:</strong> Đội ngũ nhân viên thân thiện, chuyên nghiệp luôn sẵn sàng phục vụ.</li>
                <li><strong>Tiện nghi hiện đại:</strong> Ghế ngồi êm ái, không gian rộng rãi và sạch sẽ.</li>
                <li><strong>Ưu đãi hấp dẫn:</strong> Các chương trình khuyến mãi và combo vé + bắp nước cực kỳ ưu đãi mỗi ngày.</li>
                <li><strong>Đặt vé nhanh chóng:</strong> Hệ thống website và ứng dụng đặt vé tiện lợi, dễ sử dụng.</li>
            </ul>
            <p><strong>Five Star Cinema</strong> – nơi mỗi khoảnh khắc xem phim của bạn đều trở nên đặc biệt!</p>
        </div>

        <div class="gallery">
            <img src="https://watermark.lovepik.com/photo/20211119/large/lovepik-cinema-picture_500180044.jpg" alt="Gallery 1" onclick="openLightbox(this.src)">
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSn7YuL2eFLt_f8a2MV-K3wt0e_18ilQl7_5g&s" alt="Gallery 2" onclick="openLightbox(this.src)">
            <img src="https://maychieuphim.vn/files/assets/kich_thuoc_man_chieu_phim_gala.png" alt="Gallery 3" onclick="openLightbox(this.src)">
            <img src="https://toquoc.mediacdn.vn/thumb_w/640/280518851207290880/2023/3/4/z4155620591238aca91ffdb9d9fd78b233d2edc4e38970-16779292781581017414593.jpg" alt="Gallery 4" onclick="openLightbox(this.src)">
            <img src="https://cdn-images.vtv.vn/2020/10/7/rap-chieu-phim-viet-16020080038541921924480.jpg" alt="Gallery 5" onclick="openLightbox(this.src)">
            <img src="https://busmedia.vn/wp-content/uploads/2021/09/quang-cao-tai-rap-chieu-phim-unique-ooh-34.jpg" alt="Gallery 6" onclick="openLightbox(this.src)">
            <img src="https://azgroup.net.vn/wp-content/uploads/2020/03/quang-cao-tai-rap-lotte-cinema-can-tho.jpg" alt="Gallery 7" onclick="openLightbox(this.src)">
            <img src="https://skynext.vn/wp-content/uploads/2021/09/Rap-chieu-phim-quoc-Gia-Ha-Noi-lich-chieu-phim-004.jpg" alt="Gallery 8" onclick="openLightbox(this.src)">
            <img src="https://cdn.vntrip.vn/cam-nang/wp-content/uploads/2017/11/hinh-anh-rap-chieu-phim-giuong-nam-L%E2%80%99amour.png" alt="Gallery 9" onclick="openLightbox(this.src)">
        </div>

    </div>

    <!-- Lightbox -->
    <div id="lightbox" class="lightbox" onclick="closeLightbox()">
        <span class="close">&times;</span>
        <img class="lightbox-content" id="lightbox-img">
    </div>

    <script>
        function openLightbox(src) {
            document.getElementById('lightbox').style.display = 'block';
            document.getElementById('lightbox-img').src = src;
        }
        function closeLightbox() {
            document.getElementById('lightbox').style.display = 'none';
        }
    </script>
@endsection
