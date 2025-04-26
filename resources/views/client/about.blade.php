@extends('client.app')

@section('title', 'Về chúng tôi - Five Star Cinema')

@section('content')
    <div class="container py-5 mx-auto">
        <div class="bg-white shadow-lg rounded-2xl p-6 text-black flex flex-col md:flex-row gap-6 relative">
            <!-- Nội dung bên trái -->
            <div class="md:w-1/2 space-y-4 indent-8 leading-relaxed text-lg">
                <h1 class="text-4xl font-bold text-center md:text-left mb-6">Về chúng tôi</h1>
                <p>
                    <strong>Five Star Cinema</strong> tự hào là điểm đến giải trí hàng đầu dành cho những tín đồ yêu điện ảnh. Với không gian hiện đại, hệ thống âm thanh – ánh sáng chuẩn quốc tế và đội ngũ nhân viên chuyên nghiệp, Five Star mang đến trải nghiệm xem phim đỉnh cao, thoải mái và trọn vẹn nhất cho mọi khán giả.
                </p>

                <p>
                    Chúng tôi luôn cập nhật các bộ phim bom tấn mới nhất trong nước và quốc tế, đa dạng thể loại từ hành động, kinh dị đến tình cảm, hoạt hình… đáp ứng nhu cầu của mọi lứa tuổi. Ngoài ra, Five Star thường xuyên tổ chức các chương trình ưu đãi, sự kiện đặc biệt và suất chiếu sớm để khán giả có thêm nhiều lựa chọn giải trí thú vị.
                </p>

                <p>
                    Đặt khách hàng làm trung tâm, Five Star không ngừng cải tiến dịch vụ, mở rộng tiện ích để mỗi lần đến rạp là một lần tận hưởng trọn vẹn nghệ thuật điện ảnh.
                </p>

                <p class="text-xl font-semibold text-center md:text-left mt-6">
                    Five Star – Nơi trải nghiệm điện ảnh đẳng cấp!
                </p>
            </div>

            <!-- Hình ảnh bên phải (Ảnh chính) -->
            <div class="md:w-1/2 relative">
                <img src="https://evgroup.vn/wp-content/uploads/2024/04/thiet_bi_rap_phim_06.jpg" alt="Five Star Cinema" class="rounded-xl shadow-lg w-full h-auto object-cover">
                <!-- Ảnh đè lên góc của ảnh 2 -->
                <img src="https://thesaigontimes.vn/wp-content/uploads/2022/10/phim3.jpg" alt="Logo" class="absolute top-0 right-0 transform translate-x-4 -translate-y-4 w-40 h-40 rounded-full border-4 border-white shadow-xl">
            </div>
        </div>
    </div>
@endsection
