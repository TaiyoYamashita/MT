<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">検索</h2>
    </x-slot>
    <form action="/search" method="POST">
        @csrf
        @foreach ($tags as $tag)
            <input name="checkbox[{{ $tag->id }}]" type="checkbox" value="{{ $tag->tag }}">
            <p>{{ $tag->tag }}</p>
        @endforeach
        <input name="keyword" type="text" value="{{ old('keyword') }}">
        <button type="submit">検索する</button>
    </form>
</x-app-layout>