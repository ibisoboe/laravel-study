@extends('app')

@section('title', $title)

@section('content')

<div class="container">
    <div class="page-header">
        <h1>新着投稿一覧</h1>
    </div>
    <table class="table table-striped" border="1">
        <div class="panel-body">
            <ul>
                @foreach ($posts as $post)
                <li><a href="{{url("blog/article/{$post->id}")}}">{{ $post->title }}</a></li>
                @endforeach
            </ul>
        </div>
    </table>      
</div>

@endsection