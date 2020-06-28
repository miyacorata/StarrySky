@extends('layout.app',['title' => $school->school_name])
<?php
    /**
     * @var $school App\School
     */
?>

@section('head')
    <link rel="stylesheet" href="{{ asset('css/star-button.css') }}">
    <style>
        #summary > h1 > img{
            height: 1em;
            width: auto;
            margin-right: 5px;
            vertical-align: bottom;
            padding-bottom: 5px;
        }
    </style>
@endsection

@section('content')
    <section class="plain-box" id="summary">
        <h1 style="border-bottom-color: {{ $school->color }}">
            <img src="{{ asset('image/badge/'.$school->school_name_slug.'.png') }}" alt="{{ $school->school_name }}">
            {{ $school->school_name }}
        </h1>
        <p>{!! nl2br($school->description) !!}</p>
        <h2>所属舞台少女</h2>
        <div class="buttons">
            @forelse($stars as $star)
                @include('component.star', compact('star'))
            @empty
                ない
            @endforelse
        </div>
    </section>
    <section class="plain-box" id="document">
        <div>{!! $document ?: '<p style="color:darkred">ドキュメントが登録されていません</p>' !!}</div>
        <hr>
        <p style="font-size: 13px">
            このセクションは管理人が収集した情報によるものです。<br>
            公式の情報ではない推察や、誤った情報、古い情報が含まれる場合があることにご注意ください。
        </p>
        <div style="text-align: right">最終更新 : {{ date('Y/m/d G:i:s T', strtotime($school->updated_at)) }}</div>
    </section>
@endsection
