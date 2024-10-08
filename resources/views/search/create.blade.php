<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">新規文章の作成　</h2>
        @if ($keytags !== null)
            <p style="float:left;">選択タグ：</p>
            @foreach ($keytags as $keytag)
                <p style="float:left;">{{ $keytag }}　</p>
            @endforeach
        @endif
        @if ($keyword !== null)
            <p>検索ワード：{{ $keyword }}</p>
        @endif
        <div style="clear:left;"></div>
    </x-slot>
    <form action="/every/{{ $post->id }}/store" method="POST">
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
        @foreach ($tags as $tag)
            <input name="checkbox[{{ $tag->id }}]" type="checkbox" value="{{ $tag->tag }}">
            <p>{{ $tag->tag }}</p>
        @endforeach
        <input type="submit" value="保存">
    </form>
    @if ($keytags !== null)
        <a href="/search/{{ $post->id }}?tags={{ urlencode(json_encode($keytags)) }}&keyword={{ urlencode($keyword) }}">戻る</a>
    @else
        <a href="/search/{{ $post->id }}?keyword={{ urlencode($keyword) }}">戻る</a>
    @endif
</x-app-layout>