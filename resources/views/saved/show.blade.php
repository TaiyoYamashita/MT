@extends('paper')

@section('header')
    <x-slot name="header">
        保存した文章
    </x-slot>
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
    <form action="/saved/{{ $post->id }}" id="form_{{ $post->id }}" method="POST">
        @csrf
        @method("DELETE")
        <button type="button" onclick="deletePost({{ $post->id }})">削除する</button>
    </form>
    <a href="/saved">戻る</a>
    
    <script>
        function deletePost(id)
        {
            'use strict'
            
            if (confirm('削除しますか？（削除すると復元することができません。）'))
            {
                document.getElementById(`form_${id}`).submit();
            }
        }
    </script>
@endsection