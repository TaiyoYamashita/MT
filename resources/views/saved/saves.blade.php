<x-app-layout>
    <x-slot name="header">
        保存した文章
        <a href="#" style="float:right; padding-right:20px;">sort</a>
    </x-slot>
    <a href="/saved/create">新規作成</a>
    @foreach($own_posts as $post)
        <div class="element">
            <a href="/saved/{{ $post->id }}"><h5>{{ $post->title }}</h5></a>
            <p>{{ $post->sentences }}</p>
        </div>
    @endforeach
    <div class="paginate">
        {{ $own_posts->links() }}
    </div>
</x-app-layout>