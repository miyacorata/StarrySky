@extends('layout.app',['title' => '書庫内簡易検索'])

@section('head')
    <link rel="stylesheet" href="{{ asset('css/page-index.css') }}">
@endsection

@section('content')
    <img src="{{ asset('/image/badge/giraffe.png') }}" alt="Giraffe" id="top-image">
    <div id="info-box">
        <section class="plain-box">
            <h1>書庫内簡易検索</h1>
            <div id="page-header">
                <h2>単語検索</h2>
                <form id="page-search" action="{{ url('/page') }}">
                    <label>
                        <input type="text" placeholder="キーワード" name="q"
                               class="input-box" @if(!empty($query_text)) value="{{ $query_text }}" @endif>
                    </label>
                    <input type="submit" class="button" value="検索">
                </form>
            </div>
        </section>
        <section class="plain-box">
            <h2>{{ $query }}</h2>
            <?php
            /**
             * @var $page \App\Page
             */
            ?>
            @if($pages->count() !== 0)
                <p>
                    該当する資料が
                    <span style="font-size: larger">{{ $pages->count() }}件</span>
                    見つかりました。
                </p>
                @foreach($pages as $page)
                    <div class="recent-page">
                        <h3>
                            <span>{{ date('m/d H:i',strtotime($page->updated_at)) }}</span>
                            <a href="{{ url('/page/'.urlencode($page->title)) }}">{{ $page->title }}</a>
                        </h3>
                        <div class="category">
                            {!! e($page->category) ?: '<span style="font-style: italic;font-size: small;color: darkred">このページはどのカテゴリにも属していません</span>' !!}
                        </div>
                        <blockquote class="description">{{ mb_substr($page->document,0,60).'...' }}</blockquote>
                    </div>
                @endforeach
            @else
                <p style="color: darkred; font-style: italic;">
                    該当する資料は見当たりませんでした。
                </p>
                <p style="font-size: smaller">
                    変換ミスや点の有無などを再度ご確認ください。<br>
                    点をスペースに置き換えたり、キーワードを短くすると資料がヒットするかもしれません。
                </p>
            @endif

        </section>
    </div>

@endsection
