<x-app-layout>
    <x-slot name="header">
        プロフィール
    </x-slot>
    <a href="/profile/edit">編集する</a>
    <p>お気に入り登録した文章の数：{{ $favorites->count() }}</p>
    @foreach($favorites as $favorite)
    <p>{{ $favorite->id }}</p>
    @endforeach
    <!--
    <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
        <div class="max-w-xl">-->
            @include('profile.partials.delete-user-form')<!--
        </div>
    </div>-->
</x-app-layout>