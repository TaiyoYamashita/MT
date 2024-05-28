@extends('template')

@section('var')
    投稿した文章
@endsection

@section('contents')
    @foreach($own_posts as $post)
        <h4>{{ $post->title }}</h4>
        <p>{{ $post->sentences }}</p>
    @endforeach
    <div class="paginate">
        {{ $own_posts->links() }}
    </div>
@endsection