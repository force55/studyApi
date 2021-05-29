<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index()
    {
        return response()->json(Article::all(), 200);
    }

    public function show(Article $article)
    {
        return response()->json($article, 200);
    }

    public function store(Request $request)
    {
        $article = Article::create($request->all());

        return response()->json($article, 200);
    }

    public function update(Request $request, Article $article)
    {
        $article->update($request->all());

        return response()->json($article, 200);
    }

    public function delete(Article $article)
    {
        $article->delete();

        return response()->json(null, 204);
    }
}
