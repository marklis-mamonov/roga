<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use Illuminate\Support\Str;
use App\Http\Requests\ArticleRequest;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::latest('published_at')->whereNotNull('published_at')->get();
        return view('pages.articles.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.articles.create', ['article' => new Article()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\ArticleRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ArticleRequest $request)
    {
        $validated = $request->validated();

        $published_at = $request->getPublishedAt($request->is_published);

        Article::create([
            'slug' => Str::slug($request->title),
            'title' => $request->title,
            'description' => $request->description,
            'body' => $request->body,
            'published_at' => $published_at
        ]);
        
        return redirect(route('articles.create'))->with('message', 'Новость успешно добавлена');
    }

    /**
     * Display the specified resource.
     *
     * @param  Article $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        return view('pages.articles.show', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Article $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        return view('pages.articles.edit', compact('article'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\ArticleRequest  $request
     * @param  Article $article
     * @return \Illuminate\Http\Response
     */
    public function update(ArticleRequest $request, Article $article)
    {        
        $validated = $request->validated();

        $published_at = $request->getPublishedAt($request->is_published);
        
        $article->update([
            'slug' => Str::slug($request->title),
            'title' => $request->title,
            'description' => $request->description,
            'body' => $request->body,
            'published_at' => $published_at
        ]);
        
        return redirect(route('articles.edit', $article))->with('message', 'Новость успешно изменена');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Article $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        $article->delete();

        return redirect(route('articles.index'))->with('message', 'Новость успешно удалена');
    }
}
