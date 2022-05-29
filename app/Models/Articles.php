<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Articles extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'articles';
    protected $guarded = false;

    protected $withCount = ['likedUsers'];

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'articles_tags', 'art_id', 'tag_id');
    }
        public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
    public function comments()
    {
        return $this->hasMany(Comment::class, 'article_id', 'id');
    }
    public function likedUsers()
    {
        return $this->belongsToMany(User::class, 'article_user_likes', 'article_id', 'user_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
