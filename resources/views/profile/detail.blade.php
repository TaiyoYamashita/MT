<x-app-layout>
    <x-slot name="header">
        プロフィール
    </x-slot>
    <a href="/profile/edit">編集する</a>
    <!--
    <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
        <div class="max-w-xl">-->
            @include('profile.partials.delete-user-form')<!--
        </div>
    </div>-->
</x-app-layout>