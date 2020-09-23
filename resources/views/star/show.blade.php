@extends('layout.app', ['title' => $name])

<?php
    /**
     * @var $star App\Star
     */

    // デフォルトカラー
    $color = strlen($star->color) === 7 ? $star->color : '#151515';

    // name,name_r CK処理
    if(!empty($star->name_r_separate_secondary)){
        $name = separateString($star->name, $star->name_separate, '・');
        $name_r = separateString(separateString($star->name_r, $star->name_r_separate_secondary), $star->name_r_separate);
    }else{
        $name = $star->name;
        $name_r = separateString($star->name_r, $star->name_r_separate);
    }
    $back_name_array = explode(' ', ucwords($name_r));

    /** @var $school App\School|null */
    $school_slug = $school->school_name_slug ?: null;
    $school_name = $school->school_name ?: '';
?>

@section('head')
    <link rel="stylesheet" href="{{ asset('css/star.css') }}">
    <link rel="stylesheet" href="{{ asset('css/document-show.css') }}">
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
    <img src="{{ asset('image/tachie/'.$star->name_r.'.png') }}" alt="{{ $star->name }}"
         id="tachie" data-star="{{ $star->name_r }}">
    <div id="back-name">{{ $back_name_array[0] }}<br>{{ $back_name_array[1].' '.($back_name_array[2] ?? '') }}</div>
    <div id="info-box">
        <section id="profile" class="plain-box">
            <h1 style="border-bottom-color: {{ $color }}">
                @if(!empty($school_slug))
                    <img src="{{ asset('image/badge/'.$school_slug.'.png') }}" alt="{{ $school_name }}">
                @endif
                {{ $name }}<span>{{ ucwords($name_r) }}</span>
            </h1>
            <div id="student-info">
                <div>
                    <a href="{{ url('school/'.$school_slug) }}" class="link">{{ $star->school }}</a> &#x2bc8 {{ $star->department }}
                    {{ $star->grade >= 4 ? $star->grade.'期' : $star->grade.'年' }}
                    {{ !empty($star->class_no) ? '出席番号'.$star->class_no.'番': '' }}</div>
                <div style="color: {{ $color }}; font-weight: bold;cursor: default" id="color-code"
                     title="公式サイトのデザインに基づくものです&#x0Aクリックしてクリップボードにコピー">{{ $star->color ?: 'N/A' }}</div>
            </div>
            <h2>基本プロフィール</h2>
            <table id="profile-table" class="table">
                <tr>
                    <th>キャスト</th><td>{{ $star->cv }}
                        <a href="https://ja.wikipedia.org/wiki/{{ urlencode($star->cv) }}"
                           class="link wiki" target="_blank" rel="noopener">Wikipedia</a></td>
                    <th>誕生日</th><td>{{ convertDateString($star->birthday) }}</td>
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
            <h2>検索</h2>
            <div id="search-box">
                <div style="width: 33%">
                    <h3>百科事典系</h3>
                    <div class="buttons jw">
                        <a href="https://dic.pixiv.net/a/{{ urlencode($name) }}" target="_blank" rel="noopener" class="button">
                            ピクシブ百科事典
                        </a>
                    </div>
                </div>
                <div style="width: 66%">
                    <h3>イラスト系</h3>
                    <div class="buttons jw">
                        <a href="https://www.pixiv.net/tags/{{ urlencode($name) }}/illustrations" target="_blank" rel="noopener" class="button">
                            pixiv タグ検索
                        </a>
                        <a href="https://seiga.nicovideo.jp/tag/{{ urlencode($name) }}" target="_blank" rel="noopener" class="button">
                            ニコニコ静画 タグ検索
                        </a>
                    </div>
                </div>
            </div>
        </section>
        <section id="document" class="plain-box">
            <div>{!! $star->getDocumentAsHtml() ?: '<p style="color:darkred">ドキュメントが登録されていません</p>' !!}</div>
            <hr>
            <p style="font-size: 13px">
                このセクションは管理人が収集した情報によるものです。<br>
                公式の情報ではない推察や、誤った情報、古い情報が含まれる場合があることにご注意ください。
            </p>
            <div style="text-align: right">
                <a href="{{ url('/admin/stars/'.$star->id.'/edit') }}" class="button small">編集</a>
                最終更新 : {{ date('Y/m/d G:i:s T', strtotime($star->updated_at)) }}</div>
        </section>
    </div>
@endsection
