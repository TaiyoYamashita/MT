@extends('template')

@section('var')
    保存した文章
@endsection

@section('contents')
    <a href="/create">新規作成</a>
    @foreach($own_posts as $post)
        <h4>{{ $post->title }}</h4>
        <p>{{ $post->sentences }}</p>
    @endforeach
    <div class="paginate">
        {{ $own_posts->links() }}
    </div>
@endsection