<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">検索</h2>
    </x-slot>
    <link rel="stylesheet" href="everybody.css">
    <div class="container">
        @if($results === null)
            <p>条件に合致する文章が見つかりませんでした</p>
            <a href="/search">条件を変更する</a>
        @else
            <?php $cnt=0; ?>
            @foreach ($results as $result)
                <a href="/search/{{ $result->id }}/show">
                    <div class='post'>
                        <h2>{{ \Illuminate\Support\Str::limit($result->sentences, 40) }}</h2>
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
    </div>
</x-app-layout>