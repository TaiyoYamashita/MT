<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">みんなの投稿</h2>
    </x-slot>
    <h5 name="post[title]">{{ $post->title }}</h5>
    <small>投稿者：{{ $post->user->name }}</small>
    <small>投稿日時：{{ $post->posted_at }}</small>
    <p name="post[sentences]">{{ $post->sentences }}</p>
    @if ($bool)
        <form action="/every/{{ $post->id }}/delete" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit">お気に入りから外す</button>
        </form>
    @else
        <form action="/every/{{ $post->id }}/favorite" method="POST">
            @csrf
            <button type="submit">お気に入りに登録する</button>
        </form>
    @endif
    <a href="/every/{{ $post->id }}/create">この投稿を基に文章を作成する</a>
    @if ($references !== null)
        <?php $cnt=0; ?>
        @foreach ($references as $reference)
            <a href="/every/{{ $post->id }}/{{ $reference->id }}">
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
    <a href="/everybody">戻る</a>
</x-app-layout>