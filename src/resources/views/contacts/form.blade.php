@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/form.css') }}" />
@endsection

@section('content')

<div class="contact-form__content">
    <div class="header-title">Contact</div>
    <form action="{{ route('contacts.confirm')}}" method="post" class="form">
        @csrf
        <div class="group--main">
            <!-- お名前 -->
            <div class="form__group">
                <div class="form__group-title-content">
                    <span class="name-label">お名前 ※</span>
                    <div class="form__group-content">
                        <div class="form__input--text">
                            <input type="text" name="last_name" placeholder="例:山田" value="{{ old('last_name') }}" class="input-field name-input-1" />
                            <input type="text" name="first_name" placeholder="例:太郎" value="{{ old('first_name') }}" class="input-field name-input-2" />
                        </div>
                    </div>
                </div>
                <div class="form__error">
                    @error('last_name')
                        {{ $message }}
                    @enderror
                    @error('first_name')
                        {{ $message }}
                    @enderror
                </div>
            </div>

             <!-- 性別 -->
            <div class="form__group">
                <div class="form__group-title-content">
                    <span class="gender-label">性別 ※</span>
                    <div class="form__group-content form__input--checkbox">
                        <label><input type="radio" name="gender" value="male" {{ old('gender', 'male') == 'male' ? 'checked' : '' }}  required>男性</input></label>
                        <label><input type="radio" name="gender" value="female" {{ old('gender') == 'female' ? 'checked' : '' }}  required>女性</input></label>
                        <label><input type="radio" name="gender" value="other" {{ old('gender') == 'other' ? 'checked' : '' }} required>その他</input></label>
                    </div>
                </div>
                <div class="form__error">
                    @error('gender')
                        {{ $message }}
                    @enderror
                </div>
            </div>

            <!-- メールアドレス -->
            <div class="form__group">
                <div class="form__group-title-content">
                    <span class="email-label">メールアドレス ※</span>
                    <div class="form__group-content">
                        <div class="form__input--text">
                            <input type="email" name="email" placeholder="例: test@example.com" value="{{ old('email') }}" required class="input-field email-input" />
                        </div>
                    </div>
                </div>
                <div class="form__error">
                    @error('email')
                        {{ $message }}
                    @enderror
                </div>
            </div>

            <!-- 電話番号 -->
            <div class="form__group">
                <div class="form__group-title-content">
                    <span class="phone-label">電話番号 ※</span>
                    <div class="form__group-content">
                        <div class="form__input--text">
                            <input type="tel" name="phone_1" placeholder="例: 080" value="{{ old('phone_1') }}" required class="input-field phone-input phone-input-1" />
                            <input type="tel" name="phone_2" placeholder="例: 1234" value="{{ old('phone_2') }}" required class="input-field phone-input phone-input-2" />
                            <input type="tel" name="phone_3" placeholder="例: 5678" value="{{ old('phone_3') }}" required class="input-field phone-input phone-input-3" />
                        </div>
                    </div>
                </div>
                <div class="form__error">
                    @error('phone_1')
                        {{ $message }}
                    @enderror
                    @error('phone_2')
                        {{ $message }}
                    @enderror
                    @error('phone_3')
                        {{ $message }}
                    @enderror
                </div>
            </div>

            <!-- 住所 -->
            <div class="form__group">
                <div class="form__group-title-content">
                    <span class="address-label">住所 ※</span>
                    <div class="form__group-content">
                        <div class="form__input--text">
                            <input type="text" name="address" placeholder="例: 東京都渋谷区千駄ヶ谷1-2-3" value="{{ old('address') }}" required class="input-field address-input" />
                        </div>
                    </div>
                </div>
                <div class="form__error">
                    @error('address')
                        {{ $message }}
                    @enderror
                </div>
            </div>

            <!-- 建物名 -->
            <div class="form__group">
                <div class="form__group-title-content">
                    <span class="building-label">建物名</span>
                    <div class="form__group-content">
                        <div class="form__input--text">
                            <input type="text" name="building" placeholder="例: 千駄ヶ谷マンション101" value="{{ old('building') }}" class="input-field building-input" />
                        </div>
                    </div>
                </div>
            </div>

            <!-- お問い合わせの種類 -->
            <div class="form__group">
                <div class="form__group-title-content">
                    <span class="dropdown-label">お問い合わせの種類 ※</span>
                    <div class="form__group-content form__input--select">
                        <select name="category" required class="input-field dropdown-input">
                            <option value="" disabled selected>選択してください</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form__error">
                    @error('category')
                        {{ $message }}
                    @enderror
                </div>
            </div>

            <!-- お問い合わせ内容 -->
            <div class="form__group">
                <div class="form__group-title-content">
                    <span class="detail-label">お問い合わせ内容 ※</span>
                    <div class="form__group-content">
                        <div class="form__input--textarea">
                            <textarea name="detail" rows="5" placeholder="お問い合わせ内容をご記載ください" required class="textarea-field detail-input"></textarea>
                        </div>
                    </div>
                </div>
                <div class="form__error">
                    @error('detail')
                        {{ $message }}
                    @enderror
                </div>
            </div>

            <!-- 確認画面ボタン -->
            <div class="form__group button--confirm">
                <button type="submit" class="button--confirm-text">確認画面</button>
            </div>
        </div>
    </form>
</div>

@endsection
