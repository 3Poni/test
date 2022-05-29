<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArticlesTags extends Model
{
    use HasFactory;

    protected $table = 'articles_tags';
    protected $guarded = false;

    public function articles()
    {
        return $this->hasMany(Articles::class, 'articles_tags', 'id', 'art_id');
    }

    public function tags()
    {
        return $this->hasMany(Tag::class, 'articles_tags', 'id', 'tag_id');
    }
}
