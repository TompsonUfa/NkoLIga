<?php

namespace App\Services;

use App\Models\Banner;
use Illuminate\Support\Facades\DB;

class BannerService
{
    public function getList($pagination, $perPage, $page)
    {

        $banners = Banner::query();

        if ($pagination) {
            return $banners->paginate($perPage, ['*'], 'page', $page);
        }

        return $banners->get();
    }

    public function addBanner($title, $desc, $image)
    {
        try {
            DB::beginTransaction();

            $path = $image->store('/uploads', 'public');

            $banner = new Banner();
            $banner->title = $title;
            $banner->desc = $desc;
            $banner->image = '/' . $path;
            $banner->save();

            DB::commit();

            return response()->json(['success' => true, 'message' => "Банер добавлен."], 200);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['errors' => $e->getMessage()], 500);
        }
    }

    public function update($banner, $title, $desc, $image)
    {
        try {
            DB::beginTransaction();

            $banner->title = $title;
            $banner->desc = $desc;

            if (!empty($image)) {
                $path = $image->store('/uploads', 'public');

                $banner->image = '/' . $path;
            }

            $banner->save();

            DB::commit();

            return response()->json(['success' => true, 'message' => "Банер обновлен."], 200);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['errors' => $e->getMessage()], 500);
        }
    }

}
