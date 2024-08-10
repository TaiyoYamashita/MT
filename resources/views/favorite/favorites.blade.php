<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">お気に入り</h2>
    </x-slot>
    <link rel="stylesheet" href="everybody.css">
    <div class="container">
        @if (count($favorites) == 0)
            <h1>お気に入り登録した文章がありません</h1>
        @else
            <?php $cnt=0; ?>
            @foreach ($favorites as $favorite)
                <a href="/favorite/{{ $favorite->id }}">
                    <div class='post'>
                        <h2>{{ $favorite->post->title }}</h2>
                        <p>{{ $favorite->post->sentences }}</p>
                        <small>{{ $favorite->post->user->name }}</small>
                        <small>{{ $favorite->post->posted_at }}</small>
                    </div>
                </a>
                <?php ++$cnt ?>
                @if ($cnt==4)
                    <div class="clear"></div>
                    <?php $cnt=0 ?>
                @endif
            @endforeach
        @endif
        <div class="clear"></div>
        <div class="paginate">
           {{ $favorites->links() }}
        </div>
    </div>
</x-app-layout>