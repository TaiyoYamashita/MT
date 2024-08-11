<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">使用履歴</h2>
    </x-slot>
    <h5 name="post[title]">{{ $history->post->title }}</h5>
    <small>使用日時：{{ $history->used_at }}</small>
    <p name="post[sentences]">{{ $history->post->sentences }}</p>
    <a href="/history">戻る</a>
    <form action="/history/{{ $history->id }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit">使用履歴から消す</button>
    </form>
    <a href="/history/{{ $history->id }}/create">この投稿を基に文章を作成する</a>
</x-app-layout>