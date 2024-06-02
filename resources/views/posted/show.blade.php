@extends('template')

@section('var')
    投稿した文章
@endsection

@section('contents')
    <h5>{{ $post->title }}</h5>
    <small>投稿日時：{{ $post->posted_at }}</small>
    <p>{{ $post->sentences }}</p>
    <p>メモ</p>
    <p>{{ $post->memorandum }}</p>
    <form action="/posted/{{ $post->id }}/save" method="POST">
        @csrf
        @method('PUT')
        <input type="submit" value="投稿を取り消す"/>
    </form>
    <a href="/posted">戻る</a>
@endsection