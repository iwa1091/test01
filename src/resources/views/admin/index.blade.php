@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/admin.css') }}" />
@endsection

@section('content')
<div class="admin-dashboard">
    <h1>Admin</h1>

    <!-- 検索バー -->
    <div class="search-bar">
        <form action="{{ route('search') }}" method="GET" class="search-form">
            <!-- 名前とメールアドレスの統合検索 -->
            <div class="form__group">
                <input type="text" name="query" placeholder="名前またはメールアドレスで検索" class="input-field" value="{{ old('query') }}">
            </div>

            <!-- 性別検索 -->
            <div class="form__group">
                <select name="gender" class="input-field">
                    <option value="">性別</option>
                    <option value="all">全て</option>
                    <option value="male">男性</option>
                    <option value="female">女性</option>
                    <option value="other">その他</option>
                </select>
            </div>
            
            <!-- お問い合わせ種類検索 -->
            <div class="form__group">
                <input type="text" name="category" placeholder="お問い合わせ種類で検索" class="input-field" value="{{ old('category') }}">
            </div>
            
            <!-- 日付検索 -->
            <div class="form__group">
                <input type="date" name="date" class="input-field" value="{{ old('date') }}">
            </div>
            
            <!-- 検索・リセットボタン -->
            <div class="form__group button-group">
                <button type="submit" class="btn search-btn">検索</button>
                <button type="reset" class="btn reset-btn">リセット</button>
            </div>
        </form>
    </div>

    <!-- ページネーションリンク -->
    <div class="pagination-links">
        {{ $contacts->links() }}
    </div>

    <!-- テーブル表示 -->
    <div class="contact-table">
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
                @foreach($contacts as $contact)
                <tr>
                    <td>{{ $contact->last_name }} {{ $contact->first_name }}</td>
                    <td>{{ $contact->gender }}</td>
                    <td>{{ $contact->email }}</td>
                    <td>{{ $contact->category->name }}</td>
                    <td><button class="btn detail-btn" onclick="openModal({{ $contact->id }})">詳細</button></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- エクスポートボタン -->
    <div class="export-btn">
        <button class="btn">エクスポート</button>
    </div>
</div>

<div class="pagination">
    <!-- ページネーションのリンク -->
</div>

<!-- ログアウトボタン -->
<div class="logout">
    <button class="btn logout-btn">ログアウト</button>
</div>

<!-- モーダルウィンドウ -->
<div id="myModal" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeModal()">&times;</span>
        <div id="modalBody">
            <!-- 詳細情報がここに表示されます -->
        </div>
        <button id="deleteButton" onclick="deleteData()">削除</button>
    </div>
</div>
@endsection

@section('scripts')
<!-- jQueryの読み込み -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    // jQueryが読み込まれた後に関数を定義
    $(document).ready(function() {
        // モーダルウィンドウを開く関数
        window.openModal = function(contactId) {
            // Ajaxリクエストを送信して詳細情報を取得
            $.ajax({
                url: '/contacts/' + contactId,
                type: 'GET',
                success: function(data) {
                    // 詳細情報をモーダル内に表示
                    $('#modalBody').html(`
                        <p><strong>お名前:</strong> ${data.last_name} ${data.first_name}</p>
                        <p><strong>性別:</strong> ${data.gender}</p>
                        <p><strong>メールアドレス:</strong> ${data.email}</p>
                        <p><strong>電話番号:</strong> ${data.phone}</p>
                        <p><strong>住所:</strong> ${data.address}</p>
                        <p><strong>建物名:</strong> ${data.building}</p>
                        <p><strong>お問い合わせの種類:</strong> ${data.category_name}</p>
                        <p><strong>お問い合わせ内容:</strong> ${data.detail}</p>
                    `);
                    // モーダルウィンドウを表示
                    document.getElementById("myModal").style.display = "block";
                },
                error: function(err) {
                    alert("詳細の取得に失敗しました。");
                }
            });
        };

        // モーダルウィンドウを閉じる関数
        window.closeModal = function() {
            document.getElementById("myModal").style.display = "none";
        };

        // データを削除する関数
        window.deleteData = function() {
            if (confirm("本当に削除しますか？")) {
                // Ajaxリクエストを送信してデータを削除
                $.ajax({
                    url: '/contacts/delete',
                    type: 'DELETE',
                    success: function(result) {
                        alert("データが削除されました。");
                        closeModal();
                        location.reload(); // ページを再読み込みして変更を反映
                    },
                    error: function(err) {
                        alert("削除に失敗しました。");
                    }
                });
            }
        };
    });
</script>
@endsection
