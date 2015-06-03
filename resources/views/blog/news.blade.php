@extends('app')

@section('title', $title)

@section('content')

<div class="container">
    <div class="page-header">
        <h1>新着投稿一覧</h1>
    </div>

    @foreach ($posts as $post)
    <div class="panel-body">
        <a class="col-md-8" href="{{ url("blog/article/{$post->id}") }}"><h3>{{ $post->title }}</h3></a>
        <h4 class="col-md-4 pull-right">{{ $post->user->name}}</h4>
        <h4 class="col-md-8">{{ $post->body }}</h4>
        <h5 class="col-md-4 pull-right">{{ $post->updated_at}}</h5>
    </div>
    <hr>
    @endforeach

</div>


@endsection