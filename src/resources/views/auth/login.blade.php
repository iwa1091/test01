@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/login.css') }}" />
@endsection

@section('content')
<div class="login-form__content">
    <div class="login-form__heading">
        <h2>Login</h2>
    </div>
    <form action="{{ route('admin.index') }}" method="get" class="form">
        @csrf

        <!-- メールアドレス入力 -->
        <div class="form__group">
            <div class="form__group-title">
                <label for="email" class="form__label--item">メールアドレス</label>
            </div>
            <div class="form__group-content">
                <div class="form__input--text">
                    <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus class="input-field @error('email') is-invalid @enderror" placeholder="例: test@example.com">
                    @error('email')
                        <span class="form__error">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </div>

        <!-- パスワード入力 -->
        <div class="form__group">
            <div class="form__group-title">
                <label for="password" class="form__label--item">パスワード</label>
            </div>
            <div class="form__group-content">
                <div class="form__input--text">
                    <input id="password" type="password" name="password" required autocomplete="current-password" class="input-field @error('password') is-invalid @enderror" placeholder="例: test@example.com">
                    @error('password')
                        <span class="form__error">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </div>

        <!-- ログインボタン -->
        <div class="form__group button--login">
            <button type="submit" class="button--login-text">ログイン</button>
        </div>
    </form>
</div>
@endsection
