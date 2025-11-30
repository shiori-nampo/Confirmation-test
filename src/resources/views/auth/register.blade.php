@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/register.css') }}">
@endsection


@section('header-right')
<div class="header__right">
    <a class="header__btn" href="/login">login</a>
</div>
@endsection


@section('content')
<div class="form__content">
    <div class="form__header">
        <h2>Register</h2>
    </div>
    <form class="form" action="/register" method="post">
        @csrf
    <div class="form__content--inner">
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label">お名前</span>
            </div>
            <div class="form__group-content">
                <div class="form__input">
                    <input class="form__input--item" type="text" name="name" placeholder="例:山田 太郎" value="{{ old('name') }}"/>
                </div>
                <div class="form__error">
                    @error('name')
                <p class="error-message">{{ $message }}</p>
                @enderror
                </div>
            </div>
        </div>
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label">メールアドレス</span>
            </div>
            <div class="form__group-content">
                <div class="form__input">
                    <input class="form__input--item" type="text" name="email" placeholder="例:test@example.com" value="{{ old('email') }}"/>
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
                <span class="form__label">パスワード</span>
            </div>
            <div class="form__group-content">
                <div class="form__input">
                    <input class="form__input--item" type="password" name="password" placeholder="例:coachtech1106"/>
                </div>
                <div class="form__error">
                @error('password')
                <p class="error-message">{{ $message }}</p>
                @enderror
                </div>
            </div>
        </div>
        <div class="form__button">
            <button class="form__button-submit" type="submit">登録</button>
        </div>
    </div>
    </form>
</div>

@endsection