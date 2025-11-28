@extends('layouts.app')


@section('css')
<link rel="stylesheet" href="{{ asset('css/admin.css') }}"/>
@endsection


@section('content')
<div class="admin__content">
    <div class="content__title">
        <h2>Admin</h2>
    </div>
    <div class="form__group">
    <form class="form">
        <div class="form__item">
            <input class="form__item-input" type="text" placeholder="名前やメールアドレスを入力してください">
        </div>
        <div class="form__item">
            <select class="form__item-select" name="gender">
                <option value="">性別</option>
            </select>
        </div>
        <div class="form__item">
            <select class="form__item-kinds" name="kinds">
                <option value="">お問い合わせの種類</option>
            </select>
        </div>
        <div class="form__item">
            <input class="form__item-date" type="date" name="date" />
        </div>
            <button class="form__search-btn" type="submit">検索</button>
        <button class="reset__btn" type="reset">リセット</button>
    </form>
    </div>
    <div class="admin__content--item">
            <button class="content__btn-export" type="submit">エクスポート</button>
        <div class="admin__content-page">
            <!--ページネーション-->
        </div>
    </div>
    <div class="admin-table">
        <table class="admin-table__inner">
            <thead class="admin-table__thead">
            <tr class="admin-table__row">
                <th class="admin-table__header">
                    お名前
                </th>
                <th class="admin-table__header">
                    性別
                </th>
                <th class="admin-table__header">
                    メールアドレス
                </th>
                <th class="admin-table__header">
                    お問い合わせの種類
                </th>
            </tr>
            </thead>
            <tbody>
                <tr class="admin-table__row">
                    <td class="admin-table__item">
                       {{-- {{ $contact->name }}--}}
                    </td>
                    <td class="admin-table__item">
                       {{-- {{ $contact->gender }}--}}
                    </td>
                    <td class="admin-table__item">
                       {{-- {{ $contact->email }}--}}
                    </td>
                    <td class="admin-table__item">
                       {{-- {{ $contact->category }} --}}
                    </td>
                    <td class="admin-table__item">
                        <div class="detail__button">
                            <button class="detail__button-submit" type="submit">詳細
                            </button>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

@endsection