<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::latest('published_at')->whereNotNull('published_at')->get();
        return view('pages.articles.index', compact('articles'));
    }

    public function show(Article $article)
    {
        return view('pages.articles.show', compact('article'));
    }
}
