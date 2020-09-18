@extends('layout.app',['title' => 'ログイン'])

@section('head')
    <style>
        #login{
            height: calc(100vh - 200px);
            box-sizing: border-box;
            margin: 0 auto;
            text-align: center;
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: 'Noto Serif', 'Noto Serif JP', serif;
        }
        #login h1{
            border-bottom: none;
            font-size: 32px;
            font-weight: normal;
            position: relative;
            margin: 10px 0;
        }
        #login h1:after{
            content: 'Authentication';
            font-style: italic;
            letter-spacing: normal;
            opacity: 0.2;
            position: absolute;
            width: 100%;
            text-align: center;
            font-size: 38px;
            top: -15px;
            left: 0;
        }
        img#giraffe{
            display: block;
            height: 168px;
            margin: 30px auto;
            animation: turn linear 20s infinite;
        }
        @keyframes turn {
            0%   { transform: rotate(360deg) }
            33%  { transform: rotate(240deg) }
            66%  { transform: rotate(120deg) }
            100% { transform: rotate(  0deg) }
        }

        input[type=text], input[type=password]{
            background: transparent;
            color: #fffaf0;
            border: none;
            margin: 0 0 10px;
            padding: 2px;
            width: 300px;
            font-size: 18px;
            border-bottom: solid 1px darkgray;
            outline: none;
            font-family: 'Noto Serif', serif;
        }
        input[type=text]::placeholder, input[type=password]::placeholder{
            color: darkgray;
            font-style: italic;
        }
        input[type=text]:focus, input[type=password]:focus{
            border-bottom-color: #fffaf0;
        }

        button[type=submit]{
            margin: 20px;
            padding: 3px 10px;
            font-family: 'Noto Serif', serif;
            font-size: 20px;
            color: #fffaf0;
            background: transparent;
            border: none;
            transition: all .2s;
            outline: none;
            cursor: pointer;
        }
        button[type=submit]:active{
            opacity: 0.5;
        }

        p.error{
            color: red;
            text-align: center;
            font-style: italic;
        }

        #enquiry{
            line-height: 2em;
            font-family: 'Noto Sans', 'Noto Sans JP', sans-serif;
            position: relative;
            padding: 10px;
            margin-top: 20px;
        }
        #enquiry:before{
            position: absolute;
            top: 0;
            left: calc(50% - 60px);
            width: 120px;
            height: 1px;
            background: #fffaf0;
            content: '';
        }
        #enquiry > a{
            display: block;
            background: #dd0000;
            width: 70px;
            height: 70px;
            border-radius: 50%;
            line-height: 70px;
            font-size: 50px;
            text-decoration: none;
            margin: 20px auto;
            color: white;
        }
        #enquiry > span{
            font-family: 'Noto Serif', 'Noto Serif JP', serif;
            font-style: italic;
            font-size: smaller;
        }
    </style>
@endsection

@section('content')
    <div id="login">
        <section>
            <h1>認証</h1>
            <img src="{{ asset('image/badge/giraffe.png') }}" alt="giraffe" id="giraffe">
            <form action="{{ admin_url('auth/login') }}" method="post">
                <div class="form-group has-feedback {!! !$errors->has('username') ?: 'has-error' !!}">

                    @if($errors->has('username'))
                        @foreach($errors->get('username') as $message)
                            <p class="error">{{$message}}</p>
                        @endforeach
                    @endif

                    <label>
                        <input type="text" placeholder="User" name="username" value="{{ old('username') }}" required>
                    </label>
                </div>
                <div class="form-group has-feedback {!! !$errors->has('password') ?: 'has-error' !!}">

                    @if($errors->has('password'))
                        @foreach($errors->get('password') as $message)
                            <p class="error">{{$message}}</p>
                        @endforeach
                    @endif

                    <label>
                        <input type="password" placeholder="Password" name="password" required>
                    </label>
                </div>
                @if(config('admin.auth.remember') and false)
                    <div class="checkbox icheck">
                        <label>
                            <input type="checkbox" name="remember" {{ (old('remember')) ? 'checked' : '' }}>
                            ログイン状態を維持
                        </label>
                    </div>
                @endif
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <button type="submit" class="primary">Login</button>
            </form>
            <div id="enquiry">
                <a href="{{ config('starrysky.mastodonAccount') }}" target="_blank" rel="noopener">？</a>
                お問い合わせはこちら<br>
                <span>Enquiry</span>
            </div>
        </section>
    </div>

@endsection
