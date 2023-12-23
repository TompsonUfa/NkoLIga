<?php

namespace App\Services;

use App\Models\About;
use Illuminate\Support\Facades\DB;

class AboutService
{
    public function getList($pagination, $perPage, $page)
    {
        $about = About::query();

        if ($pagination) {
            return $about->paginate($perPage, ['*'], 'page', $page);
        }

        return $about->get();
    }

    public function add($title, $image)
    {
        try {
            DB::beginTransaction();

            $path = $image->store('/uploads', 'public');

            $about = new About();
            $about->title = $title;
            $about->image = '/' . $path;
            $about->save();

            DB::commit();

            return response()->json(['success' => true, 'message' => "Запись добавлена."], 200);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['errors' => $e->getMessage()], 500);
        }
    }

    public function update($about, $title, $image)
    {
            try {
                DB::beginTransaction();

                $about->title = $title;

                if(!empty($image)){
                    $path = $image->store('/uploads', 'public');

                    $about->image = '/' . $path;
                }

                $about->save();

                DB::commit();

                return response()->json(['success' => true, 'message' => "Запись обновлена."], 200);
            } catch (\Exception $e) {
                DB::rollBack();
                return response()->json(['errors' => $e->getMessage()], 500);
            }
        }

}
