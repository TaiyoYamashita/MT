<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">使用履歴</h2>
    </x-slot>
    <link rel="stylesheet" href="everybody.css">
    <div class="container">
        @if (count($histories) == 0)
            <h1>使用履歴がありません</h1>
        @else
            <?php $cnt=0; ?>
            @foreach ($histories as $history)
                <a href="/history/{{ $history->id }}">
                    <div class='post'>
                        <h2>{{ $history->post->title }}</h2>
                        <p>{{ $history->post->sentences }}</p>
                        <small>{{ $history->post->user->name }}</small>
                        <small>{{ $history->post->posted_at }}</small>
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
           {{ $histories->links() }}
        </div>
    </div>
</x-app-layout>