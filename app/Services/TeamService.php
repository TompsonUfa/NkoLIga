<?php

namespace App\Services;

use App\Models\Team;
use Illuminate\Support\Facades\DB;

class TeamService
{
    public function getList($pagination, $perPage, $page)
    {
        $team = Team::query();

        if ($pagination) {
            return $team->paginate($perPage, ['*'], 'page', $page);
        }

        return $team->get();
    }

    public function add($title, $desc, $image)
    {
        try {
            DB::beginTransaction();

            $path = $image->store('/uploads', 'public');

            $team = new Team();
            $team->title = $title;
            $team->desc = $desc;
            $team->image = '/' . $path;
            $team->save();

            DB::commit();

            return response()->json(['success' => true, 'message' => "Запись добавлена."], 200);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['errors' => $e->getMessage()], 500);
        }
    }

    public function update($team, $title, $desc, $image)
    {
            try {
                DB::beginTransaction();

                $team->title = $title;
                $team->desc = $desc;

                if(!empty($image)){
                    $path = $image->store('/uploads', 'public');

                    $team->image = '/' . $path;
                }

                $team->save();

                DB::commit();

                return response()->json(['success' => true, 'message' => "Запись обновлена."], 200);
            } catch (\Exception $e) {
                DB::rollBack();
                return response()->json(['errors' => $e->getMessage()], 500);
            }
        }

}
