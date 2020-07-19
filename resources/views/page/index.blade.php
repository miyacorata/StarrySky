@extends('layout.app',['title' => '書庫'])

@section('head')
    <link rel="stylesheet" href="{{ asset('css/page-index.css') }}">
@endsection

@section('content')
    <img src="{{ asset('/image/badge/giraffe.png') }}" alt="Giraffe" id="top-image">
    <div id="info-box">
        <section class="plain-box">
            <h1>書庫</h1>
            <div id="page-header">
                <div id="welcome">書庫へようこそ</div>
                <p>少女☆歌劇レヴュースタァライトに関する様々な事柄を調査・収集し資料として公開しています</p>
                <p>ページによっては重大なネタバレが含まれる場合がありますので閲覧・検索の際はご注意ください。</p>
                <h2>検索</h2>
                <form id="page-search" action="{{ url('/page') }}">
                    <label>
                        <input type="text" placeholder="キーワード" name="q" class="input-box">
                    </label>
                    <input type="submit" class="button" value="検索">
                </form>
            </div>
        </section>
        <section class="plain-box">
            <h2>現在の収蔵状況</h2>
            <p>
                現在当書庫で収蔵している資料は
                <span style="font-size: larger">{{ $count }}件</span>
                です。
            </p>
            <h2>最近の更新</h2>
            @forelse($recent as $page)
                <?php
                /**
                 * @var $page \App\Page
                 */
                ?>
                <div class="recent-page">
                    <h3>
                        <span>{{ date('m/d H:i',strtotime($page->updated_at)) }}</span>
                        <a href="{{ url('/page/'.urlencode($page->title)) }}">{{ $page->title }}</a>
                    </h3>
                    <div class="category">{{ $page->category }}</div>
                    <blockquote class="description">{{ mb_substr($page->document,0,60).'...' }}</blockquote>
                </div>
            @empty
            @endforelse
        </section>
    </div>

@endsection
