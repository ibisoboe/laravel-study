@extends('app')

@section('title', $title)

@section('content')


<div class="container">

    <!-- ヘッダ表示 -->
    <div class="page-header">
        <h1>ブログメインメニュー</h1>
    </div>


    <!-- ブログタイトル表示 -->

    <div class="panel-body">
        @foreach ($posts as $post)
        <a href="{{ url("blog/article/{$post->id}") }}"><h3>{{ $post->title }}</h3></a>
        <h4>{!! nl2br(e($post->body)) !!}</h4>
        <h5 class="pull-right">{{ $post->updated_at}}</h5>
        <br>
        <hr>
        @endforeach
    </div>
</div>

@endsection