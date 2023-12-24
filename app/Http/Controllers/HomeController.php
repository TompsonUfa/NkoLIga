<?php

namespace App\Http\Controllers;

use App\Services\NewsService;
use App\Services\AboutService;
use App\Services\TeamService;

class HomeController extends Controller
{
    public function index(NewsService $newsService, AboutService $aboutService, TeamService $teamService)
    {
        $news = $newsService->mainList();
        $abouts = $aboutService->getList(false, '', '');
        $team = $teamService->getList(false, '', '');
        return response()->json(compact('news', 'abouts', 'team'));
    }
}
