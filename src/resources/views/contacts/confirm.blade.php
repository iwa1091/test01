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
                    <p>{{ $contacts['last_name'] }} {{ $contacts['first_name'] }}</p>
                </div>
            </div>
        </div>
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">性別</span>
            </div>
            <div class="form__group-content">
                <div class="form__input--text">
                    <p>{{ $contacts['gender'] }}</p>
                </div>
            </div>
        </div>
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">メールアドレス</span>
            </div>
            <div class="form__group-content">
                <div class="form__input--text">
                    <p>{{ $contacts['email'] }}</p>
                </div>
            </div>
        </div>
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">電話番号</span>
            </div>
            <div class="form__group-content">
                <div class="form__input--text">
                    <p>{{ $contacts['tel'] }}</p>
                </div>
            </div>
        </div>
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">住所</span>
            </div>
            <div class="form__group-content">
                <div class="form__input--text">
                    <p>{{ $contacts['address'] }}</p>
                </div>
            </div>
        </div>
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">建物名</span>
            </div>
            <div class="form__group-content">
                <div class="form__input--text">
                    <p>{{ $contacts['building'] }}</p>
                </div>
            </div>
        </div>
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">お問い合わせの種類</span>
            </div>
            <div class="form__group-content">
                <div class="form__input--text">
                    <p>{{ $category->content }}</p>
                </div>
            </div>
        </div>
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">お問い合わせ内容</span>
            </div>
            <div class="form__group-content">
                <div class="form__input--text">
                    <p>{{ $contacts['detail'] }}</p>
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
