<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ArticleController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\GalleryController as AdminGalleryController;
use App\Http\Controllers\Admin\ReportController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\PageController;

// Pages
Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/product', [MenuController::class, 'index'])->name('product');
Route::get('/gallery', [GalleryController::class, 'index'])->name('gallery');
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');
Route::get('/news', [PageController::class, 'news'])->name('news');
Route::get('/news/{id}', [PageController::class, 'newsDetail'])->name('news.detail');

// Admin Guest (Login)
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.post');
});

// Admin Protected
Route::prefix('admin')->name('admin.')->middleware('admin.auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Articles
    Route::resource('articles', ArticleController::class);
    Route::get('/articles/export/pdf', [ArticleController::class, 'exportPdf'])->name('articles.export.pdf');

    // Profiles
    Route::resource('profiles', ProfileController::class);

    // Categories
    Route::resource('categories', CategoryController::class);
    Route::get('/categories/export/pdf', [CategoryController::class, 'exportPdf'])->name('categories.export.pdf');

    // Products
    Route::resource('products', ProductController::class);
    Route::get('/products/export/pdf', [ProductController::class, 'exportPdf'])->name('products.export.pdf');

    // Galleries
    Route::resource('galleries', AdminGalleryController::class);
    Route::get('/galleries/export/pdf', [AdminGalleryController::class, 'exportPdf'])->name('galleries.export.pdf');

    // Reports
    Route::get('/reports/articles', [ReportController::class, 'articlesPdf'])->name('reports.articles');
});
