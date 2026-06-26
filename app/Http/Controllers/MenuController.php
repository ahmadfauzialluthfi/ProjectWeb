<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Menu;

class MenuController extends Controller
{
    public function index()
    {
        $categories = Category::with('menus')->get();
        return view('product', compact('categories'));
    }

    public function show($id)
    {
        $menu = Menu::with('category')->findOrFail($id);
        return view('product-detail', compact('menu'));
    }
}