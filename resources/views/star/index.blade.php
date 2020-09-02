@extends('layout.app',['title' => '舞台少女一覧'])

@section('head')
    <link rel="stylesheet" href="{{ asset('css/star-button.css') }}">
@endsection

@section('content')
    <section id="list" class="plain-box">
        <h1>舞台少女一覧</h1>
        <div class="buttons star-buttons">
            @forelse($stars as $star)
                @include('component.star',compact('star'))
                @if($loop->last && (count($stars) % 3))
                    <img src="{{ asset('image/badge/mrwhite.png') }}" alt="" class="spacer">
                @endif
            @empty
                <p style="margin: 30px 0;text-align: center">
                    データが登録されていません。<br>
                    管理者に連絡してください。
                </p>
            @endforelse
        </div>

    </section>
@endsection
