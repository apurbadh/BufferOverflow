<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{

    public function home()
    {
        return view('home');
    }

    public function show(Post $post)
    {
        return view('post.post', compact('post'));
    }

    public function create()
    {
        return view('post.create');
    }

    public function store(Request $request): \Illuminate\Http\RedirectResponse
    {
        $data = $request->validate(Post::$rules);
        $data['user_id'] = Auth::id();
        Post::create($data);
        return back()->with('message', 'Post Created Successfully !');
    }

    public function edit(Post $post)
    {
        return view('post.edit', compact('post'));
    }

    public function update(Post $post, Request $request): \Illuminate\Http\RedirectResponse
    {
        $data = $request->validate([
            'title' => 'required|unique:posts,title,'.$post->id,
            'code' => 'required'
        ]);
        $post->update($data);
        return back()->with('message', 'Updated Successfully !');
    }

    public function delete(Post $post)
    {
        $post->delete();
        return redirect('/')->with('message', 'Deleted Successfully !');
    }
}
