<?php

namespace App\Http\Controllers\Admin;

use App\Models\About;
use App\Http\Controllers\Controller;
use App\Services\AboutService;
use Illuminate\Http\Request;
use App\Http\Requests\About\StoreRequest;
use App\Http\Requests\About\UpdateRequest;
use App\Http\Resources\AboutResource;

class AboutController extends Controller
{
    public function index(Request $request, AboutService $service)
    {
        $page = $request->input('page');

        $news = $service->getList(true, 10, $page);

        return AboutResource::collection($news);
    }

    public function show(About $about)
    {
        return new AboutResource($about);
    }

    public function store(StoreRequest $request, AboutService $service)
    {
        $title = $request->input('title');
        $desc = $request->input('desc');
        $image = $request->file('image');

        return $service->add($title,$desc, $image);
    }

    public function update(About $about, UpdateRequest $request, AboutService $service)
    {
        $title = $request->input('title');
        $desc = $request->input('desc');
        $image = $request->file('image');

        return $service->update($about, $title, $desc, $image);

    }

    public function destroy(About $about)
    {
        $about->delete();

        return response()->json(['success' => true, 'Запись удалена'], 200);
    }
}
