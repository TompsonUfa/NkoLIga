<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;

class NewsController extends Controller
{
    public function index()
    {
        return view('admin.news.index');
    }
    public function create()
    {
        return view('admin.news.create');
    }
}
