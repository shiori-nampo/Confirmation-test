@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/confirm.css') }}"/>
@endsection


@section('content')
<div class="confirm__content">
    <div class="confirm__heading">
        <h2>Confirm</h2>
    </div>
    <form class="form">
        <div class="confirm-table">
            <table class="confirm-table__inner">
                <tr class="confirm-table__row">
                    <th class="confirm-table__header">お名前
                    </th>
                    <td class="confirm-table__text">
                        <input class="confirm__input" type="text" name="name" value="サンプルテキスト" />
                    </td>
                </tr>
                <tr class="confirm-table__row">
                    <th class="confirm-table__header">性別</th>
                    <td class="confirm-table__text">
                        <input class="confirm__input" type="text" name="gender" value="サンプルテキスト"/>
                    </td>
                </tr>
                <tr class="confirm-table__row">
                    <th class="confirm-table__header">メールアドレス</th>
                    <td class="confirm-table__text">
                        <input class="confirm__input" type="email" name="email" value="サンプルテキスト"/>
                    </td>
                </tr>
                <tr class="confirm-table__row">
                    <th class="confirm-table__header">電話番号</th>
                    <td class="confirm-table__text">
                        <input class="confirm__input" type="tel" name="tel" value="サンプルテキスト"/>
                    </td>
                </tr>
                <tr class="confirm-table__row">
                    <th class="confirm-table__header">住所</th>
                    <td class="confirm-table__text">
                        <input class="confirm__input" type="text" name="address" value="サンプルテキスト"/>
                    </td>
                </tr>
                <tr class="confirm-table__row">
                    <th class="confirm-table__header">建物名</th>
                    <td class="confirm-table__text">
                        <input class="confirm__input" type="text" name="address_building" value="サンプルテキスト"/>
                    </td>
                </tr>
                <tr class="confirm-table__row">
                    <th class="confirm-table__header">お問い合わせの種類</th>
                    <td class="confirm-table__text">
                        <input class="confirm__input" type="text" name="category" value="サンプルテキスト"/>
                    </td>
                </tr>
                <tr class="confirm-table__row">
                    <th class="confirm-table__header">お問い合わせ内容</th>
                    <td class="confirm-table__text">
                        <input class="confirm__input" type="text" name="content" value="サンプルテキスト"/>
                    </td>
                </tr>
            </table>
        </div>
        <div class="form__btn-send">
            <button class="form__submit-send" type="submit">送信</button>
        </div>
        <div class="correction__btn">
            <a class="correction__link" href="/">修正</a>
        </div>
    </form>
</div>

@endsection('content')