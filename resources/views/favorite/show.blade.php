<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">お気に入り</h2>
    </x-slot>
    <h5 name="post[title]">{{ $post->post->title }}</h5>
    <small>登録日時：{{ $post->saveed_at }}</small>
    <p name="post[sentences]">{{ $post->post->sentences }}</p>
    <a href="/favorite">戻る</a>
    <form action="/favorite/{{ $post->id }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit">お気に入りから外す</button>
    </form>
    <!--<form action="/fovorite/copy">-->
        <a href="/favorite/{{ $post->id }}/create">この投稿を基に文章を作成する</a>
    <!--</form>-->
</x-app-layout>