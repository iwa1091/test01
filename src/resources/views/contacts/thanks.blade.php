@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/thanks.css') }}" />
@endsection

@section('content')
<div class="thank-you-background">
    Thank you
</div>
<div class="thank-you-message">
    お問い合わせありがとうございました
</div>
<div class="home-button">
    <a href="{{ url('/') }}" class="home-button-text">HOME</a>
</div>
@endsection
