@extends('layouts.app')

@section('title', 'Quên Mật Khẩu')
<br><br>
<br><br>

@section('content')
    <br><br>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Quên Mật Khẩu') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form method="POST" action="{{ route('password.email') }}">
                            @csrf

                            <div class="mb-3">
                                <label for="email" class="form-label">{{ __('Địa chỉ Email') }}</label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Gửi Link Đặt Lại Mật Khẩu') }}
                                </button>
                            </div>
                        </form>
                        <div class="mt-3">
                            <a href="{{ route('signin.index') }}">{{ __('Quay lại đăng nhập') }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br><br>
    <br><br>
@endsection
