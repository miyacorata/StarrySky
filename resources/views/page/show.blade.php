<?php
/**
 * @var $page \App\Page
 */
?>

@extends('layout.app',['title' => $page->title])

@section('head')
    <link rel="stylesheet" href="{{ asset('css/document-show.css') }}">
@endsection

@section('content')
    <section class="plain-box">
        <h1>{{ $page->title }}</h1>
        <div id="categories">
            @empty($page->category)
                <span style="font-style: italic;font-size: small;color: darkred">このページはどのカテゴリにも属していません</span>
            @else
                @foreach(explode(',',$page->category) as $category)
                    <a href="{{ url('/page').'?category='.$category }}">{{ $category }}</a>
                @endforeach
            @endempty

        </div>
        <div id="document">{!! $page->getDocumentAsHtml() !!}</div>
        <hr>
        <p style="font-size: 13px">
            書庫内の情報は管理人が独自に収集した情報によるものです。<br>
            公式の情報ではない推察や、誤った情報、古い情報が含まれる場合があることにご注意ください。
        </p>
        <div style="text-align: right">
            <a href="{{ url('/admin/pages/'.$page->id.'/edit') }}" class="button small">編集</a>
            最終更新 : {{ date('Y/m/d G:i:s T', strtotime($page->updated_at)) }}</div>
    </section>
@endsection
