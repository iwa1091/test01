@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/admin.css') }}" />
<link rel="stylesheet" href="{{ asset('css/form.css') }}" />
@endsection

@section('content')
<h2>検索結果</h2>
@if($contacts->isEmpty())
    <p>検索結果がありません。</p>
@else
    <table>
        <thead>
            <tr>
                <th>お名前</th>
                <th>性別</th>
                <th>メールアドレス</th>
                <th>お問い合わせの種類</th>
                <th>詳細</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($contacts as $contact)
            <tr>
                <td>{{ $contact->last_name }} {{ $contact->first_name }}</td>
                <td>{{ $contact->gender }}</td>
                <td>{{ $contact->email }}</td>
                <td>{{ $contact->category->name }}</td>
                <td>
                    <input type="checkbox" id="modal-toggle-{{ $contact->id }}" class="modal-toggle" />
                    <label for="modal-toggle-{{ $contact->id }}" class="btn detail-btn">詳細</label>
                    <!-- モーダルウィンドウ -->
                    <div class="modal">
                        <div class="modal-content">
                            <label for="modal-toggle-{{ $contact->id }}" class="close">&times;</label>
                            <p>ここに{{ $contact->last_name }} {{ $contact->first_name }}さんの詳細情報を表示します。</p>
                            <!-- 他の詳細情報も追加できます -->
                            <button id="deleteButton">削除</button>
                        </div>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endif
@endsection

@section('css')
<style>
/* モーダルウィンドウのトリガーを隠す */
.modal-toggle {
    display: none;
}

/* モーダルウィンドウのスタイル */
.modal {
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.5);
    justify-content: center;
    align-items: center;
}

.modal-content {
    background-color: white;
    padding: 20px;
    border-radius: 5px;
    position: relative;
}

/* モーダルウィンドウを表示 */
.modal-toggle:checked + .modal {
    display: flex;
}

/* モーダルウィンドウを閉じるボタンのスタイル */
.close {
    position: absolute;
    top: 10px;
    right: 10px;
    background-color: #ccc;
    border: none;
    border-radius: 50%;
    font-size: 20px;
    cursor: pointer;
    padding: 5px 10px;
}

/* 詳細ボタンのスタイル */
.btn.detail-btn {
    display: inline-block;
    padding: 10px 20px;
    background-color: #8B7969;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    text-align: center;
}
</style>
@endsection
