<x-app-layout>
    <x-slot name="header">
        プロフィール
    </x-slot>
    <p>ユーザー名：{{ $user->name }}</p>
    <p>メールアドレス：{{ $user->email }}</p>
    <p>保存中の文章の数：{{ $user_info->countSaves() }}</p>
    <p>投稿した文章の数：{{ $user_info->countPosts() }}</p>
    <p>お気に入り登録した文章の数：{{ $user_info->countFavorites() }}</p>
    <a href="/profile/edit">編集する</a>
    <!--
    <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
        <div class="max-w-xl">-->
            @include('profile.partials.delete-user-form')<!--
        </div>
    </div>-->
</x-app-layout>