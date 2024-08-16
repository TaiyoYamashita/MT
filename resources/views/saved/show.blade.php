<x-app-layout>
    <link rel="stylesheet" href="/save.css">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">保存した文章</h2>
    </x-slot>
    <div class="background">
        <div class="container">
            <h1 class="title" name="post[title]">{{ $post->title }}</h1>
            <small class="date">編集日時：{{ $post->updated_at }}</small>
            <div class="clear"></div>
            <div class="paper">
                <div class="sentences">
                    <p name="post[sentences]">{{ $post->sentences }}</p>
                </div>
            </div>
            <p>【メモ】</p>
            <p class="memorandum">{{ $post->memorandum }}</p>
            <div class="buttons">
                <form action="/saved/{{ $post->id }}/post" method="POST">
                    @csrf
                    @method('PUT')
                    <button class="button post" type="submit">投稿する</button>
                </form>
                <a href="/saved/{{ $post->id }}/edit">
                    <div class="button edit">
                        <p class="edit-button">編集する</p>
                    </div>
                </a>
                <form action="/saved/{{ $post->id }}/delete" id="form_{{ $post->id }}" method="POST">
                    @csrf
                    @method("PUT")
                    <button class="button delete" type="button" onclick="deletePost({{ $post->id }})">削除する</button>
                </form>
                <a href="/saved">
                    <div class="button back">
                        <p class="back-button">戻る</p>
                    </div>
                </a>
                @if($bool)
                    <form action="/saved/{{ $post->id }}/example" method="POST">
                        @csrf
                        @method('PUT')
                        <button class="button post" type="submit">作成例として投稿する</button>
                    </form>
                @endif
                <div class="clear"></div>
            </div>
            
        </div>
    </div>
</x-app-layout>
    
<script>
    function deletePost(id)
    {
        'use strict'
        
        if (confirm('削除しますか？（削除すると復元することができません。）'))
        {
            document.getElementById(`form_${id}`).submit();
        }
    }
</script>