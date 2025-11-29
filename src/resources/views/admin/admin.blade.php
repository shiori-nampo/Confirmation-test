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
    <form class="form" action="/search" method="get">
        <div class="form__item">
            <input class="form__item-input" type="text" name="keyword" placeholder="名前やメールアドレスを入力してください">
            <select class="form__item-select" name="gender">
                <option value="">性別</option>
                <option value="0" {{ request('gender') == '0' ? 'selected' : '' }}>全て</option>
                <option value="1" {{ request('gender') == '1' ? 'selected' : '' }}>男性</option>
                <option value="2" {{ request('gender') == '2' ? 'selected' : '' }}>女性</option>
                <option value="3" {{ request('gender') == '3' ? 'selected' : '' }}>その他</option>
            </select>
            <select class="form__item-content" name="category_id">
                <option value="">お問い合わせの種類</option>
                @foreach ($categories as $category)
                <option value="{{ $category->id }}" {{ request('category_id') == $category->id ? 'selected' : ' ' }}>{{ $category->content }}</option>
                @endforeach
            </select>
            <input class="form__item-date" type="date" name="date" placeholder="年/月/日" value="{{ request('date') }}"/>
            <button class="form__search-btn" type="submit">検索</button>
        <a class="reset__btn" href="{{ route('admin') }}">リセット</a>
    </form>
    </div>
    <div class="admin__content--item">
            <button class="content__btn-export" type="submit">エクスポート</button>
        <div class="admin__content-page">
            {{ $contacts->links() }}
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
                @foreach($contacts as $contact)
                <tr class="admin-table__row">
                    <td class="admin-table__item">
                        {{ $contact->last_name }} {{ $contact->first_name }}
                    </td>
                    <td class="admin-table__item">
                        {{ $contact->gender }}
                    </td>
                    <td class="admin-table__item">
                        {{ $contact->email }}
                    </td>
                    <td class="admin-table__item">
                        {{ $contact->category->content ?? '未選択' }}
                    </td>
                    <td class="admin-table__item">
                            <button class="detail__button-submit" type="submit">詳細
                            </button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection