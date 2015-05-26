@extends('app')

@section('content')
<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>blog_main</title>
    </head>
    <body>
        <div class="container">
            <div class="page-header">
                <h1>新規投稿</h1>
            </div>
            <table class="table table-striped" border="1">
                <div class="panel-body">

                    <form method="post" action="{{ url('/blog/newposts') }}">

                        <!-- タイトル -->
                        <div class="form-group">
                            <label for="title">タイトル</label>
                            <input type="text" name="title" class="form-control" value="{{ old('title') }}" placeholder="記事のタイトルを入力">
                        </div>

                        <!-- 本文 -->
                        <div class="form-group">
                            <label for="body">本文</label>
                            <textarea name="body" class="form-control" rows="15" value="{{ old('body') }}" placeholder="本文を入力"></textarea>
                        </div>


                        <button type="submit" class="btn btn-default">投稿</button>
                    </form>
            </table>      
        </div>
    </body>
</html>
@endsection