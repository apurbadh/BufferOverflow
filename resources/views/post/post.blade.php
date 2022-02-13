@extends('layouts.app')

@section('title')
{{ $post->title }}
@endsection

@section('content')
<div style="margin: 2%">
@if ($errors->any())
            @foreach ($errors->all() as $error)
                <div  class="alert alert-danger" role="alert">{{ $error }}</div>
            @endforeach
        @endif
        @if(session()->has('message'))
            <div class="alert alert-success" role="alert">
                {{ session()->get('message')  }}
            </div>
            <br>
        @endif
</div>
    <div class="card" style="margin-top: 2%">

        <div class="card-header">

            {{ $post->user->name }}
                @if (auth()->id() == $post->user_id)
                    <form method="POST" action="/post/{{ $post->id }}/delete" style="margin-top: 1%">
                        @csrf
                            <a href="/post/{{ $post->id }}/edit" class="btn btn-warning" style="margin-top: -5%" >Edit</a>

                        <button class="btn btn-danger" type="submit" >Delete</button>
                    </form>
                @endif

        </div>
        <div class="card-body">
            <h5 class="card-title">{{ $post->title }}</h5>
            <pre style="margin-top: 3%">{{ $post->code }}</pre>
        </div>
    </div>
    <div class="card" style="margin: 2%; padding: 2%">
        <form method="POST">
            @csrf
    <div class="form-outline mb-4">
    <textarea class="form-control" id="form4Example3" rows="10" name="code"></textarea>
    <label class="form-label" for="form4Example3">Answer for the Question</label>
    <br>

  </div>
        <button type="submit" class="btn btn-primary">Answer</button>
        </form>
    </div>
    @if($post->comments->count() != 0)

        <h2 style="padding: 2%">Answers</h2>

        @foreach($post->comments as $comment)
            <div class="card" style="margin-top: 1%">

        <div class="card-header">
            {{ $comment->user->name }}
            @if ($comment->user_id == auth()->id())
            <form action="/comment/{{ $comment->id }}/delete" method="POST">
                @csrf
                <button class="btn btn-danger" style="margin-top: 1%">Delete</button>

            </form>
            @endif
        </div>
        <div class="card-body">
            <pre>{{ $comment->code }}</pre>
        </div>

    </div>
        @endforeach
        <br><br>
    @endif
@endsection
