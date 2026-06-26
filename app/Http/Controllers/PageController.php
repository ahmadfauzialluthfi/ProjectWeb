<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use App\Models\Menu;
use App\Models\Profile;

class PageController extends Controller
{
    public function home()
    {
        $profile = Profile::latest()->first();
        $categories = Category::with('menus')->get();
        $products = Menu::with('category')->latest()->get();
        $articles = Article::where('status', 'published')->latest()->take(3)->get();
        return view('home', compact('profile', 'categories', 'products', 'articles'));
    }

    public function about()
    {
        $profile = Profile::latest()->first();
        return view('about', compact('profile'));
    }

    public function contact()
    {
        $profile = Profile::latest()->first();
        return view('contact', compact('profile'));
    }

    public function news()
    {
        $articles = Article::where('status', 'published')->latest()->get();
        return view('news', compact('articles'));
    }

    public function newsDetail($id)
    {
        $article = Article::findOrFail($id);
        return view('news-detail', compact('article'));
    }
}