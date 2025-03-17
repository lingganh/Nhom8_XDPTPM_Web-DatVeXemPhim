<div class="form-container sign-up-container">
    <form wire:submit.prevent="register">
        <h1>Create Account</h1>
        <div class="social-container">
            <a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
            <a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
            <a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
        </div>
        <span>Hoặc sử dụng email của bạn để đăng ký</span>
        <input type="text" placeholder="Tên" wire:model="name" />
        @error('name') <span class="error">{{ $message }}</span> @enderror
        <input type="email" placeholder="Email" wire:model="email" />
        @error('email') <span class="error">{{ $message }}</span> @enderror
        <input type="password" placeholder="Password" wire:model="password" />
        @error('password') <span class="error">{{ $message }}</span> @enderror
        <button type="submit">Đăng ký</button>
        @if (session()->has('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif
    </form>
</div>
