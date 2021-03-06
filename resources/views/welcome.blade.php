<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=1300">

        <title>{{ config('app.name') }}</title>

        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-179033584-1"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());

            gtag('config', '{{ config('starrysky.googleAnalytics') }}');
        </script>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Noto+Serif+JP:wght@400;700&family=Noto+Serif:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <style>
            html {
                background: linear-gradient(-160deg, #031955, #135482 40%, #98eeda);
            }
            body {
                /*background-color: #151515;*/
                color: #fffaf0;
                font-family: 'Noto Serif', 'Noto Serif JP', sans-serif;
                min-height: 100vh;
                margin: 0;
                align-items: center;
                display: flex;
                justify-content: center;
            }

            main {
                text-align: center;
                cursor: default;
            }

            #title {
                margin: 0 0 25px;
            }
            #title > #stars {
                font-size: 25px;
            }
            #title > h1 {
                font-size: 84px;
                font-weight: normal;
                margin: 0;
            }

            .links > a {
                color: #f0f8ff;
                margin: 0 25px;
                font-size: 17px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                transition: all .5s;
            }
            .links.subline > a {
                font-weight: normal;
                font-size: 15px;
                margin: 0 15px;
                letter-spacing: normal;
            }

            footer {
                margin-top: 60px;
                font-size: 14px;
            }
            footer > #phrase {
                color: rgba(255,250,240,0.5);
                font-style: italic;
            }
        </style>
    </head>
    <body>
        <main>
            <div id="title">
                <div id="stars">
                    <span style="color: #cbc6cc;">&#x2726</span>
                    <span style="color: #fe9952;">&#x2726</span>
                    <span style="color: #61bf99;">&#x2726</span>
                    <span style="color: #6292e9;">&#x2726</span>
                    <span style="color: #fb5458;">&#x2726</span>
                    <span style="color: #95caee;">&#x2726</span>
                    <span style="color: #fdd162;">&#x2726</span>
                    <span style="color: #8c67aa;">&#x2726</span>
                    <span style="color: #e08696;">&#x2726</span>
                </div>
                <h1>{{ config('app.name') }}</h1>
            </div>

            <div class="links" style="margin-bottom: 20px">
                <a href="{{ url('/star') }}">舞台少女</a>
                <a href="{{ url('/school') }}">学校</a>
                <a href="{{ url('/page') }}">書庫</a>

            </div>
            <div class="links subline">
                <a href="{{ url('/about') }}">About</a>
                <a href="{{ config('starrysky.repositoryUrl') }}" target="_blank" rel="noopener">GitHub</a>
                <a href="{{ url('/admin') }}">Admin</a>
            </div>

            <footer>
                {{ config('app.name').' Ver'.config('starrysky.version') }}
                <p id="phrase">And it shall be bestowed upon you, the Star which you have longed for─</p>
            </footer>
        </main>
    </body>
</html>
