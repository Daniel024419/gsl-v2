<?php

namespace App\Http\Controllers;

use App\Models\Article;

class NewsController extends Controller
{
    public function index()
    {
        $all = Article::orderByDesc('published_at')->get();
        $articles = Article::orderByDesc('published_at')->paginate(5)->withQueryString();

        return view('pages.news', [
            'articles' => $articles,
            'featured' => $all->first(),
            'mustRead' => $all->skip(1)->take(3),
            'categories' => $all->pluck('cat')->unique()->values(),
        ]);
    }

    public function show(Article $article)
    {
        $article->increment('views');

        $articles = Article::orderByDesc('published_at')->get();

        return view('pages.news-show', ['article' => $article, 'articles' => $articles]);
    }
}
