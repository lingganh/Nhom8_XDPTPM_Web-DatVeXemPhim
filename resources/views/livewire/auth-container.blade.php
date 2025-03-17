<div class="container_signup_signin" id="container_signup_signin">
    @if ($showLogin)
        <livewire:login-form />
    @else
        <livewire:register-form />
    @endif
    <div class="overlay-container">
        <div class="overlay">
            <div class="overlay-panel overlay-left">
                <h1>Chào mừng trở lại!</h1>
                <p>Để giữ kết nối với chúng tôi, vui lòng đăng nhập bằng thông tin đăng nhập của bạn</p>
                <button class="ghost" wire:click="switchToLogin">Đăng Nhập</button>
            </div>
            <div class="overlay-panel overlay-right">
                <h1>Xin Chào Bạn</h1>
                <p>Đăng ký và đặt vé ngay bây giờ!!!</p>
                <button class="ghost" wire:click="switchToRegister">Đăng Ký</button>
            </div>
        </div>
    </div>
</div>
