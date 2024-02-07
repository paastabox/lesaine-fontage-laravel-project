<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $comments = Comment::all();
        $response = [];
        foreach ($comments as $comment) {
            $response[] = [
                'id' => $comment->id,
                'article_id' => $comment->article_id,
                'author' => $comment->author,
                'content' => $comment->content,
            ];
        }
        return response()->json($response);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $comment = Comment::find($id);
        return response()->json([
            'id' => $comment->id,
            'article_id' => $comment->article_id,
            'author' => $comment->author,
            'content' => $comment->content,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
