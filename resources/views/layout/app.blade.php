<!doctype html>
<html lang="{{ App::getLocale() }}">
<head>
    <meta charset="utf-8">

    <title>{{ (!empty($title) ? $title.' - ' : '').config('app.name') }}</title>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Style -->
    <link href="https://fonts.googleapis.com/css2?family=Noto+Serif+JP:wght@400;700&family=Noto+Serif:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@400;700&family=Noto+Sans:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('/css/style.css') }}">

    <!-- JS -->
    <script defer src="{{ asset('js/starrysky.js') }}"></script>
    <script defer src="https://cdnjs.cloudflare.com/ajax/libs/dialog-polyfill/0.5.1/dialog-polyfill.min.js" integrity="sha512-j25ufuqB/lU5pbteerL2q48bp4jtD27Oh/yeuf4HrOmqH9zAMCehjUQvvFFOHlMF7igFtAWhgd7zYxjOw2fToQ==" crossorigin="anonymous"></script>
    <script>
        document.addEventListener('DOMContentLoaded',()=>{
            const dialog = document.getElementById('dialog');
            dialogPolyfill.registerDialog(dialog);
            const link_dialog = document.getElementById('link-dialog');
            dialogPolyfill.registerDialog(link_dialog);
        });
    </script>

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-179033584-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', {{ config('starrysky.googleAnalytics') }});
    </script>

    <!-- Include -->
    @yield('head')

</head>
<body>

<header>
    <h1><a href="{{ url('/') }}">{{ config('app.name') }}</a></h1>
    <nav>
        <a href="{{ url('/star') }}">舞台少女</a>
        <a href="{{ url('/school') }}">学校</a>
        <a href="{{ url('/page') }}">書庫</a>
    </nav>
    <?php $user = Admin::user(); ?>
    <div class="AppStatus"
         title="{{ !empty($user['name']) ? '利用者 : '.$user['name'] : '館外から利用中です' }}">
        {{ $user ? '本館資料室' : '館外利用' }}</div>
</header>

{!! !empty($fullwidth) && $fullwidth ? '<div data-pagetype="fullwidth">' : '<main>' !!}
@yield('content')
{!! !empty($fullwidth) && $fullwidth ? '</div>' : '</main>' !!}

<footer>
    <div id="footer-data">
        <div>
            <span style="font-size: 20px;margin-right: 4px">{{ config('app.name') }}</span>
            <span>Ver{{ config('starrysky.version') }}</span>
            <address>{{ $_SERVER['HTTP_HOST'] }}</address>
        </div>
        <div id="footer-links">
            <a href="{{ url('/about') }}">About</a>
            <a href="{{ config('starrysky.repositoryUrl') }}" target="_blank" rel="noopener">GitHub</a>
            <a href="{{ config('starrysky.mastodonAccount') }}" target="_blank" rel="noopener">Mastodon @StarrySky</a>
            <a href="https://miyacorata.net" target="_blank" rel="noopener">miyacorata.net</a>
        </div>
    </div>
    <blockquote>
        And it shall be bestowed upon you, the Star which you have longed for─
    </blockquote>
</footer>

<dialog id="dialog">
    <div class="msgbox">
        <div class="msgbox-top" id="msgbox-title"></div>
        <div class="msgbox-body" id="msgbox-body">
            <p id="msgbox-text"></p>
        </div>
        <div class="msgbox-foot" id="msgbox-foot">
            <a href="javascript:dialog.close()" class="button">OK</a>
        </div>
    </div>
</dialog>

<dialog id="link-dialog">
    <div class="msgbox">
        <div class="msgbox-top">確認</div>
        <div class="msgbox-body">
            <p>以下のサイトを新しいウィンドウで開きます。<br>よろしいですか？</p>
            <p id="link-dialog-link"></p>
        </div>
        <div class="msgbox-foot" id="msgbox-foot">
            <a href="javascript:void(0)" id="link-dialog-close" class="button">キャンセル</a>
            <a href="#" target="_blank" rel="noopener" class="button" id="link-dialog-submit">OK</a>
        </div>
    </div>
</dialog>

</body>
</html>
