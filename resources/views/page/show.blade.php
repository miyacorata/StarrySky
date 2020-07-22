<?php
/**
 * @var $page \App\Page
 */
?>

@extends('layout.app',['title' => $page->title])

@section('head')
@endsection

@section('content')
    <section class="plain-box">
        <h1>{{ $page->title }}</h1>
        {!! $page->getDocumentAsHtml() !!}
    </section>
@endsection
