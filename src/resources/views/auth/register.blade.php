@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/register.css') }}" />
@endsection

@section('content')
<div class="register-form__content">
    <div class="register-form__heading">
        <h2>新規登録</h2>
    </div>
    <form action="{{ route('register') }}" method="post" class="form">
        @csrf

        <!-- 名前入力 -->
        <div class="form__group">
            <div class="form__group-title">
                <label for="name" class="form__label--item">名前</label>
            </div>
            <div class="form__group-content">
                <div class="form__input--text">
                    <input id="name" type="text" name="name" value="{{ old('name') }}" autofocus class="input-field @error('name') is-invalid @enderror">
                    @error('name')
                        <span class="form__error">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </div>

        <!-- メールアドレス入力 -->
        <div class="form__group">
            <div class="form__group-title">
                <label for="email" class="form__label--item">メールアドレス</label>
            </div>
            <div class="form__group-content">
                <div class="form__input--text">
                    <input id="email" type="email" name="email" value="{{ old('email') }}" autocomplete="email" class="input-field @error('email') is-invalid @enderror">
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
                    <input id="password" type="password" name="password" autocomplete="new-password" class="input-field @error('password') is-invalid @enderror">
                    @error('password')
                        <span class="form__error">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </div>

        <!-- 登録ボタン -->
        <div class="form__group button--register">
            <button type="submit" class="button--register-text">登録</button>
        </div>
    </form>
</div>
@endsection
