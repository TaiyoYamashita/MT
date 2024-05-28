@extends('template')

@section('var')
    保存した文章の編集
@endsection

@section('contents')
    <form action="/saved/{{ $post->id }}" method="POST">
        @csrf
        @method('PUT')
        <div class="title">
            <p>タイトル</p>
            <input type="text" name="post[title]"　value="{{ $post->title }}">
        </div>
        <div class="sentences">
            <p>本文</p>
            <textarea name="post[sentences]" value="{{ $post->sentences }}"></textarea>
        </div>
        <div class="memorandum">
            <p>メモ</p>
            <textarea name="post[memorandum]" value="{{ $post->memorandum }}"></textarea>
        </div>
        <input type="submit" value="保存">
        <a href="/saved/{{ $post->id }}">戻る</a>
    </form>
@endsection