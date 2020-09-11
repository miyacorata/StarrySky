@extends('layout.app',['title' => 'Error '.$exception->getStatusCode()])
<?php
    /**
     * @var $exception \Symfony\Component\HttpKernel\Exception\HttpExceptionInterface
     */

    $sc = $exception->getStatusCode();

    $status = [
        400 => 'Bad Request',
        403 => 'Forbidden',
        404 => 'Not Found',
        500 => 'Internal Server Error',
        503 => 'Service Unavailable',
    ];
    $messages = [
        400 => '要求の形式が正しくありません',
        403 => 'このページにアクセスする権限がありません',
        404 => 'お探しのページは存在しません',
        500 => 'サーバ内部でエラーが発生しました',
        503 => 'アクセス集中かメンテナンスのためアクセスできません',
    ];

    $message = $exception->getMessage() ?: $messages[$sc] ?? '何かがおかしいようです';
?>

@section('head')
    <style>
        main{
            min-height: calc(100vh - 200px);
            display: flex;
            justify-content: center;
            align-items: center;
        }
        #error{
            text-align: center;
            font-family: 'Noto Serif', 'Noto Serif JP', serif;
        }
        h1 > span{
            color: gray;
            margin-right: 10px;
        }
    </style>
@endsection

@section('content')
    <div id="error">
        <img src="{{ asset('image/badge/403.png') }}" alt="403">
        <h1><span>{{ $sc }}</span>{{ $status[$sc] ?? 'Something Wrong' }}</h1>
        <p>{{ $message }}</p>
    </div>
@endsection
