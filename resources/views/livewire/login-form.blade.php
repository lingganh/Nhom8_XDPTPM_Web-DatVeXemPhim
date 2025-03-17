<div class="form-container sign-in-container">
    <form wire:submit.prevent="login">
        <h1>Đăng Nhập</h1>
        <div class="social-container">
            <a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
            <a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
            <a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
        </div>
        <span>Hoặc sử dụng tài khoản của bạn</span>
        <input type="email" placeholder="Email" wire:model="email" />
        @error('email') <span class="error">{{ $message }}</span> @enderror
        <input type="password" placeholder="Mật Khẩu" wire:model="password" />
        @error('password') <span class="error">{{ $message }}</span> @enderror
        <a href="#">Quên mật khẩu?</a>
        <button type="submit">Đăng nhập</button>
        @if (session()->has('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @elseif(session()->has('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
    </form>
</div>
