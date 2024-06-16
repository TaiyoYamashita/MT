<x-app-layout>
    <x-slot name="header">
        みんなの投稿
    </x-slot>
    <h5 name="post[title]">{{ $post->title }}</h5>
    <small>投稿日時：{{ $post->posted_at }}</small>
    <p name="post[sentences]">{{ $post->sentences }}</p>
    <a href="/everybody">戻る</a>
    <form action="/every/copy">
        <a href="/every/{{ $post->id }}/create">この投稿を基に文章を作成する</a>
    </form>
</x-app-layout>