@extends('layouts.app')

@section('content')
<style>
    body { background: #f7fafd !important; }
    .login-container {
        min-height: 80vh;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .login-card {
        background: #f4f7fa;
        border: none;
        border-radius: 1.2rem;
        box-shadow: 0 2px 16px #0001;
        padding: 2.5rem 2rem 2rem 2rem;
        max-width: 480px;
        width: 100%;
        margin: 0 auto;
    }
    .login-title {
        font-size: 2rem;
        font-weight: 700;
        text-align: center;
        margin-bottom: 2rem;
    }
    .form-label { font-weight: 500; }
    .btn-main {
        background: #1877f2;
        color: #fff;
        border-radius: .7rem;
        font-weight: 500;
        width: 100%;
        padding: .7rem;
        font-size: 1.1rem;
    }
    .forgot-link {
        text-align: right;
        margin-bottom: 1.2rem;
        color: #6c757d;
        font-size: 1rem;
    }
    .forgot-link a { color: #1877f2; text-decoration: underline; }
</style>
<div class="login-container">
    <div class="login-card">
        <div class="login-title">Вход</div>
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="mb-3">
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autofocus placeholder="Email">
                @error('email')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                @enderror
            </div>
            <div class="mb-3">
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required placeholder="Пароль">
                @error('password')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                @enderror
            </div>
            <div class="forgot-link">
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}">Забыли пароль?</a>
                @endif
            </div>
            <button type="submit" class="btn btn-main">Войти</button>
        </form>
    </div>
</div>
@endsection
