<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">投稿した文章</h2>
    </x-slot>
    @foreach($own_posts as $post)
        <a href="/posted/{{ $post->id }}"><h4>{{ $post->title }}</h4></a>
        <p>{{ $post->sentences }}</p>
        <small>{{ $post->posted_at }}</small>
    @endforeach
    <div class="paginate">
        {{ $own_posts->links() }}
    </div>
</x-app-layout>