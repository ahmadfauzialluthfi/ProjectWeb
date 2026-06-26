<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
use App\Models\Menu;
use App\Models\Gallery;
use App\Models\Profile;

class DashboardController extends Controller
{
    public function index()
    {
        $totalArticles = Article::count();
        $totalProducts = Menu::count();
        $totalGalleries = Gallery::count();
        $totalProfiles = Profile::count();
        $totalCategories = Category::count();

        return view('admin.dashboard', compact(
            'totalArticles',
            'totalProducts',
            'totalGalleries',
            'totalProfiles',
            'totalCategories'
        ));
    }
}
