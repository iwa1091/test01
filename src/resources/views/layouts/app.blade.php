<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FashionablyLate</title>
    <link rel="stylesheet" href="{{ asset('css/common.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
    @yield('css')
</head>

<body>
    <header class="header">
        <div class="header__inner">
            <div class="header__logo">
            <!-- ロゴ -->
            <a href="{{ url('/') }}">FashionablyLate</a>
            </div>
            <div class="header__menu">
            <!-- ログインリンク -->
            @if (Request::is('register'))
                <a href="{{ route('login') }}" class="header-link">
                    login
                </a>
            @endif
            <!-- 新規登録リンク -->
            @if (Request::is('login'))
            <a href="{{ route('register') }}" class="header-link">
                register
            </a>
            @endif
        </div>
    </header>

    <main>
        @yield('content')
    </main>
</body>
</html>
