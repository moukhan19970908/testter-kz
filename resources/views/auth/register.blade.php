@extends('layouts.app')

@section('content')
<style>
    body { background: #f7fafd !important; }
    .register-container {
        min-height: 80vh;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .register-card {
        background: #f4f7fa;
        border: none;
        border-radius: 1.2rem;
        box-shadow: 0 2px 16px #0001;
        padding: 2.5rem 2rem 2rem 2rem;
        max-width: 480px;
        width: 100%;
        margin: 0 auto;
    }
    .register-title {
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
    .login-link {
        text-align: center;
        margin-top: 1.5rem;
        color: #6c757d;
        font-size: 1rem;
    }
    .login-link a { color: #1877f2; text-decoration: underline; }
</style>
<div class="register-container">
    <div class="register-card">
        <div class="register-title">Создать учетную запись</div>
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Полное имя</label>
                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autofocus>
                @error('name')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Адрес электронной почты</label>
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required>
                @error('email')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Пароль</label>
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required>
                @error('password')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="password-confirm" class="form-label">Подтвердите пароль</label>
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
            </div>
            <button type="submit" class="btn btn-main">Зарегистрироваться</button>
        </form>
        <div class="login-link">
            Уже есть учетная запись? <a href="{{ route('login') }}">Войти</a>
        </div>
    </div>
</div>
@endsection
