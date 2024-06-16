<x-app-layout>
    <x-slot name="header">
        投稿した文章
    </x-slot>
    @foreach($own_posts as $post)
        <a href="/posted/{{ $post->id }}"><h4>{{ $post->title }}</h4></a>
        <p>{{ $post->sentences }}</p>
    @endforeach
    <div class="paginate">
        {{ $own_posts->links() }}
    </div>
</x-app-layout>