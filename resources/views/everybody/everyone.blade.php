<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">みんなの投稿</h2>
    </x-slot>
    <link rel="stylesheet" href="everybody.css">
    <div class="container">
        <?php $cnt=0; ?>
        @foreach ($all_posts as $post)
            <a href="/every/{{ $post->id }}">
                <div class='post'>
                    <h2>{{ \Illuminate\Support\Str::limit($post->title, 40) }}</h2>
                    <p>{{ \Illuminate\Support\Str::limit($post->sentences, 60) }}</p>
                </div>
                <small>{{ $post->user->name }}</small>
                <small>{{ $post->posted_at }}</small>
            </a>
            <?php ++$cnt ?>
            @if ($cnt==4)
                <div class="clear"></div>
                <?php $cnt=0 ?>
            @endif
        @endforeach
        <div class="clear"></div>
        <div class="paginate">
           {{ $all_posts->links() }}
        </div>
    </div>
</x-app-layout>