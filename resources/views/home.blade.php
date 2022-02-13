@extends('layouts.app')

@section('title', 'Home')

@section('content')
    <div style="margin: 5%">
        <h1 style="text-align: center; margin: 2%; padding: 2%">Questions</h1>
         @if(session()->has('message'))
            <div class="alert alert-success" role="alert">
                {{ session()->get('message')  }}
            </div>
            <br>
        @endif
    @foreach($posts as $post)
    <div class="card" style="margin: 2%">
        <div class="card-header">{{ $post->user->name }}</div>
        <div class="card-body">
            <h5 class="card-title">{{ $post->title }}</h5>
            <p></p>
           <span class="badge bg-warning" style="margin: 1%">{{ $post->comments->count() }}</span> <a href="/post/{{ $post->id }}" class="btn btn-primary">Answer</a>
        </div>
    </div>
    @endforeach

    @if($posts->hasPages())
    <div class="text-center">
<nav aria-label="Page navigation example">
  <ul class="pagination justify-content-center">
    @for ($i = 1; $i <= $posts->total(); $i++)
        @if($i == $posts->currentPage())
            <li class="page-item active"><a class="page-link">{{ $i }}</a></li>
        @else
            <li class="page-item"><a class="page-link" href="/?page={{ $i }}">{{ $i }}</a></li>
        @endif
    @endfor

  </ul>
</nav>

    </div>
    @endif
    </div>
@endsection
