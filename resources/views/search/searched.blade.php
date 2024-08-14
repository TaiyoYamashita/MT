<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">検索</h2>
    </x-slot>
    <link rel="stylesheet" href="everybody.css">
    <div class="container">
        <?php $cnt=0; ?>
        @foreach ($results as $result)
            <a href="/search/{{ $result->id }}/show">
                <div class='post'>
                    <h2>{{ $result->title }}</h2>
                    <p>{{ $result->sentences }}</p>
                    <small>{{ $result->user->name }}</small>
                    <small>{{ $result->posted_at }}</small>
                </div>
            </a>
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
    </div>
</x-app-layout>