<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">みんなの投稿</h2>
    </x-slot>
    <h5 name="post[title]">{{ $post->title }}</h5>
    <small>投稿日時：{{ $post->posted_at }}</small>
    <p name="post[sentences]">{{ $post->sentences }}</p>
    <a href="/everybody">戻る</a>
    <form action="/every/{{ $post->id }}/favorite" method="POST">
        @csrf
        <button type="submit">お気に入りに登録する</button>
    </form>
    <!--<form action="/every/copy">-->
        <a href="/every/{{ $post->id }}/create">この投稿を基に文章を作成する</a>
    <!--</form>-->
</x-app-layout>