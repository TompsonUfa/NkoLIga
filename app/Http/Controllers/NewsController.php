<?php

namespace App\Http\Controllers;

use App\Http\Resources\NewsResource;
use App\Models\News;
use App\Services\NewsService;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index(Request $request, NewsService $service)
    {
        $page = $request->input('page');

        $news = $service->getList(true, 5, $page);

        return NewsResource::collection($news);
    }

    public function popular(NewsService $service)
    {
        $popularNews = $service->getPopular(4);

        return NewsResource::collection($popularNews);
    }

    public function show(News $news)
    {
        return new NewsResource($news);
    }
}
