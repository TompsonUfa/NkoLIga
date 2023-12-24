<?php

namespace App\Services;

use App\Models\News;
use Illuminate\Support\Facades\DB;

class NewsService
{
    public function mainList()
    {
        return News::latest()->take(4)->get();
    }

    public function getList($pagination, $perPage, $page)
    {
        $news = News::query();

        if ($pagination) {
            return $news->paginate($perPage, ['*'], 'page', $page);
        }

        return $news->get();
    }

    public function getPopular($count)
    {
        return News::orderBy('views', 'desc')->take($count)->get();
    }

    public function addNews($title, $desc, $content, $image)
    {
        try {
            DB::beginTransaction();

            $path = $image->store('/uploads', 'public');

            $news = new News();
            $news->title = $title;
            $news->desc = $desc;
            $news->content = $content;
            $news->image = '/' . $path;
            $news->save();

            DB::commit();

            return response()->json(['success' => true, 'message' => "Новость добавлена."], 200);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['errors' => $e->getMessage()], 500);
        }
    }

    public function updateNews($news, $title, $desc, $content, $image)
    {
        try {
            DB::beginTransaction();

            $news->title = $title;
            $news->desc = $desc;
            $news->content = $content;

            if (!empty($image)) {
                $path = $image->store('/uploads', 'public');

                $news->image = '/' . $path;
            }

            $news->save();

            DB::commit();

            return response()->json(['success' => true, 'message' => "Новость обновлена."], 200);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['errors' => $e->getMessage()], 500);
        }
    }

}
