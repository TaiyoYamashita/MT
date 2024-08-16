<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">ホーム</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg" style="margin-bottom: 40px">
                <div class="p-6 text-gray-900">
                    <div class="home saved">
                        <h2>みんなの投稿</h2>
                        @if (count($all_posts) > 0)
                            @foreach ($all_posts as $post)
                                <a href="/every/{{ $post->id }}">
                                    <div class="saves">
                                        <p>{{ \Illuminate\Support\Str::limit($post->title, 40) }}</p>
                                        <p>{{ \Illuminate\Support\Str::limit($post->sentences, 60) }}</p>
                                    </div>
                                </a>
                                <small>{{ $post->user->name }}</small>
                                <small>投稿日：{{ $post->posted_at }}</small>
                            @endforeach
                        @else
                            <p>投稿された文章がありません</p>
                        @endif
                    </div>
                </div>
            </div>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg" style="margin-bottom: 40px">
                <div class="p-6 text-gray-900">
                    <div class="home saved">
                        <h2>保存中の文章</h2>
                        @if (count($saves) > 0)
                            @foreach ($saves as $save)
                                <a href="/saved/{{ $save->id }}">
                                    <div class="saves">
                                        <p>{{ \Illuminate\Support\Str::limit($save->title, 40) }}</p>
                                        <p>{{ \Illuminate\Support\Str::limit($save->sentences, 60) }}</p>
                                    </div>
                                </a>
                                <small>編集日：{{ $save->updated_at }}</small>
                            @endforeach
                        @else
                            <p>保存中の文章がありません</p>
                        @endif
                    </div>
                </div>
            </div>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg" style="margin-bottom: 40px">
                <div class="p-6 text-gray-900">
                    <div class="home posted">
                        <h2>投稿した文章</h2>
                        @if (count($posts) > 0)
                            @foreach ($posts as $post)
                                <a href="/posted/{{ $post->id }}">
                                    <div class="saves">
                                        <p>{{ \Illuminate\Support\Str::limit($post->title, 40) }}</p>
                                        <p>{{ \Illuminate\Support\Str::limit($post->sentences, 60) }}</p>
                                    </div>
                                </a>
                                <small>投稿日：{{ $post->updated_at }}</small>
                            @endforeach
                        @else
                            <p>投稿した文章がありません</p>
                        @endif
                    </div>
                </div>
            </div>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg" style="margin-bottom: 40px">
                <div class="p-6 text-gray-900">
                    <div class"home history">
                        <h2>使用履歴</h2>
                        @if (count($histories) > 0)
                            @foreach ($histories as $history)
                                <a href="/history/{{ $history->id }}">
                                    <div class="saves">
                                        <p>{{ \Illuminate\Support\Str::limit($history->post->title, 40) }}</p>
                                        <p>{{ \Illuminate\Support\Str::limit($history->post->sentences, 60) }}</p>
                                    </div>
                                </a>
                                <small>投稿者：{{ $history->post->user->name }}</small>
                                <small>使用日：{{ $history->used_at }}</small>
                            @endforeach
                        @else
                            <p>使用履歴がありません</p>
                        @endif
                    </div>
                </div>
            </div>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="home favorites">
                        <h2>お気に入り</h2>
                        @if (count($favorites) > 0)
                            @foreach ($favorites as $favorite)
                                <a href="/favorite/{{ $favorite->id }}">
                                    <div class="saves">
                                        <p>{{ \Illuminate\Support\Str::limit($favorite->post->title, 40) }}</p>
                                        <p>{{ \Illuminate\Support\Str::limit($favorite->post->sentences, 60) }}</p>
                                    </div>
                                </a>
                                <small>投稿者：{{ $favorite->post->user->name }}</small>
                                <small>登録日：{{ $favorite->saved_at }}</small>
                            @endforeach
                        @else
                            <p>お気に入り登録した文章がありません</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
