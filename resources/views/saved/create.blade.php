<x-app-layout>
    <x-slot name="header">
        新規文章の作成
    </x-slot>
    <form action="/saved" method="POST">
        @csrf
        <div class="title">
            <p>タイトル</p>
            <input type="text" name="post[title]">
        </div>
        <div class="sentences">
            <p>本文</p>
            <textarea name="post[sentences]"></textarea>
        </div>
        <div class="memorandum">
            <p>メモ</p>
            <textarea name="post[memorandum]"></textarea>
        </div>
        <input type="submit" value="保存">
    </form>
    <a href="/saved">戻る</a>
</x-app-layout>