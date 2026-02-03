<?php

namespace App\Http\Controllers;

use App\Models\ArticlesNews;

use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function show($slug)
    {
        $news = ArticlesNews::where('slug', $slug)->first();
        $sideArticles = ArticlesNews::orderBy('created_at', 'desc')->get()->take(4);
        return view('pages.news.show', compact('news', 'sideArticles'));
    }
}
