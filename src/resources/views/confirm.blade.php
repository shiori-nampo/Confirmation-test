@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/confirm.css') }}"/>
@endsection


@section('content')
<div class="confirm__content">
    <div class="confirm__heading">
        <h2>Confirm</h2>
    </div>
    <form class="form" action="/thanks" method="post">
        @csrf
        <div class="confirm-table">
            <table class="confirm-table__inner">
                <tr class="confirm-table__row">
                    <th class="confirm-table__header">お名前
                    </th>
                    <td class="confirm-table__text">
                        {{ $contact->last_name }} {{ $contact->first_name }}
                        <input class="confirm__input" type="hidden" name="name" value="{{ $contact->last_name }} {{ $contact->first_name }}" />
                    </td>
                </tr>
                <tr class="confirm-table__row">
                    <th class="confirm-table__header">性別</th>
                    <td class="confirm-table__text">
                        {{ $contact['gender'] }}
                        <input class="confirm__input" type="hidden" name="gender" value="{{ $contact['gender'] }}"/>
                    </td>
                </tr>
                <tr class="confirm-table__row">
                    <th class="confirm-table__header">メールアドレス</th>
                    <td class="confirm-table__text">
                        {{ $contact['email'] }}
                        <input class="confirm__input" type="hidden" name="email" value="{{ $contact['email'] }}"/>
                    </td>
                </tr>
                <tr class="confirm-table__row">
                    <th class="confirm-table__header">電話番号</th>
                    <td class="confirm-table__text">
                        {{ $contact['tel'] }}
                        <input class="confirm__input" type="hidden" name="tel" value="{{ $contact['tel'] }}"/>
                    </td>
                </tr>
                <tr class="confirm-table__row">
                    <th class="confirm-table__header">住所</th>
                    <td class="confirm-table__text">
                        {{ $contact['address'] }}
                        <input class="confirm__input" type="hidden" name="address" value="{{ $contact['address'] }}"/>
                    </td>
                </tr>
                <tr class="confirm-table__row">
                    <th class="confirm-table__header">建物名</th>
                    <td class="confirm-table__text">
                        {{ $contact['building'] }}
                        <input class="confirm__input" type="hidden" name="building" value="{{ $contact['building'] }}"/>
                    </td>
                </tr>
                <tr class="confirm-table__row">
                    <th class="confirm-table__header">お問い合わせの種類</th>
                    <td class="confirm-table__text">
                        {{ $contact['content'] }}
                        <input class="confirm__input" type="hidden" name="category_id" value="{{ $contact['category_id'] }}"/>
                    </td>
                </tr>
                <tr class="confirm-table__row">
                    <th class="confirm-table__header">お問い合わせ内容</th>
                    <td class="confirm-table__text">
                        {{ $contact['detail'] }}
                        <input class="confirm__input" type="hidden" name="detail" value="{{ $contact['detail'] }}"/>
                    </td>
                </tr>
            </table>
        </div>
        <div class="form__btn-send">
            <button class="form__submit-send" type="submit">送信</button>
        </div>
        <form class="correction-form__btn" action="/back" method="post">
            @csrf
            <button class="correction-form__link" href="/">修正</button>
        </form>
    </form>
</div>

@endsection('content')