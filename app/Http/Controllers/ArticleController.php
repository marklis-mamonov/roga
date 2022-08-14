<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use Illuminate\Support\Str;
use App\Http\Requests\ArticleRequest;
use App\Http\Requests\TagsRequest;
use App\Services\Contracts\ArticleServiceContract;
use App\Repositories\Contracts\ArticlesRepositoryContract;

class ArticleController extends Controller
{

    protected $articlesRepository;
    protected $articleService;

    public function __construct(ArticlesRepositoryContract $articlesRepository, ArticleServiceContract $articleService)
    {
        $this->articlesRepository = $articlesRepository;
        $this->articleService = $articleService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = $this->articlesRepository->getAllPublishedWithPaginate();
        return view('pages.articles.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = "";
        return view('pages.articles.create', ['article' => new Article(), 'tags' => $tags]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\ArticleRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ArticleRequest $request, TagsRequest $tagsRequest)
    {
        $validated = $request->validated();
        $this->articleService->create($request, $tagsRequest);
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
        $tags = implode(", ", $article->tags->pluck('name')->toArray());
        return view('pages.articles.edit', compact('article', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\ArticleRequest  $request
     * @param  Article $article
     * @return \Illuminate\Http\Response
     */
    public function update(ArticleRequest $request, TagsRequest $tagsRequest, Article $article)
    {        
        $validated = $request->validated();
        $this->articleService->update($request, $tagsRequest, $article);
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
        $this->articlesRepository->delete($article);
        return redirect(route('articles.index'))->with('message', 'Новость успешно удалена');
    }
}
