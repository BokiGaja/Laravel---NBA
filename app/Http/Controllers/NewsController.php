<?php

namespace App\Http\Controllers;

use App\News;
use App\User;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        // Eager loading
        $news = News::with('user')->paginate(10);
        return view('news.index', ['news' => $news]);
    }

    public function show($id)
    {
        $news = News::findOrFail($id);
        return view('news.show', ['news' => $news]);
    }
}
