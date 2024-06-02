@extends('template')

@section('read css')
    <link rel="stylesheet" href="everybody.css">
@endsection

@section('var')
    みんなの投稿
@endsection

@section('contents')
    <?php $cnt=0; ?>
    @foreach ($all_posts as $post)
        <div class='post'>
            <a href="/every/{{ $post->id }}"><h2>{{ $post->title }}</h2></a>
            <p>{{ $post->sentences }}</p>
            <small>{{ $post->user->name }}</small>
            <small>{{ $post->posted_at }}</small>
        </div>
        <?php ++$cnt ?>
        @if ($cnt==4)
            <div class="clear"></div>
            <?php $cnt=0 ?>
        @endif
    @endforeach
@endsection