@extends('layouts.app')

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
                <td><button class="btn detail-btn" onclick="openModal({{ $contact->id }})">詳細</button></td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endif
@endsection

@section('scripts')
<script src="{{ asset('js/modal.js') }}"></script>
@endsection
