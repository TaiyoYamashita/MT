@extends('template')

@section('var')
    みんなの投稿
@endsection

@section('contents')
    <div class="container" style="padding: 20px">
        <?php $cnt=0; ?>
        @foreach ($posts as $post)
            @if ($cnt==0)
                <div class='post' style="float: left">
                <?php $cnt=1; ?>
            @else
                <div class='post'>
                <?php $cnt=0; ?>
            @endif
                <h2>{{ $post->title }}</h2>
                <p>{{ $post->name }}</p>
                <p>{{ $post->saved_or_posted_at }}</p>
            </div>
        @endforeach
    </div>
@endsection