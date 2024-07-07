<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// デフォルトでpostsテーブルを参照してくれる！すごい！
class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        "title",
        "body"
    ];

    // $post->commentsでコメントを取得できるようにする
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
