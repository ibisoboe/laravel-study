@extends('app')

@section('title', $title)

@section('content')

<div class="container">
    <div class="page-header">
        <h1>新規投稿</h1>
    </div>

    @if(count($errors) > 0)
    <div class="alert alert-danger" role="alert">
        <ul>
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>

    </div>
    @endif


        <div class="panel-body">

            <form method="post" action="{{ url('blog/create') }}">
                <input type="hidden" name="_token" value="{{ csrf_token() }}"> 
                <input type='hidden' name="user_id" class="form-control" value="{{ Auth::user()->id }}">
                <div class="form-group">

                    <label for="title">タイトル</label>
                    <input type="text" name="title" class="form-control" placeholder="記事のタイトルを入力" value="{{old('title')}}">
                </div>

                <div class="form-group">
                    <label for="body">本文</label>
                    <textarea name="body" class="form-control" rows="15"  placeholder="本文を入力">{{old('body')}}</textarea>
                </div>

                <button type="submit" class="btn btn-primary">投稿</button>

            </form>
</div>


@endsection