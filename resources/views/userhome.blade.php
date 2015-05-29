@extends('app')

@section('title', $title)

@section('content')


<div class="container">

    <!-- ヘッダ表示 -->
    <div class="page-header">
        <h1>ブログメインメニュー</h1>
    </div>
    <div class="panel-body">

        <!-- ブログタイトル表示 -->
        <ul>
            @foreach ($posts as $post)
            <li><a href="{{ url("blog/article/{$post->id}") }}">{{ $post->title }}</a></li>
            @endforeach
        </ul>
    </div>


    @endsection