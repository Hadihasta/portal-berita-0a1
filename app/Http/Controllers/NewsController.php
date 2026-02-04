<?php

namespace App\Http\Controllers;

use App\Models\ArticlesNews;
use App\Models\Categories;
use Illuminate\Http\Request;


class NewsController extends Controller
{

    public function index()
    {
        $news = ArticlesNews::paginate(10);

        return view('pages.news.index', compact('news'));
    }


    public function show($slug)
    {
        $news = ArticlesNews::where('slug', $slug)->first();
        $sideArticles = ArticlesNews::orderBy('created_at', 'desc')->get()->take(4);
        return view('pages.news.show', compact('news', 'sideArticles'));
    }


    public function category($slug)
    {
        $category = Categories::where('slug', $slug)->first();
        return view('pages.news.category', compact('category'));
    }
}
