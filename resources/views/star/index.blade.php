@extends('layout.app',['title' => '舞台少女一覧'])

@section('head')
    <link rel="stylesheet" href="{{ asset('css/star-button.css') }}">
@endsection

@section('content')
    <section id="list" class="plain-box">
        <h1>舞台少女一覧</h1>
        <div class="buttons star-buttons">
            @forelse($stars as $star)
                <a href="{{ url('/star/'.$star->name_r) }}" class="star-button" data-star="{{ $star->name_r }}">
                    <div class="tachie" style="background-image: url('{{ asset('image/tachie/'.$star->name_r.'.png') }}')"></div>
                    <div class="name" style="background: {{ $star->color }}">{{ $star->name }}</div>
                    <div class="school-info">
                        {{ $star->school }}<br>
                        {{ $star->department.' '.$star->grade.($star->grade <= 3 ? '年' : '期生') }}
                    </div>
                    <div class="cast-info">{{ $star->cv }}</div>
                </a>
            @empty
                <p style="margin: 30px 0;text-align: center">
                    データが登録されていません。<br>
                    管理者に連絡してください。
                </p>
            @endforelse
        </div>

    </section>
@endsection
