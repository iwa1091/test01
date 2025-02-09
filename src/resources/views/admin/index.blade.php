@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/admin.css') }}" />
<link rel="stylesheet" href="{{ asset('css/form.css') }}" />
@endsection

@section('content')
<div class="admin-dashboard">
    <h1>Admin</h1>

    <!-- 検索バー -->
    <div class="search-bar">
        <form action="{{ route('search') }}" method="GET" class="search-form">
            <!-- 名前またはメールアドレスで検索 -->
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

    <!-- ページネーションリンクとエクスポートボタンを同じ行に配置 -->
    <div class="pagination-export-container">
        <!-- エクスポートボタン -->
        <div class="export-btn">
            <button class="btn" id="export-btn">エクスポート</button>
        </div>
        <!-- ページネーションリンク -->
        <div class="pagination-links">
            {{ $contacts->links() }}
        </div>
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
                    <td>
                        @if ($contact->gender == '1')
                            男性
                        @elseif ($contact->gender == '2')
                            女性
                        @else
                            その他
                        @endif
                    </td>
                    <td>{{ $contact->email }}</td>
                    <td>{{ $contact->category->name }}</td>
                    <td>
                        <button wire:click="$emit('openModal', {{ $contact }})" type="button" class="btn detail-btn">詳細</button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<livewire:contact-modal />
@endsection
