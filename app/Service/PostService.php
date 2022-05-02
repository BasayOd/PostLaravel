<?php

namespace App\Service;

use App\Models\Post;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PostService
{
    public function store($data)
    {
        try {
            Db::beginTransaction();

            $data['preview_image'] = Storage::disk('public')->put('/images', $data['preview_image']);
            $data['main_image'] = Storage::disk('public')->put('/images', $data['main_image']);

            if (array_key_exists('tag_ids', $data))
            {
                $tagIds = $data['tag_ids'];
                unset($data['tag_ids']);
                $post = Post::firstOrCreate($data);
                $post->tags()->attach($tagIds);
            } else {
                Post::firstOrCreate($data);
            }
            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            abort(500);
        }
    }

    public function update($data, $post)
    {
        try {
            DB::beginTransaction();

            if (array_key_exists('preview_image', $data)) {
                $data['preview_image'] = Storage::disk('public')->put('/images', $data['preview_image']);
            }
            if (array_key_exists('main_image', $data)) {
                $data['main_image'] = Storage::disk('public')->put('/images', $data['main_image']);
            }
            if (array_key_exists('tag_ids', $data)){

                $tagIds = $data['tag_ids'];
                unset($data['tag_ids']);
                $post->update($data);
                $post->tags()->sync($tagIds);
            } else {
                $post->update($data);
                $post->deletePostTags($post->id);
            }

            DB::commit();

        } catch (\mysql_xdevapi\Exception $exception) {
            DB::rollBack();
            abort(500);
        }
        return $post;
    }
}
