<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArticleRequest;
use App\Models\Article;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        foreach (Article::query()->get() as $article) {
            $articles[] = [
                'id' => $article->id,
                'title' => $article->title,
                'image_url' => $article->image_url,
                'content' => $article->content,
            ];
        }
        return response()->json($articles);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ArticleRequest $request)
    {
        $article = Article::query()->create($request->validated());
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $article = Article::query()->find($id);
        return response()->json([
            'id' => $article->id,
            'title' => $article->title,
            'image_url' => $article->image_url,
            'content' => $article->content,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ArticleRequest $request, string $id)
    {
        $article = Article::query()->find($id);
        $article->update($request->validated());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $article = Article::query()->find($id);
        $article->delete();
    }

    public function search(string $search)
    {
        $articles = Article::query()
            ->where('title', 'like', "%$search%")
            ->get();
        foreach ($articles as $article) {
            $articlesList[] = [
                'id' => $article->id,
                'title' => $article->title,
                'image_url' => $article->image_url,
                'content' => $article->content,
            ];
        }
        return response()->json($articlesList);
    }

    public function comments(string $id)
    {
        $comments = Article::query()->find($id)->comments;
        return response()->json([
            'id' => $comments->id,
            'article_id' => $comments->article_id,
            'author' => $comments->author,
            'content' => $comments->content,
        ]);
    }
}
