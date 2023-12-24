<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\News\StoreRequest;
use App\Http\Resources\NewsResource;
use App\Models\News;
use App\Services\NewsService;
use Illuminate\Http\Request;

class AdminNewsController extends Controller
{
    public function index(Request $request, NewsService $service)
    {
        $page = $request->input('page');

        $news = $service->getList(true, 10, $page);

        return NewsResource::collection($news);
    }

    public function show(News $news)
    {
        return new NewsResource($news);
    }

    public function store(StoreRequest $request, NewsService $service)
    {
        $title = $request->input('title');
        $desc = $request->input('desc');
        $content = $request->input('content');
        $image = $request->file('image');

        return $service->addNews($title, $desc, $content, $image);
    }

    public function update(News $news, Request $request, NewsService $service)
    {
        $title = $request->input('title');
        $desc = $request->input('desc');
        $content = $request->input('content');
        $image = $request->file('image');

        return $service->updateNews($news, $title, $desc, $content, $image);

    }

    public function destroy(News $news)
    {
        $news->delete();

        return response()->json(['success' => true, 'Запись удалена'], 200);
    }
}
