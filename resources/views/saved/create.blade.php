@extends('template')

@section('var')
    保存した文章
@endsection

@section('contents')
    <form action="/saved" method="POST">
        @csrf
        <div class="title">
            <p>タイトル</p>
            <input type="text" name="post[title]"/></br>
        </div>
        <div class="sentences">
            <p>本文</p>
            <textarea name="post[sentences]"></textarea></br>
        </div>
        <div class="memorandum">
            <p>メモ</p>
            <textarea name="post[memorandum]"></textarea>
        </div>
        <input type="submit" value="保存"/>
    </form>
    <a href="/saved">戻る</a>
@endsection