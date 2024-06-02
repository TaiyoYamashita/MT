@extends('template')

@section('var')
    保存した文章
@endsection

@section('contents')
    <h5 name="post[title]">{{ $post->title }}</h5>
    <small>編集日時：{{ $post->updated_at }}</small>
    <p name="post[sentences]">{{ $post->sentences }}</p>
    <p>メモ</p>
    <p>{{ $post->memorandum }}</p>
    <form action="/saved/{{ $post->id }}/post" method="POST">
        @csrf
        @method('PUT')
        <input type="submit" value="投稿する"/>
    </form>
    <a href="/saved/{{ $post->id }}/edit">編集する</a>
    <a href="/saved">戻る</a>
@endsection