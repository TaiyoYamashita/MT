<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">お気に入り</h2>
    </x-slot>
    <link rel="stylesheet" href="everybody.css">
    <div class="container">
        @if (count($favorites) > 0)
            <?php $cnt=0; ?>
            @foreach ($favorites as $favorite)
                <a href="/favorite/{{ $favorite->id }}">
                    <div class='post'>
                        <h2>{{ \Illuminate\Support\Str::limit($favorite->post->title, 40) }}</h2>
                        <p>{{ \Illuminate\Support\Str::limit($favorite->post->sentences, 60) }}</p>
                    </div>
                </a>
                <small>{{ $favorite->post->user->name }}</small>
                <small>{{ $favorite->saved_at }}</small>
                <?php ++$cnt ?>
                @if ($cnt==4)
                    <div class="clear"></div>
                    <?php $cnt=0 ?>
                @endif
            @endforeach
        @else
            <h1>お気に入り登録した文章がありません</h1>
        @endif
        <div class="clear"></div>
        <div class="paginate">
           {{ $favorites->links() }}
        </div>
    </div>
</x-app-layout>