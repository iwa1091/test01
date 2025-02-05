@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/modal.css') }}" />
@endsection

@section('content')
<!-- 詳細ボタン -->
<button id="detailButton" onclick="openModal()">詳細表示</button>

<!-- モーダルウィンドウ -->
<div id="myModal" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeModal()">&times;</span>
        <div class="modal-body">
            <p><strong>お名前:</strong> 山田 太郎</p>
            <p><strong>性別:</strong> 男性</p>
            <p><strong>メールアドレス:</strong> test@example.com</p>
            <p><strong>電話番号:</strong> 08012345678</p>
            <p><strong>住所:</strong> 東京都渋谷区千駄ヶ谷1-2-3</p>
            <p><strong>建物名:</strong> 千駄ヶ谷マンション101</p>
            <p><strong>お問い合わせの種類:</strong> 商品の交換について</p>
            <p><strong>お問い合わせ内容:</strong> 届いた商品が注文した商品ではありませんでした。商品の交換をお願いします。</p>
        </div>
        <button id="deleteButton" onclick="deleteData()">削除</button>
    </div>
</div>
@endsection

@section('scripts')
<script src="{{ asset('js/modal.js') }}"></script>
@endsection
