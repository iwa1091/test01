@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/confirm.css') }}" />
@endsection

@section('content')
<div class="contact-form__content">
    <div class="contact-form__heading">
        <h2>Confirm</h2>
    </div>
    <form action="{{ route('contacts.store') }}" method="post" class="form">
        @csrf
        <!-- 確認のために入力データを表示 -->
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">お名前</span>
            </div>
            <div class="form__group-content">
                <div class="form__input--text">
                    <p>{{ $validated['last_name'] }} {{ $validated['first_name'] }}</p>
                </div>
            </div>
        </div>
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">性別</span>
            </div>
            <div class="form__group-content">
                <div class="form__input--text">
                    <p>{{ $validated['gender'] }}</p>
                </div>
            </div>
        </div>
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">メールアドレス</span>
            </div>
            <div class="form__group-content">
                <div class="form__input--text">
                    <p>{{ $validated['email'] }}</p>
                </div>
            </div>
        </div>
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">電話番号</span>
            </div>
            <div class="form__group-content">
                <div class="form__input--text">
                    <p>{{ $phone }}</p>
                </div>
            </div>
        </div>
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">住所</span>
            </div>
            <div class="form__group-content">
                <div class="form__input--text">
                    <p>{{ $validated['address'] }}</p>
                </div>
            </div>
        </div>
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">建物名</span>
            </div>
            <div class="form__group-content">
                <div class="form__input--text">
                    <p>{{ $validated['building'] }}</p>
                </div>
            </div>
        </div>
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">お問い合わせの種類</span>
            </div>
            <div class="form__group-content">
                <div class="form__input--text">
                    <p>{{ $validated['category'] }}</p>
                </div>
            </div>
        </div>
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">お問い合わせ内容</span>
            </div>
            <div class="form__group-content">
                <div class="form__input--text">
                    <p>{{ $validated['detail'] }}</p>
                </div>
            </div>
        </div>
        <div class="form__group">
            <button type="submit">送信</button>
        </div>
        <div class="form__group">
            <button type="button" onclick="history.back()">修正する</button>
        </div>
    </form>
</div>
@endsection
