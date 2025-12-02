@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/login.css') }}">
@endsection

@section('header-right')
<div class="header__right">
    <a class="header__btn" href="/register">register</a>
</div>
@endsection

@section('content')
<div class="login-form__content">
    <div class="login-form__header">
        <h2>Login</h2>
    </div>
    <form class="form" action="/login" method="post">
        @csrf
        <div class="form__content--inner">
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label">メールアドレス</span>
            </div>
            <div class="form__group-content">
                <div class="form__input">
                    <input class="form__input--item" type="email" name="email" placeholder="例:test@example.com" value="{{ old('email') }}">
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
                    <input class="form__input--item" type="password" name="password" placeholder="例:coachtech1106" >
                </div>
                <div class="form__error">
                    @error('password')
                <p class="error-message">{{ $message }}</p>
                @enderror
                </div>
            </div>
        </div>
        <div class="form__button">
            <button class="form__button-submit" type="submit">ログイン</button>
        </div>
        </div>
    </form>
</div>

@endsection