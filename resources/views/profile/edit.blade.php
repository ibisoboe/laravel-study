@extends('app')

@section('title', $title)

@section('content')


<div class="container">
    <div class="page-header">
        <h1>投稿記事編集</h1>
    </div>
    @if (Auth::user()->id == $post->user_id)
    

    <?= Form::open(['url' => 'blog/edit', 'method' => 'PUT']) ?>

    <input type="hidden" id="id" name="id" value="{{ $post->id }}" />
    <div class="form-group">
        <label for="title">タイトル</label>
        <input type="text" id="title" name="title" class="form-control" value="{{ $post->title }}" />
    </div>

    <div class="form-group">
        <label for="body">本文</label>
        <textarea id="body" name="body" cols="30" rows="10" class="form-control">{{ $post->body }}</textarea>
    </div>

    <div class="form-group">
        <input type="submit" class="btn btn-primary" value="送信" />
    </div>
    <?= Form::close() ?>
    
    @else
    <div class=" form-group">
        <h2>あなたの権限ではこのページは開けません。<br>
        是非とも、おとといきやがれです！！！！<br>
        なおいつまでもこのページであがくようであれば、自動的に危ないサイトに遷移するので、<br>
        急いで「Backspace」で前のページへもどってください！！
        </h2>
    @endif
</div>


@endsection