@extends('app')

@section('title', $title)

@section('content')


<div class="container">

    <!-- ヘッダ表示部 -->
    <div class="page-header">
        <h1>投稿記事</h1>
    </div>

    <!-- タイトル表示：自分の投稿であれば編集リンクつきタイトル表示 -->
    <div class="form-group">
        @if (Auth::user()->id == $post->user_id)

        <h2>タイトル <small><a  class="btn btn-primary pull-right" href="{{ url("blog/edit/{$post->id}") }}">編集</a></small></h2>
        @else
        <h2>タイトル </h2>
        @endif
        <pre>{{ $post->title }}</pre>
    </div>

    <!-- 本文表示 -->
    <div class="form-group">
        <h2>本文</h2>
        <pre>{{ $post->body }}</pre>
    </div>
</div>
</div>
<br>

<!-- コメント表示 -->
<div class="container">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h2><span class="glyphicon glyphicon-pencil"></span>コメント</h2>
        </div>
        <div class="panel-body">
            <center>
                @if(count($comments) === 0)
                コメントはありません
                @else
                @foreach ($comments as $comment)
                <div align=left>{{ $comment->name}}</div><div>{{ $comment->comment }}</div><hr>
                @endforeach
                @endif
            </center>
        </div>
    </div>

    <br>
    <br>

    <!--コメント入力-->
    <div class="container">
        <form method="post" action="{{ url("blog/comment/{$post->id}") }}">
            <input type="hidden" name="_token" value="{{ csrf_token() }}"> 
            <input type='hidden' name="name" class="form-control" value="{{ Auth::user()->name }}">
            <div class="form-group">
                <h2>コメント投稿</h2>
                <textarea name="comment" class="form-control" rows="7"  placeholder="コメントを入力">{{old('comment')}}</textarea>
            </div>
            <button type="submit" class="btn btn-primary pull-right">投稿</button>
        </form>
    </div>



    @endsection