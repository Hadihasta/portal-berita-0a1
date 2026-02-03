<?php

namespace App\Http\Controllers;

use App\Models\ArticlesNews;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function index()
    {
        $articleBanners = ArticlesNews::all();
        $featureds = ArticlesNews::where('is_featured', true)->get();
        // ambil yang terbaru limit 4
        $news = ArticlesNews::orderBy('created_at', 'desc')->get()->take(4);
        $newsDownList = ArticlesNews::orderBy('created_at', 'desc')->get()->take(20);
        return view('pages.landing', compact('articleBanners', 'featureds', 'news', 'newsDownList'));
    }
}
