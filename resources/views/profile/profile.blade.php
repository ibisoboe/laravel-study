@extends('app')

@section('title', $title)

@section('content')


<div class="container">
    <!-- ヘッダー部分 -->
    <div class="page-header">
        <!--
        ログインユーザでなければ、編集ボタンを出力しない
        -->
        <?PHP
        $id   = Auth::user()->id;
        ?>
        @if(Auth::guest() || URL::current() == url("/profile/profile/{$id}"))
        <h1>Myページ<small><a  class="btn btn-primary pull-right" href="{{ url("profile/edit/{}") }}">編集</a></small></h1>
        @else
        <h1>Myページ</h1>
        @endif
    </div>

    <!-- プロフィール本文 -->
    <div class="row">
        <div class="col-md-1">
        </div>
        <!--ユーザ画像-->
        <div class="col-md-3">
            <div class="row">
                <div class="well">
                    <center>
                        @if(is_null($profile) || is_null($profile->image_path))
                        {!! Html::image("img/sample.jpg", '画像がアップロードされていません',array('width'=>'240','height'=>'240')) !!}
                        @else
                        {!! Html::image($profile->image_path, $user->name,array('width'=>'240','height'=>'240')) !!}
                        @endif
                    </center>
                </div>
                <!--画像アップロード-->
                @if(Auth::guest() || URL::current() == url("/profile/profile/{$id}"))
                <div class="form-group">
                    <?= Form::open(['url' => "profile/upload/{$id}", 'files' => true]) ?>
                    <?= Form::file('image', ['class' => 'form-control']) ?>
                </div>
                <input type="submit" class="btn btn-primary" value="画像をアップロード"></input>
                <?= Form::close() ?>
                @else
                @endif
            </div>
        </div>
        <div class="col-md-1">
        </div>
        <!--プロフィール表示-->
        <div class="col-md-6">
            <h4>ユーザー名</h4><pre>{{$user->name}}</pre>

            @if(is_null($profile) || is_null($profile->profile))
            <h4>自己紹介</h4><pre>Hello!!!</pre>
            @else
            <h4>自己紹介</h4><pre>{{$profile->profile}}</pre>
            @endif

            <div class="col-md-6">
                <h4>姓</h4>
                @if(is_null($profile) || is_null($profile->familyname))
                <pre></pre>
                @else
                <pre>{{$profile->familyname}}</pre>
                @endif
            </div>

            <div class="col-md-6">
                <h4>名</h4>
                @if(is_null($profile) || is_null($profile->firstname))
                <pre></pre>
                @else
                <pre>{{$profile->firstname}}</pre>
                @endif
            </div>

            <h4>生年月日</h4>
            @if(is_null($profile) || is_null($profile->birthday))
            <pre></pre>
            @else
            <pre>{{$profile->birthday}}</pre>
            @endif

            <h4>年齢</h4>
            @if(is_null($profile) || is_null($profile->birthday))
            <pre></pre>
            @else
            <?php $year = (int) ((date('Ymd') - $profile->birthday) / 10000); ?>
            <pre>{{$year}}</pre>
            @endif

            <h4>性別</h4>
            @if(is_null($profile) || is_null($profile->gender))
            <pre></pre>
            @else
            <pre>{{$profile->gender}}</pre>
            @endif

            <h4>住所</h4>
            @if(is_null($profile) || is_null($profile->street_address))
            <pre></pre>
            @else
            <pre>{{$profile->street_address}}</pre>
            @endif

        </div>
        <div class="col-md-2">
        </div>
    </div>


</div>


@endsection