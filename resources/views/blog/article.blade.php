@extends('app')

@section('title', $title)

@section('content')


<div class="container">

    <!-- ヘッダ表示部 -->
    <div class="page-header">
        <h1>投稿記事</h1>
    </div>
    <div class="panel-body">

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
<br>


<!-- コメント表示 -->
<div class="container" data-spy="scroll">
    <strong>コメント</strong>
    <span class="glyphicon glyphicon-pencil"></span>
    <br>
    <div class="col-md-6 col-md-offset-2">
        @foreach ($comments as $comment)
        <hr>{{ $comment->name}}{{ $comment->comment }}</hr>
        @endforeach
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
            <label for="comment">コメント投稿</label>
            <textarea name="comment" class="form-control" rows="7"  placeholder="コメントを入力">{{old('comment')}}</textarea>
        </div>
        <button type="submit" class="btn btn-primary pull-right">投稿</button>
    </form>
</div>



@endsection