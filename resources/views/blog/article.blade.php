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
            <h2>タイトル <small><a href="{{ url("blog/edit/{$post->id}") }}">編集</a></small></h2>
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

        <!-- コメント表示 -->
        <strong>コメント</strong><br>

        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                @foreach ($comments as $comment)
                <pre>{{ $comment->body }}</pre>
                @endforeach

            </div>
        </div>

        <!-- コメントボタン -->
        <div class="text-center">
            <button type="button" class="btn btn-default btn-sm" data-toggle="collapse" data-target="#comment_form">
                <span class="glyphicon glyphicon-pencil"></span>
                コメントする
            </button>
        </div>

        <div id="comment_form" class="collapse">
            <!-- コメント投稿フォーム -->
            <form method="post" action="{{ url('blog/comment') }}">
                <hr>
                <!-- トークン -->
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <!-- ポストID -->
                <input type='hidden' name="post_id" class="form-control" value="{{ $post_id }}">
                <!-- コメント文 -->
                <div class="form-group">
                    <label for="body">コメント</label>
                    <textarea name="body" class="form-control" rows="3" placeholder="コメントを入力">{{ old('body') }}</textarea>
                </div>
                <!-- 名前 -->
                <div class="form-group">
                    <label for="title">名前</label>
                    <input type="text" name="name" class="form-control" value="{{ old('name') }}" placeholder="名前を入力">
                </div>
                <button type="submit" class="btn btn-default">投稿</button>
            </form>
        </div>


    </div>
</div>


@endsection