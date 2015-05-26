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

                    <form method="post" action="{{ url('/blog/posts') }}">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}"> 

                        <div class="form-group">
                            <input type='hidden' name="name" class="form-control" value="{{ Auth::user()->name }}">
                            <label for="title">タイトル</label>
                            <input type="text" name="title" class="form-control" placeholder="記事のタイトルを入力">
                        </div>

                        <div class="form-group">
                            <label for="mainbody">本文</label>
                            <textarea name="mainbody" class="form-control" rows="15"  placeholder="本文を入力"></textarea>
                        </div>

                        <button type="submit" class="btn btn-default">投稿</button>

                    </form>


            </table>      
        </div>
    </body>
</html>
@endsection