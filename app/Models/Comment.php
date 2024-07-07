<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'post_id',
        'body',
    ];

    // $coomment->postでコメントに紐づく投稿を取得できるようにする
    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}
