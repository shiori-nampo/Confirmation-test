@extends('layouts.app')
<style>
    svg.w-5.h-5 {
    /*paginateメソッドの矢印の大きさ調整のために追加*/
    width: 30px;
    height: 30px;

}
</style>

@section('css')
<link rel="stylesheet" href="{{ asset('css/admin.css') }}"/>
@endsection

@section('header-right')
    @if(Auth::check())
        <form class="logout-form" action="/logout" method="post">
            @csrf
            <button class="logout__btn" href="/logout">logout</button>
            </form>
    @endif
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
        </div>
        <div class="form__item">
            <select class="form__item-select" name="gender">
                <option value="">性別</option>
                <option value="0" {{ request('gender') == '0' ? 'selected' : '' }}>全て</option>
                <option value="1" {{ request('gender') == '1' ? 'selected' : '' }}>男性</option>
                <option value="2" {{ request('gender') == '2' ? 'selected' : '' }}>女性</option>
                <option value="3" {{ request('gender') == '3' ? 'selected' : '' }}>その他</option>
            </select>
        </div>
        <div class="form__item">
            <select class="form__item-content" name="category_id">
                <option value="">お問い合わせの種類</option>
                @foreach ($categories as $category)
                <option value="{{ $category->id }}" {{ request('category_id') == $category->id ? 'selected' : ' ' }}>{{ $category->content }}</option>
                @endforeach
            </select>
        </div>
        <div class="form__item">
            <input class="form__item-date" type="date" name="date" placeholder="年/月/日" value="{{ request('date') }}"/>
        </div>
            <button class="form__search-btn" type="submit">検索</button>
        <button class="reset__btn" href="{{ route('admin') }}">リセット</button>
        </div>
    </form>
    </div>
    <div class="admin__content--item">
            <button class="content__btn-export" type="submit">エクスポート</button>
        <div class="admin__content-paginate">
            {{ $contacts->appends(request()->query())->links() }}
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
                        <div class="detail__button">
                            <button class="detail__button-submit" popovertarget="detail-popover-{{ $contact->id }}" popovertargetaction="show">詳細
                            </button>
                            <div id="detail-popover-{{ $contact->id }}" popover>
                                <table class="detail-table">
                                        <tr class="detail-table__row">
                                            <th class="detail-table__header">お名前
                                            </th>
                                            <td class="detail-table__item">{{ $contact->last_name }} {{ $contact->first_name }}</td>
                                        </tr>
                                        <tr class="detail-table__row">
                                            <th class="detail-table__header">性別</th>
                                            <td class="detail-table__item">{{ $contact->gender == 1 ? '男性' : '女性' }}</td>
                                        </tr>
                                        <tr class="detail-table__row">
                                            <th class="detail-table__header">
                                                メールアドレス</th>
                                                <td class="detail-table__item">{{ $contact->email }}</td>
                                        </tr>
                                        <tr class="detail-table__row">
                                            <th class="detail-table__header">
                                                電話番号</th>
                                                <td class="detail-table__item">{{ $contact->tel }}</td>
                                        </tr>
                                        <tr class="detail-table__row">
                                            <th class="detail-table__header">
                                                住所</th>
                                                <td class="detail-table__item">{{ $contact->address }}</td>
                                        </tr>
                                        <tr class="detail-table__row">
                                            <th class="detail-table__header">
                                                建物名</th>
                                                <td class="detail-table__item">{{ $contact->building }}</td>
                                        </tr>
                                        <tr class="detail-table__row">
                                            <th class="detail-table__header">
                                                お問い合わせの種類</th>
                                                <td class="detail-table__item">{{ $contact->category->content ?? '未選択' }}</td>
                                        </tr>
                                        <tr class="detail-table__row">
                                            <th class="detail-table__header">
                                                お問い合わせ内容</th>
                                                <td class="detail-table__item">{{ $contact->detail }}</td>
                                        </tr>
                                    </table>
                                <button popovertarget="detail-popover-{{ $contact->id }}" popovertargetaction="hide" class="close-button">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                    <path d="M0 0h24v24H0z" fill="none" />
                                    <path d="M18.3 5.71a.996.996 0 0 0-1.41 0L12 10.59 7.11 5.7A.996.996 0 1 0 5.7 7.11L10.59 12 5.7 16.89a.996.996 0 1 0 1.41 1.41L12 13.41l4.89 4.89a.996.996 0 1 0 1.41-1.41L13.41 12l4.89-4.89c.38-.38.38-1.02 0-1.4z" />
                                    </svg>
                                </button>
                            <form class="delete-form" action="{{ route('admin.destroy',$contact->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <input type="hidden" name="category_id" value="{{ $contact['category_id'] }}">
                                <button class="delete-button" type="submit">削除</button>
                            </form>
                            </div>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection