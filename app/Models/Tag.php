<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Tag extends Model
{
    use HasFactory;
    
    public $timestamps = false;
    
    public function posts ()
    {
        return $this::belongsToMany(Post::class, 'posts_tags', 'tag_id', 'post_id');
    }
    
    public function display ()
    {
        return $this::all();
    }
    
    public function getTags (int $postId)
    {
        $tagIds = DB::table('posts_tags')->where('post_id', $postId)->pluck('tag_id');
        if ($tagIds->isEmpty())
        {
            return null;
        }
        else
        {
            return DB::table('tags')->whereIn('id', $tagIds)->get();
        }
    }
    
    // 検索
    public function search ($tags, $keyword, int $limit = 1)
    {
        $results = Post::where('private_or_public', 2);
        if ($tags !== null) // タグによる抽出
        {
            $filterTaggedId = collect();
            
            // posts_tagsテーブルにおいて、tag_idの値が抽出したいタグのidと一致するタプルを全て抽出する。
            // 抽出したら、post_idの情報のみ必要になるため、tag_idの情報は保存しない。
            foreach ($tags as $tagId => $tag)
            {
                $filter = DB::table('posts_tags')->where('tag_id', $tagId)->pluck('post_id');
                $filterTaggedId = $filterTaggedId->merge($filter);
            }
            
            // 存在するタプルの数と指定されたタグの数を比較することで、選択されたタグがすべて付けられた投稿であるかを判断する。
            $countById = $filterTaggedId->countBy();
            $matchingPostIds = $countById->filter(function ($count) use ($tags) {
                return $count === count($tags);
            })->keys();
            $results = $results->whereIn('id', $matchingPostIds);
        }
        if ($keyword !== null)  // 検索ワードによる抽出
        {
            $results = $results->where(function($result) use ($keyword) {
                $result->where('title', 'like', '%' . $keyword . '%')->orWhere('sentences', 'like', '%' . $keyword . '%');
            });
        }
        return $results->orderBy('posted_at')->paginate($limit);
    }
    
    public function insertIntoPostsTags (Post $post, int $tag)
    {
        DB::table('posts_tags')->insert([
            'post_id' => $post->id,
            'tag_id' => $tag,
        ]);
    }
    
    public function deleteFromPostsTags (Post $post)
    {
        DB::table('posts_tags')->where('post_id', $post->id)->delete();
    }
}
