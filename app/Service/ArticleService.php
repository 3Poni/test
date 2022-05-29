<?php

namespace App\Service;

use App\Models\Articles;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ArticleService
{
    public function store($data)
    {
        try {
            DB::beginTransaction();
            if( isset($data['tag_ids'])) {
                $tagIds = $data['tag_ids'];
                unset($data['tag_ids']);
            }
            $data['image'] = Storage::disk('public')->put('/images', $data['image']);
            $article = Articles::firstOrcreate($data);
            if( isset($tagIds)) {
                $article->tags()->attach($tagIds);
            }
            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            abort(500);
        }

    }

    public function update($data, $article)
    {
        try {
            DB::beginTransaction();
            if( isset($data['tag_ids'])) {
                $tagIds = $data['tag_ids'];
                unset($data['tag_ids']);
            } else {
                $tagIds = null;
                $article->tags()->sync($tagIds);
            }
            if (isset($data['image'])){
                $data['image'] = Storage::disk('public')->put('/images', $data['image']);
            }
            $article->update($data);
            if( isset($tagIds)) {
                $article->tags()->sync($tagIds);
            }
            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            abort(500);
        }
        return $article;
    }
}
