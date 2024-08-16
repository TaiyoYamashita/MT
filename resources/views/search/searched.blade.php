<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight" style="float:left">検索　　</h2>
        @if ($keytags !== null)
            <p style="float:left;">選択タグ：</p>
            @foreach ($keytags as $id => $keytag)
                <p style="float:left;">{{ $keytag }}　</p>
            @endforeach
        @endif
        @if ($keyword !== null)
            <p>検索ワード：{{ $keyword }}</p>
        @endif
        <div style="clear:left;"></div>
    </x-slot>
    <link rel="stylesheet" href="everybody.css">
    <div class="container">
        @if (count($results) === 0)
            <p>条件に合致する文章が見つかりませんでした</p>
        @else
            <?php $cnt=0; ?>
            @foreach ($results as $result)
                @if ($keytags !== null)
                    <a href="/search/{{ $result->id }}?tags={{ urlencode(json_encode($keytags)) }}&keyword={{ urlencode($keyword) }}">
                @else
                    <a href="/search/{{ $result->id }}?keyword={{ urlencode($keyword) }}">
                @endif
                    <div class='post'>
                        <h2>{{ \Illuminate\Support\Str::limit($result->title, 40) }}</h2>
                        <p>{{ \Illuminate\Support\Str::limit($result->sentences, 60) }}</p>
                    </div>
                </a>
                <small>{{ $result->user->name }}</small>
                <small>{{ $result->posted_at }}</small>
                <?php ++$cnt ?>
                @if ($cnt==4)
                    <div class="clear"></div>
                    <?php $cnt=0 ?>
                @endif
            @endforeach
            <div class="clear"></div>
            <div class="paginate">
               {{ $results->links() }}
            </div>
        @endif
        <a href="/search">条件を変更する</a>
    </div>
</x-app-layout>