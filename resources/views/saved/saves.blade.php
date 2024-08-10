<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">保存した文章</h2>
        <a href="#" style="float:right; padding-right:20px;">sort</a>
    </x-slot>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
        <a href="/saved/create">新規作成</a>
        @foreach($own_posts as $post)
            <a href="/saved/{{ $post->id }}">
                <div class="element">
                    <h5>{{ $post->title }}</h5>
                    <p>{{ $post->sentences }}</p>
                </div>
            </a>
        @endforeach
    </div>
    <div class="paginate">
        {{ $own_posts->links() }}
    </div>
</x-app-layout>