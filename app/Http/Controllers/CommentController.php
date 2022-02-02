<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{

    public function create(Request $request): \Illuminate\Http\RedirectResponse
    {
        $data = $request->validate(Comment::$rules);
        Comment::create($data);
        return back()->with('message', 'Commented Successfully !');
    }

    public function delete(Comment $comment): \Illuminate\Http\RedirectResponse
    {
        $comment->delete();
        return back()->with('message', 'Deleted Successfully !');
    }
}
