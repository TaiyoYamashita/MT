<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>MT</title>
        <link href="https://fonts.googleapis.com/css?family=nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <div class="content">
            <?php $cnt=0; ?>
            @foreach ($posts as $post)
                @if ($cnt==0)
                    <div class='post' style="float: left">
                    <?php $cnt=1; ?>
                @else
                    <div class='post'>
                    <?php $cnt=0; ?>
                @endif
                    <h2>{{ $post->title }}</h2>
                    <p>{{ $post->name }}</p>
                    <p>{{ $post->saved_or_posted_at }}</p>
                </div>
            @endforeach
        </div>
        </div>
    </body>
</html>