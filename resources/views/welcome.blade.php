<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name') }}</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Noto+Serif+JP:wght@400;700&family=Noto+Serif:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #151515;
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
                color: aliceblue;
                margin: 0 25px;
                font-size: 17px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                transition: all .5s;
            }

            footer {
                margin-top: 60px;
                font-size: 14px;
            }
            footer > #phrase {
                color: #636b6f;
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

            <div class="links">
                <a href="{{ url('/') }}">舞台少女一覧</a>
                <a href="{{ url('/') }}">学校一覧</a>
                <a href="{{ url('/') }}">統合検索</a>
                <a href="{{ url('/') }}">GitHub</a>
            </div>

            <footer>
                {{ $_SERVER['HTTP_HOST'] }}
                <span id="phrase"></span>
            </footer>
        </main>
    </body>
</html>
