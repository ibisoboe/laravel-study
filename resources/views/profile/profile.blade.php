@extends('app')

@section('title', $title)

@section('content')



<div class="container">
    <div class="page-header">
        <h1>Myページ</h1>
    </div>
    <?PHP
    $id = Auth::user()->id;
    ?>
    @if(Auth::guest() or URL::current() <> url("/profile/profile/{$id}"))
    <h2>あなたの権限ではこのページ開けません。</h2>
    @else


    @endif
</div>


@endsection