@extends('template')

@section('read css')
    <link rel="stylesheet" href="everybody.css">
@endsection

@section('var')
    みんなの投稿
@endsection

@section('contents')
    <?php $cnt=0; ?>
    @foreach ($posts as $post)
        <div class='post'>
            <h2>{{ $post->title }}</h2>
            <p>{{ $post->name }}</p>
            <p>{{ $post->saved_or_posted_at }}</p>
        </div>
        <?php ++$cnt ?>
        @if ($cnt==4)
            <div class="clear"></div>
            <?php $cnt=0 ?>
        @endif
    @endforeach
@endsection