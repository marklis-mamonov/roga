<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;

class PagesController extends Controller
{
    public function homepage()
    {
        $articles = Article::latest('published_at')->whereNotNull('published_at')->limit(3)->get();
        return view('pages.homepage', compact('articles'));
    }

    public function about_us()
    {
        return view('pages.about_us');
    }

    public function contacts()
    {
        return view('pages.contacts');
    }

    public function conditions()
    {
        return view('pages.conditions');
    }

    public function finance_department()
    {
        return view('pages.finance_department');
    }

    public function for_clients()
    {
        return view('pages.for_clients');
    }
}
