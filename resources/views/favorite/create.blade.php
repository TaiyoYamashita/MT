<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">新規文章の作成</h2>
    </x-slot>
    <form action="/favorite/{{ $post->id }}/saved" method="POST">
        @csrf
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
            <textarea name="post[memorandum]"></textarea>
        </div>
        <input type="submit" value="保存">
    </form>
    <a href="/favorite/{{ $favorite->id }}">戻る</a>
</x-app-layout>