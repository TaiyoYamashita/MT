@extends('template')

@section('var')
    投稿した文章
@endsection

@section('contents')
    @foreach($own_posts as $post)
        <a href="/posted/{{ $post->id }}"><h4>{{ $post->title }}</h4></a>
        <p>{{ $post->sentences }}</p>
    @endforeach
    <div class="paginate">
        {{ $own_posts->links() }}
    </div>
@endsection