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

    <!-- Include -->
    @yield('head')

</head>
<body>

<header>
    <h1><a href="{{ url('/') }}">{{ config('app.name') }}</a></h1>
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
            <a href="{{ config('starrysky.repositoryUrl') }}" target="_blank" rel="noopener">GitHub</a>
            <a href="{{ config('starrysky.mastodonAccount') }}" target="_blank" rel="noopener">Mastodon @StarrySky</a>
            <a href="https://miyacorata.net" target="_blank" rel="noopener">miyacorata.net</a>
        </div>
    </div>
    <blockquote>
        And it shall be bestowed upon you, the Star which you have longed for─
    </blockquote>
</footer>
</body>
</html>
