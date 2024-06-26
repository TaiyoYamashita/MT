<x-app-layout>
    <x-slot name="header">
        保存した文章の編集
    </x-slot>
    <form action="/saved/{{ $post->id }}" method="POST">
        @csrf
        @method("PUT")
        <div class="title">
            <p>タイトル</p>
            <input type="text" name="post[title]" value={{ $post->title }}>
        </div>
        <div class="sentences">
            <p>本文</p>
            <textarea name="post[sentences]">{{ $post->sentences }}</textarea>
        </div>
        <div class="memorandum">
            <p>メモ</p>
            <textarea name="post[memorandum]">{{ $post->memorandum }}</textarea>
        </div>
        <input type="submit" value="保存">
        <a href="/saved/{{ $post->id }}">戻る</a>
    </form>
</x-app-layout>