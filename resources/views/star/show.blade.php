@extends('layout.app')

<?php
    /**
     * @var $star App\Star
     */

    $color = strlen($star->color) === 7 ? $star->color : '#151515'
?>

@section('head')
    <link rel="stylesheet" href="{{ asset('css/star.css') }}">
    <style>
        body{
            background: {{ $color }};
        }
    </style>
    <script>
        document.addEventListener('DOMContentLoaded',()=>{
            const colorCode = document.getElementById('color-code');
            colorCode.addEventListener('click', ()=>{
                setClipBoard(colorCode.innerText);
            });
        });
    </script>
@endsection

@section('content')
    <img src="{{ asset('image/tachie/'.$star->name_r.'.png') }}" alt="{{ $star->name }}" id="tachie">
    <div class="plain-box" id="info-box">
        <section id="profile">
            <h1 style="border-bottom-color: {{ $color }}">
                <img src="{{ asset('image/badge/seisho.png') }}" alt="seisho">
                {{ $star->name }}<span>{{ ucwords(separateString($star->name_r,$star->name_r_separate)) }}</span>
            </h1>
            <div id="student-info">
                <div>{{ $star->school.' '.$star->department }}
                    {{ $star->grade >= 4 ? $star->grade.'期' : $star->grade.'年' }}
                    {{ !empty($star->class_no) ? '出席番号'.$star->class_no.'番': '' }}</div>
                <div style="color: {{ $color }}; font-weight: bold;cursor: default" id="color-code">{{ $star->color ?: 'N/A' }}</div>
            </div>
            <h2>基本プロフィール</h2>
            <table id="profile-table" class="table">
                <tr>
                    <th>キャスト</th><td>{{ $star->cv }}</td>
                    <th>誕生日</th><td>{{ $star->birthday }}</td>
                </tr>
                <tr>
                    <th>好きなこと</th><td>{{ $star->act_like }}</td>
                    <th>苦手なこと</th><td>{{ $star->act_not_good }}</td>
                </tr>
                <tr>
                    <th>好きな食べ物</th><td>{{ $star->food_like }}</td>
                    <th>嫌いな食べ物</th><td>{{ $star->food_dislike }}</td>
                </tr>
                <tr>
                    <th>武器名</th><td>{{ $star->weapon_name }}</td>
                    <th>武器カテゴリ</th><td>{{ $star->weapon_category }}</td>
                </tr>
            </table>
        </section>
        <section>
            <h2>Document</h2>
            <div>{{ $star->document }}</div>
        </section>
    </div>
@endsection
