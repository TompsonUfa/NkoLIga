<?php

namespace App\Http\Controllers;

use App\Services\NewsService;
use App\Services\AboutService;
use App\Services\TeamService;
use App\Services\ContactService;

class HomeController extends Controller
{
    public function index(
        NewsService    $newsService,
        AboutService   $aboutService,
        TeamService    $teamService,
        ContactService $contactService)
    {
        $news = $newsService->mainList();
        $abouts = $aboutService->getList(false, '', '');
        $team = $teamService->getList(false, '', '');
        $contact = $contactService->getContact();
        return response()->json(compact('news', 'abouts', 'team', 'contact'));
    }
}
