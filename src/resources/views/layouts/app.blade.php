<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FashionablyLate</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/common.css') }}">
    @yield('css')
</head>
<body>
    <header class="header">
        <div class="header__inner">
            <a class="header__logo" href="/">
                FashionablyLate
            </a>
            @yield('header-right')
            @if(Auth::check())
            <form class="logout-form" action="/logout" method="post">
            @csrf
            <button class="logout__btn" href="/login">logout</button>
            </form>
            @endif
        </div>
    </header>
    <main>
    @yield('content')
</main>
</body>
</html>