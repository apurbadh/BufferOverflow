<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{

    public function home()
    {
        $posts = Post::paginate(5);
        return view('home', compact('posts'));
    }

    public function show($id)
    {
        $post = Post::find($id);
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

    public function edit($id)
    {
        $post = Post::find($id);
        if ($post->user->id != auth()->id()){
            return back();
        }
        return view('post.edit', compact('post'));
    }

    public function update($id, Request $request): \Illuminate\Http\RedirectResponse
    {
        $post = Post::find($id);
        $data = $request->validate([
            'title' => 'required|unique:posts,title,'.$post->id,
            'code' => 'required'
        ]);
        $post->update($data);
        return back()->with('message', 'Updated Successfully !');
    }

    public function delete($id)
    {
        $post = Post::find($id);
        $post->delete();
        return redirect('/')->with('message', 'Deleted Successfully !');
    }
}
