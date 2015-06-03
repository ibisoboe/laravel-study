@extends('app')

@section('title', $title)

@section('content')


<div class="container">
    <div class="row">
        @if(count($errors) > 0)
        <div class="alert alert-danger" role="alert">
            <ul>
                @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <!-- ヘッダ表示部 -->

        <div class="page-header">
            <h1>投稿記事</h1>
        </div>

        <!-- タイトル表示：自分の投稿であれば編集リンクつきタイトル表示 -->

        <div class="panel panel-default">
            <div class="panel-heading">
                @if (Auth::user()->id == $post->user_id)
                <h3>{{ $post->title }}<small><a  class="btn btn-primary pull-right" href="{{ url("blog/edit/{$post->id}") }}">編集</a></small></h3>
                @else
                <h3>{{ $post->title }}</h3>
                @endif
            </div>

            <!-- 本文表示 -->

            <div class="panel-body">
                <pre><h4>{{ $post->body }}</h4></pre>
                <h5 class="pull-right">{{$post->updated_at}}</h5>
            </div>
        </div>
    </div>
    <br>

    <!-- コメント表示 -->

    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3>コメント</h3>
            </div>
            <div class="panel-body">
                @if(count($comments) === 0)
                <center>コメントはありません</center>
                @else
                @foreach ($comments as $comment)
                <div class="col-md-1">{{ $comment->name}}<hr></div>
                <div class="col-md-8">{{ $comment->comment }}<hr></div>
                <div class="col-md-3">{{ $comment->created_at }}<hr></div>
                @endforeach
                @endif
            </div>
        </div>
    </div>
    <br>
    <br>

    <!--コメント入力-->

    <div class="row">
        <form method="post" action="{{ url("blog/comment/{$post->id}") }}">
            <input type="hidden" name="_token" value="{{ csrf_token() }}"> 
            <input type='hidden' name="name" class="form-control" value="{{ Auth::user()->name }}">
            <div class="form-group">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3>コメント投稿<span class="glyphicon glyphicon-pencil"></span></h3>
                    </div>
                    <div class="panel-body">
                        <textarea name="comment" class="form-control" rows="3"  placeholder="コメントを入力">{{old('comment')}}</textarea>
                        <br>
                        <button type="submit" class="btn btn-primary pull-right">投稿</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>


@endsection