<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tag extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'tags';
    protected $guarded = false;

    public function articles()
    {
        return $this->belongsToMany(ArticlesTags::class, 'articles_tags', 'tag_id', 'art_id');
    }
}
