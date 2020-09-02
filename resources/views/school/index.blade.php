@extends('layout.app', ['title' => '学校一覧'])

@section('head')
    <style>
        .school{
            display: flex;
            border-radius: 4px;
            box-shadow: 0 0 5px gray;
            overflow: hidden;
            margin-bottom: 10px;
        }
        .school > .name{
            width: 300px;
            flex-shrink: 0;
            background: #151515;
            color: white;
            padding: 10px;
            text-align: center;
            font-size: 25px;
            font-family: 'Noto Serif JP', serif;
            text-decoration: none;
        }
        .school > .name > img{
            display: block;
            margin: 0 auto 5px;
            height: 50px;
        }
        .school > .description{
            padding: 10px 15px;
        }
    </style>
@endsection

@section('content')
    <section id="list" class="plain-box">
        <h1>学校一覧</h1>
        <div>
            @forelse($schools as $school)
                <?php
                /**
                 * @var $school App\School
                 */
                ?>
                <div class="school">
                    <a href="{{ url('/school/'.$school->school_name_slug) }}" class="name"
                       style="background: {{ $school->color }}">
                        <img src="{{ asset('image/badge/'.$school->school_name_slug).'.png' }}" alt="{{ $school->school_name }}">
                        {{ $school->school_name }}
                    </a>
                    <div class="description">
                        {!! nl2br($school->description) !!}
                    </div>
                </div>
            @empty
                <p style="color: darkred; text-align: center">レコードが見つかりません</p>
            @endforelse
        </div>
    </section>
@endsection
