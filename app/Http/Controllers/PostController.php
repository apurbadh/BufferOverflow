<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{

    public function home()
    {
        return view('home');
    }

    public function show(Post $post)
    {

    }

    public function create()
    {

    }

    public function store()
    {

    }

    public function edit(Post $post)
    {

    }

    public function update(Post $post)
    {

    }

    public function delete(Post $post)
    {

    }
}
