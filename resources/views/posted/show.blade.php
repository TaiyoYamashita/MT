<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">投稿した文章</h2>
    </x-slot>
    <h5>{{ $post->title }}</h5>
    <small>投稿日時：{{ $post->posted_at }}</small>
    <p>{{ $post->sentences }}</p>
    <p>メモ</p>
    <p>{{ $post->memorandum }}</p>
    <form action="/posted/{{ $post->id }}/save" method="POST">
        @csrf
        @method('PUT')
        <input type="submit" value="投稿を取り消す"/>
    </form>
    <a href="/posted">戻る</a>
</x-app-layout>