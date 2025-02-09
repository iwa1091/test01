<div>
    @if($showModal)
    <div class="modal-wrapper">
        <div class="modal-window">
            <button wire:click="closeModal" type="button" class="modal-close">×</button>
            <table class="modal__content">
                <tr class="modal-inner">
                    <th class="modal-ttl">お名前</th>
                    <td class="modal-data">
                        {{ $contact['last_name'] }}
                        <span class="space"></span>
                        <span class="firstName">{{ $contact['first_name'] }}</span>
                    </td>
                </tr>
                <tr class="modal-inner">
                    <th class="modal-ttl">性別</th>
                    <td class="modal-data">
                        @if($contact['gender'] == '1')
                            男性
                        @elseif($contact['gender'] == '2')
                            女性
                        @else
                            その他
                        @endif
                    </td>
                </tr>
                <tr class="modal-inner">
                    <th class="modal-ttl">メールアドレス</th>
                    <td class="modal-data">{{ $contact['email'] }}</td>
                </tr>
                <tr class="modal-inner">
                    <th class="modal-ttl">電話番号</th>
                    <td class="modal-data">{{ $contact['tell'] }}</td>
                </tr>
                <tr class="modal-inner">
                    <th class="modal-ttl">住所</th>
                    <td class="modal-data">{{ $contact['address'] }}</td>
                </tr>
                <tr class="modal-inner">
                    <th class="modal-ttl">建物名</th>
                    <td class="modal-data">{{ $contact['building'] }}</td>
                </tr>
                <tr class="modal-inner">
                    <th class="modal-ttl">お問い合わせの種類</th>
                    <td class="modal-data">{{ $contact['category']['content'] }}</td>
                </tr>
                <tr class="modal-inner">
                    <th class="modal-ttl--last">お問い合わせ内容</th>
                    <td class="modal-data--last">
                        {{ $contact['detail']}}
                    </td>
                </tr>
            </table>
            <form class="delete-form" action="/delete" method="post">
                @method('delete')
                @csrf
                <input type="hidden" name="id" value="{{ $contact['id'] }}" />
                <button class="delete-btn">削除</button>
            </form>
        </div>
    </div>
    @endif
</div>
