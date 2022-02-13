<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{

    public function create(Request $request, $id): \Illuminate\Http\RedirectResponse
    {
        $data = $request->validate(Comment::$rules);
        $data['user_id'] = auth()->id();
        $data['post_id'] = $id;
        Comment::create($data);
        return back()->with('message', 'Commented Successfully !');
    }

    public function delete($id): \Illuminate\Http\RedirectResponse
    {
        $comment = Comment::find($id);
        $comment->delete();
        return back()->with('message', 'Deleted Successfully !');
    }
}
