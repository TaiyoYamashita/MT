<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">検索　　</h2>
        @if ($tags !== null)
            <p style="float:left;">選択タグ：</p>
            @foreach ($tags as $tag)
                <p style="float:left;">{{ $tag }}　</p>
            @endforeach
        @endif
        @if ($keyword !== null)
            <p>検索ワード：{{ $keyword }}</p>
        @endif
        <div style="clear:left;"></div>
    </x-slot>
    <h5 name="post[title]">{{ $post->title }}</h5>
    <small>投稿日時：{{ $post->posted_at }}</small>
    <p name="post[sentences]">{{ $post->sentences }}</p>
    @if ($tags !== null)
        <a href="/search2?tags={{ urlencode(implode(',', $tags)) }}&keyword={{ urlencode($keyword) }}">戻る</a>
    @else
        <a href="/search2?keyword={{ urlencode($keyword) }}">戻る</a>
    @endif
    @if ($bool)
        <form action="/search/{{ $post->id }}/delete" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit">お気に入りから外す</button>
        </form>
    @else
        <form action="/search/{{ $post->id }}/favorite" method="POST">
            @csrf
            <button type="submit">お気に入りに登録する</button>
        </form>
    @endif
    <a href="/search/{{ $post->id }}/create">この投稿を基に文章を作成する</a>
    @if ($references !== null)
        <?php $cnt=0; ?>
        @foreach ($references as $reference)
            <a href="/search/{{ $post->id }}/{{ $reference->id }}">
                <div class='post'>
                    <h2>{{ $reference->title }}</h2>
                    <p>{{ $reference->sentences }}</p>
                    <small>{{ $reference->user->name }}</small>
                    <small>{{ $reference->posted_at }}</small>
                </div>
            </a>
            <?php ++$cnt ?>
            @if ($cnt==4)
                <div class="clear"></div>
                <?php $cnt=0 ?>
            @endif
        @endforeach
    @endif
</x-app-layout>