<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Banner\StoreRequest;
use App\Http\Resources\BannerResource;
use App\Models\Banner;
use App\Services\BannerService;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    public function index(Request $request, BannerService $service)
    {

        $page = $request->input('page');

        $banners = $service->getList(true, 10, $page);

        return BannerResource::collection($banners);
    }

    public function show(Banner $banner)
    {
        return new BannerResource($banner);
    }

    public function store(StoreRequest $request, BannerService $service)
    {

        $title = $request->input('title');
        $desc = $request->input('desc');
        $image = $request->file('image');

        return $service->addBanner($title, $desc, $image);
    }

    public function update(Banner $banner, Request $request, BannerService $service)
    {
        $title = $request->input('title');
        $desc = $request->input('desc');
        $image = $request->file('image');

        return $service->update($banner, $title, $desc, $image);

    }

    public function destroy(Banner $banner)
    {
        $banner->delete();

        return response()->json(['success' => true, 'Запись удалена'], 200);
    }
}
