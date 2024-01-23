<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function upload(Request $request)
    {
        $image = $request->file('image');
        $path = $image->store('uploads', 'public');
        return '/' . $path;
    }
}
