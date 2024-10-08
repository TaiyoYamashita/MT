<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight" style="float:left">検索　　</h2>
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
    <small>投稿者：{{ $post->user->name }}</small>
    <small>投稿日時：{{ $post->posted_at }}</small>
    <h5 name="post[title]">{{ $post->title }}</h5>
    <p name="post[sentences]">{{ $post->sentences }}</p>
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
    @if ($keytags !== null)
        <a href="/search/{{ $post->id }}/create?tags={{ urlencode(json_encode($keytags)) }}&keyword={{ urlencode($keyword) }}">この投稿を基に文章を作成する</a>
    @else
        <a href="/search/{{ $post->id }}/create?keyword={{ urlencode($keyword) }}">この投稿を基に文章を作成する</a>
    @endif
    @if ($references !== null)
        <?php $cnt=0; ?>
        @foreach ($references as $reference)
            <a href="/search/{{ $post->id }}/{{ $reference->id }}">
                <div class='post'>
                    <h2>{{ $reference->title }}</h2>
                    <p>{{ $reference->sentences }}</p>
                    <small>{{ $reference->name }}</small>
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
    @if ($keytags !== null)
        <a href="/search2?tags={{ urlencode(json_encode($keytags)) }}&keyword={{ urlencode($keyword) }}">戻る</a>
    @else
        <a href="/search2?keyword={{ urlencode($keyword) }}">戻る</a>
    @endif
</x-app-layout>