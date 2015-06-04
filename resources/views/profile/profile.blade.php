@extends('app')

@section('title', $title)

@section('content')

<div class="container">
    <div class="page-header">
        <?PHP
        $id = Auth::user()->id;
        ?>

        @if(Auth::guest() or URL::current() == url("/profile/profile/{$id}"))
        <h1>Myページ<small><a  class="btn btn-primary pull-right" href="{{ url("profile/edit/{}") }}">編集</a></small></h1>
        @else
        <h1>Myページ</h1>
        @endif
    </div>


    <div class="row">
        <div class="col-md-3">
            <div class="well">
                <center>

                    <?php
                    if ($profile) {
                        echo Html::image("img/sample.jpg", '画像がアップロードされていません');
                    }
                    ?>

                </center>
            </div>
        </div>
        <div class="col-md-1">
        </div>
        <div class="col-md-6">
            <h4>ユーザー名</h4><pre></pre>
            <h4>自己紹介</h4><pre></pre>
            <div class="row">
                <div class="col-md-6">
                    <h4>姓</h4><pre></pre>
                </div>
                <div class="col-md-6">
                    <h4>名</h4><pre></pre>
                </div>
            </div>
            <div class="row">
                <h4>生年月日</h4>
                <h4 class="col-md-12"><pre class="col-md-4 ">年</pre><pre class="col-md-4">月</pre><pre class="col-md-4">日</pre></h4>
            </div>
            <h4>年齢</h4><pre></pre>
            <h4>性別</h4><pre></pre>
            <h4>住所</h4><pre></pre>
        </div>
        <div class="col-md-2">
        </div>
    </div>


</div>


@endsection