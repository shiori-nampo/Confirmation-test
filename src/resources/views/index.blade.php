@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection


@section('content')
<div class="contact-form__content">
    <div class="contact-form__heading">
        <h2>Contact</h2>
    </div>
    <form class="form" action="/confirm" method="post">
        @csrf
        <div class="form__content--inner">
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">お名前</span>
                <span class="form__label--required">※</span>
            </div>
            <div class="form__group-content">
                <div class="form__input--text name-group">
                    <input class="form__input--item" type="text" name="last_name" placeholder="例:山田" value="{{ old('last_name') }}"/>
                    <input class="form__input--item" type="text" name="first_name" placeholder="例:太郎" value="{{ old('first_name') }}"/>
                </div>
                <div class="form__error">
                @error('last_name')
                    <p class="error-message">{{ $message }}</p>
                @enderror
                @error('first_name')
                    <p class="error-message">{{ $message }}</p>
                @enderror
                </div>
            </div>
        </div>
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">性別</span>
                <span class="form__label--required">※</span>
            </div>
        <div class="form__group-content">
            <div class="form__input--btn">
                <label>
                <input class="form__input--radio" type="radio" name="gender" value="1" {{ old('gender') == 1 ? 'checked' : '' }}/>男性
                </label>
                <label>
                    <input class="form__input--radio" type="radio" name="gender" value="2" {{ old('gender') == 2 ? 'checked' : '' }}/>女性
                </label>
                <label>
                    <input class="form__input--radio" type="radio" name="gender" value="3" {{ old('gender') == 3 ? 'checked' : '' }}/>その他
                </label>
            </div>
            <div class="form__error">
            @error('gender')
                <p class="error-message">{{ $message }}</p>
            @enderror
            </div>
        </div>
        </div>
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">メールアドレス</span>
                <span class="form__label--required">※</span>
            </div>
            <div class="form__group-content">
                <div class="form__input--text">
                    <input class="form__input--item" type="email" name="email" placeholder="test@example.com" value="{{ old('email') }}"/>
                </div>
                <div class="form__error">
                @error('email')
                <p class="error-message">{{ $message }}</p>
                @enderror
                </div>
            </div>
        </div>
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">電話番号</span>
                <span class="form__label--required">※</span>
            </div>
            <div class="form__group-content form__group-content--flex">
                <input class="form__input--item form__input--tel" type="text" name="tel1" placeholder="080" value="{{ old('tel1') }}"/>
                <span class="form__tel-sep">-</span>
                <input class="form__input--item form__input--tel" type="text" name="tel2" placeholder="1234" value="{{ old('tel2') }}"/>
                <span class="form__tel-sep">-</span>
                <input class="form__input--item form__input--tel" type="text" name="tel3" placeholder="5678" value="{{ old('tel3') }}"/>
            </div>
            </div>
            <div class="form__error">
                @error('tel')
                <p class="error-message error-message__tel">{{ $message }}</p>
                @enderror
            </div>

        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">住所</span>
                <span class="form__label--required">※</span>
            </div>
            <div class="form__group-content">
                <div class="form__input--text">
                    <input class="form__input--item" type="text" name="address" placeholder="例:東京都渋谷区千駄ヶ谷1-2-3" value="{{ old('address') }}" />
                </div>
                <div class="form__error">
                @error('address')
                <p class="error-message">{{ $message }}</p>
                @enderror
                </div>
            </div>
        </div>
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">建物名</span>
            </div>
            <div class="form__group-content">
                <div class="form__input--text">
                    <input class="form__input--item" type="text" name="building" placeholder="例:千駄ヶ谷マンション101" value="{{ old ('building') }}"/>
                </div>
                <div class="form__error">
                @error('building')
                {{ $message }}
                @enderror
                </div>
            </div>
        </div>
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">お問い合わせの種類</span>
                <span class="form__label--required">※</span>
            </div>
            <div class="form__group-content">
                <select class="form__select" name="category_id">
                    <option value="">選択してください</option>
                    @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->content }}</option>
                    @endforeach
                </select>
                <div class="form__error">
                @error('content')
                <p class="error-message">{{ $message }}</p>
                @enderror
                </div>
            </div>
        </div>
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">お問い合わせ内容</span>
                <span class="form__label--required">※</span>
            </div>
            <div class="form__group-content">
                <div class="form__input--text">
                    <textarea class="form__input--item" name="detail" placeholder="お問い合わせの内容をご記載ください">{{ old('detail') }}
                    </textarea>
                </div>
                <div class="form__error">
                @error('detail')
                <p class="error-message">{{ $message }}</p>
                @enderror
                </div>
            </div>
        </div>
        <div class="form__button">
            <button class="form__button-submit" type="submit">確認画面</button>
        </div>
    </div>
    </form>
</div>

@endsection