<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Team\StoreRequest;
use App\Http\Requests\Team\UpdateRequest;
use App\Http\Resources\TeamResource;
use App\Models\Team;
use App\Services\TeamService;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    public function index(Request $request, TeamService $service)
    {
        $page = $request->input('page');

        $team = $service->getList(true, 10, $page);

        return TeamResource::collection($team);
    }

    public function show(Team $team)
    {
        return new TeamResource($team);
    }

    public function store(StoreRequest $request, TeamService $service)
    {
        $title = $request->input('title');
        $desc = $request->input('desc');
        $image = $request->file('image');

        return $service->add($title, $desc, $image);
    }

    public function update(Team $team, UpdateRequest $request, TeamService $service)
    {
        $title = $request->input('title');
        $desc = $request->input('desc');
        $image = $request->file('image');

        return $service->update($team, $title, $desc, $image);

    }

    public function destroy(Team $team)
    {
        $team->delete();

        return response()->json(['success' => true, 'Запись удалена'], 200);
    }
}
