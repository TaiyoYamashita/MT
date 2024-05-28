@extends('template')

@section('var')
    保存した文章
@endsection

@section('contents')
    <h5>{{ $post->title }}</h5>
    <small>編集日時：{{ $post->updated_at }}</small>
    <p>{{ $post->sentences }}</p>
    <p>メモ</p>
    <p>{{ $post->memorandum }}</p>
    <a href="/saved/{{ $post->id }}/edit">編集する</a>
    <a href="#">投稿する</a>
    <a href="/saved">戻る</a>
@endsection