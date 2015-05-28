@extends('app')

@section('title', $title)

@section('content')


<div class="container">
    <div class="page-header">
        <h1>投稿記事</h1>
    </div>
    <table class="table table-striped" border="1">
        <div class="panel-body">
            <div class="form-group">

                <label for="title">タイトル</label>
                <pre>{{ $posts->title }}</pre>
            </div>

            <div class="form-group">
                <label for="body">本文</label>
                <pre>{{ $posts->body }}</pre>
            </div>
        </div>
    </table>      
</div>


@endsection