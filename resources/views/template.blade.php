<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Mail Template</title>
        <link rel="stylesheet" href="template.css">
    </head>
    <body>
        <header>
            <div class="header-left">
                <h1>Mail Template</h1>
            </div>
            <div class="header-right">
                <a href="/profiel">アイコン</a>
            </div>
            <div class="clear"></div>
        </header>
        <div class="menu">
            <ul>
                <li><a href="/everybody">みんなの投稿</a></li>
                <li><a href="/genre">ジャンルから探す</a></li>
                <li><a href="/history">使用履歴</a></li>
                <li><a href="/favorite">お気に入り</a></li>
                <li><a href="/saved">保存した文章</a></li>
                <li><a href="/posted">投稿した文章</a></li>
                <li><a href="/">ログアウト</a></li>
            </ul>
        </div>
        <div class="var">
            <h2>@yield('var')</h2>
        </div>
        <div class="contents">
            @yield('contents')
        </div>
    </body>
</html>