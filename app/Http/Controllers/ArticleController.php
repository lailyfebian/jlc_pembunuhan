<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;

class ArticleController extends Controller
{
    public function show($slug)
    {
        $article = Article::where('slug', $slug)->firstOrFail();

        return view('layouts.article.show', compact('article'));
    }
}
