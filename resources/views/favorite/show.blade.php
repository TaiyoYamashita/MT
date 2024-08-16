<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">お気に入り</h2>
    </x-slot>
    @if (count($tags) > 0)
        @foreach ($tags as $tag)
            <p>{{ $tag->tag }}</p>
        @endforeach
    @endif
    <small>投稿者：{{ $post->user->name }}</small>
    <small>登録日時：{{ $post->saved_at }}</small>
    <h5 name="post[title]">{{ $post->post->title }}</h5>
    <p name="post[sentences]">{{ $post->post->sentences }}</p>
    <a href="/favorite">戻る</a>
    <form action="/favorite/{{ $post->id }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit">お気に入りから外す</button>
    </form>
    <a href="/favorite/{{ $post->id }}/create">この投稿を基に文章を作成する</a>
</x-app-layout>