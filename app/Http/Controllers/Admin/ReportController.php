<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Barryvdh\DomPDF\Facade\Pdf;

class ReportController extends Controller
{
    public function articlesPdf()
    {
        $articles = Article::where('status', 'published')->latest()->get();
        $pdf = Pdf::loadView('admin.reports.articles', compact('articles'));
        return $pdf->download('laporan-artikel.pdf');
    }
}
