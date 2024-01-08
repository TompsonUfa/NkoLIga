<?php

namespace App\Http\Controllers;

use App\Services\NewsService;
use App\Services\AboutService;
use App\Services\TeamService;
use App\Services\ContactService;
use App\Services\BannerService;

class HomeController extends Controller
{
    public function index(
        BannerService  $bannerService,
        NewsService    $newsService,
        AboutService   $aboutService,
        TeamService    $teamService,
        ContactService $contactService)
    {
        $bannersToMainScreen = $bannerService->getList(false, null, null);
        $newsToMainScreen = $newsService->getListForMain();

        $bannersToMainScreenArray = json_decode(json_encode($bannersToMainScreen), true);
        $newsToMainScreenArray = json_decode(json_encode($newsToMainScreen), true);

        $banners = array_merge($bannersToMainScreenArray, $newsToMainScreenArray);
        $news = $newsService->mainList();
        $abouts = $aboutService->getList(false, '', '');
        $team = $teamService->getList(false, '', '');
        $contact = $contactService->getContact();
        return response()->json(compact('news', 'abouts', 'team', 'contact', 'banners'));
    }
}
